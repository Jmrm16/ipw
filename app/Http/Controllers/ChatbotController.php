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

    // 👉 Reiniciar historial si el usuario lo solicita
    if (in_array($mensaje, ['reiniciar', 'reset', 'limpiar conversación'])) {
        session()->forget('chatbot_historial');
        session()->forget('profesion_detectada');
        session()->forget('valor_asegurado');
        session()->forget('esperando_confirmacion');
        return response()->json([
            'respuesta' => '✅ Conversación reiniciada. ¿En qué puedo ayudarte ahora?'
        ]);
    }

    // 👉 Buscar coincidencias en respuestas directas
    $respuestasDirectas = config('chatbot.respuestas_directas', []);
    foreach ($respuestasDirectas as $clave => $respuesta) {
        if (str_contains($mensaje, strtolower($clave))) {
            return response()->json(['respuesta' => $respuesta]);
        }
    }

    // ✅ Historial conversacional
    $historial = session('chatbot_historial', []);

    // Agregar system prompt solo una vez
    if (empty($historial) || !collect($historial)->contains(fn($m) => $m['role'] === 'system')) {
        $systemPrompt = config('chatbot.system_prompt', 'Eres un asistente virtual amigable.');
        array_unshift($historial, ['role' => 'system', 'content' => $systemPrompt]);
    }

    // Ver si ya se dio una respuesta de precio y ahora espera confirmación
    if (session('esperando_confirmacion') === true) {
        if (str_contains($mensaje, 'no')) {
            session()->forget('chatbot_historial');
            session()->forget('profesion_detectada');
            session()->forget('valor_asegurado');
            session()->forget('esperando_confirmacion');
            return response()->json(['respuesta' => 'Gracias por usar nuestro asistente virtual. ¡Que tengas un excelente día!']);
        } elseif (str_contains($mensaje, 'sí') || str_contains($mensaje, 'si')) {
            session()->forget('esperando_confirmacion');
            return response()->json(['respuesta' => 'Perfecto, dime qué otra información necesitas.']);
        }
    }

    // 👉 Detectar profesión y valor asegurado desde el mensaje o sesión
    $precios = Config::get('chatbot.precios_polizas', []);
    $profesionDetectada = session('profesion_detectada');
    $valorDetectado = session('valor_asegurado');

    // Normalizar y buscar coincidencias
    $mensajeNormalizado = $this->normalizarTexto($mensaje);
    foreach ($precios as $profesion => $valores) {
        if (str_contains($mensajeNormalizado, $this->normalizarTexto($profesion))) {
            $profesionDetectada = $profesion;
            session(['profesion_detectada' => $profesionDetectada]);
            break;
        }
    }

    foreach (['100 millones', '200 millones', '400 millones', '4000 millones'] as $valor) {
        if (str_contains($mensajeNormalizado, $valor)) {
            $valorDetectado = $valor;
            session(['valor_asegurado' => $valorDetectado]);
            break;
        }
    }

    if ($profesionDetectada && $valorDetectado) {
        $precio = $precios[$profesionDetectada][$valorDetectado] ?? null;
        if ($precio) {
            session(['esperando_confirmacion' => true]);
            return response()->json([
                'respuesta' => "✅ La póliza médica para un {$profesionDetectada} con un valor asegurado de {$valorDetectado} cuesta \${$precio} con la aseguradora Confianza.<br>\n                    
                Puedes registrarte para una póliza médica <a href='https://purple-zebra-412652.hostingersite.com/seguros/medicos' target='_blank'>haciendo clic aquí</a>.<br>\n                    ¿Deseas saber el precio de otra póliza o consultar algo más?"
            ]);
        }
    } elseif ($profesionDetectada && !$valorDetectado) {
        return response()->json([
            'respuesta' => "¿Cuál es el valor que deseas asegurar para tu póliza médica como {$profesionDetectada}? (Ej: 100 millones)"
        ]);
    }

    // Agregar nuevo mensaje del usuario al historial
    $historial[] = ['role' => 'user', 'content' => $mensaje];

    // Enviar solicitud a OpenAI
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

    // Guardar respuesta en el historial
    $historial[] = ['role' => 'assistant', 'content' => $respuestaIA];
    session(['chatbot_historial' => $historial]);

    return response()->json(['respuesta' => $respuestaIA]);
}

private function normalizarTexto($texto)
{
    $texto = strtolower($texto); // minúsculas
    $texto = str_replace(
        ['á', 'é', 'í', 'ó', 'ú', 'ñ'],
        ['a', 'e', 'i', 'o', 'u', 'n'],
        $texto
    );
    $texto = preg_replace('/[^a-z0-9 ]/', '', $texto); // eliminar símbolos raros
    return trim($texto);
}


}
