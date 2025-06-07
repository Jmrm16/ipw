<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{

public function responder(Request $request)
{
    $mensaje = strtolower($request->input('mensaje'));

    if (!$mensaje) {
        return response()->json(['error' => 'Mensaje vacío'], 400);
    }

    // Buscar coincidencias en respuestas directas (desde config)
    $respuestasDirectas = Config::get('chatbot.respuestas_directas', []);
    foreach ($respuestasDirectas as $clave => $respuesta) {
        if (str_contains($mensaje, strtolower($clave))) {
            return response()->json(['respuesta' => $respuesta]);
        }
    }

    // Obtener historial conversacional de la sesión
    $historial = session('chatbot_historial', []);

    // Insertar prompt inicial solo una vez
    if (empty($historial) || !collect($historial)->contains('role', 'system')) {
        $systemPrompt = Config::get('chatbot.system_prompt', 'Eres un asistente virtual amigable.');
        array_unshift($historial, ['role' => 'system', 'content' => $systemPrompt]);
    }

    // Agregar el mensaje actual del usuario
    $historial[] = ['role' => 'user', 'content' => $mensaje];

    // Enviar petición a OpenAI
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
    ])->post('https://api.openai.com/v1/chat/completions', [
        'model' => 'gpt-4o-mini',
        'messages' => $historial,
    ]);

    if ($response->failed()) {
        Log::error('Error al contactar OpenAI: ' . $response->body());
        return response()->json(['error' => 'Error al contactar con OpenAI'], 500);
    }

    $respuestaIA = $response->json('choices.0.message.content');

    // Agregar respuesta de IA al historial
    $historial[] = ['role' => 'assistant', 'content' => $respuestaIA];
    session(['chatbot_historial' => $historial]);

    return response()->json(['respuesta' => $respuestaIA]);
}


}
