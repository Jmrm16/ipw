<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\FormularioMedicoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ObservacionClienteController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoPublicoController;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\LitePasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'pages.about');
Route::view('/productos', 'pages.services');
Route::view('/Pricing', 'pages.pricing');
Route::view('/seguros/medicos', 'seguros.medicos');
Route::view('/seguros/Cumplimiento', 'seguros.Cumplimiento')->name('seguros.Cumplimiento');
Route::get('/eventos', [EventoPublicoController::class, 'index'])->name('eventos.index');
Route::get('/eventos/{evento}', [EventoPublicoController::class, 'show'])->name('eventos.show');


/*
|--------------------------------------------------------------------------
| Contacto
|--------------------------------------------------------------------------
*/


    // routes/web.php
Route::post('/api/chatbot', [ChatbotController::class, 'responder'])->name('api.chatbot');

/*
|--------------------------------------------------------------------------
| Google Auth
|--------------------------------------------------------------------------
*/
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
Route::view('/login', 'auth.login')->name('login');

/*
|--------------------------------------------------------------------------
| Rutas Protegidas (Solo usuarios autenticados con Google)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/perfil/password', [PasswordController::class, 'edit'])->name('password.change');
    Route::post('/perfil/password', [PasswordController::class, 'update'])->name('password.update');
});




Route::middleware(['google.auth'])->group(function () {


    // 📝 Formularios
Route::get('/Formulario', [FormularioMedicoController::class, 'create'])
    ->middleware('auth')
    ->name('formulario.create');
    Route::post('/Formulario', [FormularioMedicoController::class, 'store'])->name('formulario.store');
    Route::post('/formulario/{id}/subir-constancia', [FormularioMedicoController::class, 'subirConstanciaPago'])
    ->name('formulario.subir-constancia')
    ->middleware('auth');
    Route::middleware(['auth'])->group(function () {
    Route::get('/seguros/Cumplimiento/modal', function () {
        return redirect('/seguros/Cumplimiento#abrir-modal');
    })->name('cumplimiento.modal');
});
  Route::post('/formulario/cumplimiento', [FormularioMedicoController::class, 'iniciarCumplimiento'])
    ->name('formulario.iniciarCumplimiento');





    // 📄 PDFs
    Route::post('/llenar-pdf', [PDFController::class, 'llenarPDF'])->name('llenar-pdf');
    Route::post('/llenar-pdf2', [PDFController::class, 'llenarPDF2'])->name('llenar-pdf2');
    Route::get('/ver-pdf/{id}', [PDFController::class, 'verPDF'])->name('formulario1.pdf');
    Route::get('/ver-pdf2/{id}', [PDFController::class, 'llenarPDF2'])->name('formulario2.pdf');
    Route::get('/ver-pdf3/{id}', [PDFController::class, 'llenarPDF3'])->name('formulario3.pdf');;

    // 📊 Dashboard
   Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
   Route::post('/notificaciones/marcar-leidas', [DashboardController::class, 'marcarLeidas'])->name('notificaciones.marcar-leidas');
Route::post('/notificaciones/marcar-todas', [DashboardController::class, 'marcarTodas'])->name('notificaciones.marcar-todas');


    // 📁 Documentos por formulario
    Route::get('/documentos', [DocumentoController::class, 'index'])->name('documentos.index'); // Formulario más reciente
    Route::get('/documentos/formulario/{formulario}', [DocumentoController::class, 'verPorFormulario'])->name('documentos.por_formulario');
    Route::post('/documentos/{formulario}', [DocumentoController::class, 'store'])->name('documentos.store');
    Route::get('/documentos/ver/{tipo}/{formulario}', [DocumentoController::class, 'ver'])->name('documentos.ver');

    // 👤 Perfil
        Route::get('/perfil', [PerfilController::class, 'show'])->name('perfil.show');
        Route::get('/perfil/editar', [PerfilController::class, 'edit'])->name('perfil.edit');
        Route::put('/perfil/actualizar', [PerfilController::class, 'update'])->name('perfil.update');
        Route::get('/perfil/password', [PerfilController::class, 'editPassword'])->name('perfil.password');
        Route::put('/perfil/password', [PerfilController::class, 'updatePassword'])->name('perfil.password.update');


    Route::get('/observaciones', [ObservacionClienteController::class, 'index'])->name('observaciones.index')->middleware('auth');

    Route::post('/observaciones/{observacion}/resolver', [\App\Http\Controllers\ObservacionClienteController::class, 'marcarComoResuelta'])
    ->name('observaciones.resolver')
    ->middleware('auth');


    Route::get('/observaciones/formulario/{id}', [\App\Http\Controllers\ObservacionClienteController::class, 'verPorFormulario'])
    ->name('observaciones.por_formulario')
    ->middleware('auth');

    Route::post('/observaciones/{observacion}/responder', [ObservacionClienteController::class, 'responder'])
    ->name('observaciones.responder')
    ->middleware('auth');



Route::get('/solicitar-poliza', function (Request $request) {
    if (Auth::check()) {
        return redirect()->route('formulario.create');
    }

    session(['redirect_after_login' => '/Formulario']);
    return redirect()->route('login');
})->name('redirigir.formulario');

    



    Route::post('/formulario/{id}/constancia-pago', [FormularioMedicoController::class, 'subirConstanciaPago'])
    ->name('formulario.constancia_pago');

    Route::get('/documentos/cumplimiento/{formulario}', [DocumentoController::class, 'verCumplimiento'])->name('documentos.cumplimiento');
    Route::get('/formularios/{formulario}/documentos-cumplimiento', [DocumentoController::class, 'verCumplimiento'])->name('documentos.cumplimiento');
    Route::get('/cumplimiento/finalizado', function () {
    $formularioId = session('formulario_id_cumplimiento');

    if ($formularioId) {
        return redirect()->route('documentos.cumplimiento', ['formulario' => $formularioId]);
    }

    return redirect('/dashboard')->with('error', 'No se encontró el formulario de cumplimiento.');
})->name('cumplimiento.finalizado');




});

/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');



Route::middleware('guest')->group(function () {
    // Mostrar formulario para ingresar email
    Route::get('/forgot-password-lite', [LitePasswordController::class, 'create'])
        ->name('password.request.lite');

    // Procesar email: si existe, generar token y redirigir al reset
    Route::post('/forgot-password-lite', [LitePasswordController::class, 'store'])
        ->middleware('throttle:6,1') // recomendado: limitar intentos
        ->name('password.email.lite');
});


// GET
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');
// POST
Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->name('password.update');


require __DIR__.'/auth.php';








