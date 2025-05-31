<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contacto;
use Illuminate\Support\Facades\DB; // ✅ Agregar esta línea


class ContactoController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'modalidad' => 'required|in:virtual,presencial',
            'tipo_usuario' => 'required|in:empresa,persona',
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Guardar en la base de datos
        Contacto::create($request->all());

        // Enviar correo de confirmación (opcional)
        Mail::raw("Gracias por tu consulta, pronto nos pondremos en contacto.", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject("Confirmación de Registro de Seguro");
        });

        return back()->with('success', 'Registro enviado correctamente.');
    }
    public function show()
    {
        // Contar registros directamente en la base de datos
        $modalidad_counts = DB::table('contactos')
            ->select('modalidad', DB::raw('count(*) as cantidad'))
            ->groupBy('modalidad')
            ->get()
            ->pluck('cantidad', 'modalidad');
    
        // Calcular el total de registros
        $total_registros = $modalidad_counts->sum();
    
        // Calcular porcentaje
        $modalidad_porcentaje = $modalidad_counts->map(function ($cantidad) use ($total_registros) {
            return round(($cantidad / $total_registros) * 100, 2);
        });
    
        // Obtener todos los registros
        $contactos = Contacto::all();
    
        return view('pages.list', compact('contactos', 'modalidad_counts', 'modalidad_porcentaje', 'total_registros'));
    }
    

    

}
