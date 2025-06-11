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
use App\Http\Controllers\PasswordController;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/
Route::view('/', 'pages.home');
Route::view('/about', 'pages.about');
Route::view('/productos', 'pages.services');
Route::view('/Pricing', 'pages.pricing');
Route::view('/seguros/medicos', 'seguros.medicos');
Route::view('/seguros/rce', 'seguros.RCE');


/*
|--------------------------------------------------------------------------
| Contacto
|--------------------------------------------------------------------------
*/
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto.index');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');
Route::get('/list', [ContactoController::class, 'show'])->name('contacto.show');

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

    // 📄 PDFs
    Route::post('/llenar-pdf', [PDFController::class, 'llenarPDF'])->name('llenar-pdf');
    Route::post('/llenar-pdf2', [PDFController::class, 'llenarPDF2'])->name('llenar-pdf2');
    Route::get('/ver-pdf/{id}', [PDFController::class, 'verPDF'])->name('formulario1.pdf');
    Route::get('/ver-pdf2/{id}', [PDFController::class, 'llenarPDF2'])->name('formulario2.pdf');

    // 📊 Dashboard
Route::get('/dashboard', function () {
    $user = Auth::user();
    $formularios = \App\Models\FormularioMedico::where('user_id', $user->id)->latest()->paginate(5); // ✅ paginate()
    return view('pages.dashboard', compact('formularios'));
})->name('dashboard');


    // 📁 Documentos por formulario
    Route::get('/documentos', [DocumentoController::class, 'index'])->name('documentos.index'); // Formulario más reciente
    Route::get('/documentos/formulario/{formulario}', [DocumentoController::class, 'verPorFormulario'])->name('documentos.por_formulario');
    Route::post('/documentos/{formulario}', [DocumentoController::class, 'store'])->name('documentos.store');
    Route::get('/documentos/ver/{tipo}/{formulario}', [DocumentoController::class, 'ver'])->name('documentos.ver');

    // 👤 Perfil
    Route::get('/perfil', [PerfilController::class, 'show'])->name('perfil.show');

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

    Route::get('/perfil/editar', [PerfilController::class, 'edit'])->name('perfil.edit');
Route::post('/perfil/actualizar', [PerfilController::class, 'update'])->name('perfil.update');


    Route::post('/formulario/{id}/constancia-pago', [FormularioMedicoController::class, 'subirConstanciaPago'])
    ->name('formulario.constancia_pago');

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

require __DIR__.'/auth.php';
