@extends('layouts.app-modern')

@section('title', 'Mi Perfil')

@section('content')
<div class="profile-container">

    <!-- Contenido Principal -->
    <main class="main-content">
        <!-- Tarjeta de Perfil -->
        <div class="profile-card">
            <!-- Encabezado con gradiente y avatar -->
            <div class="profile-header bg-gradient-to-r from-indigo-600 to-blue-700 shadow-md">
                <div class="avatar-container">
                    <div class="avatar shadow">
                        <i class="ri-user-3-fill"></i>
                    </div>
                    <div>
                        <h1 class="profile-title">Mi Perfil</h1>
                        <p class="text-sm opacity-80">Bienvenido de nuevo, {{ $usuario->name }}</p>
                    </div>
                </div>
            </div>

            <!-- Cuerpo del perfil -->
            <div class="profile-body">
                <!-- Información Personal -->
                <section class="profile-section">
                    <h2 class="section-title">
                        <i class="ri-information-line"></i> Datos Personales
                    </h2>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="ri-user-line"></i>
                            </div>
                            <div class="info-content">
                                <label>Nombre Completo</label>
                                <p>{{ $usuario->name }}</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="ri-mail-line"></i>
                            </div>
                            <div class="info-content">
                                <label>Correo Electrónico</label>
                                <p>{{ $usuario->email }}</p>
                            </div>
                        </div>

                        @if(isset($usuario->telefono))
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="ri-phone-line"></i>
                            </div>
                            <div class="info-content">
                                <label>Teléfono</label>
                                <p>{{ $usuario->telefono }}</p>
                            </div>
                        </div>
                        @endif

                        @if(isset($usuario->role))
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="ri-shield-user-line"></i>
                            </div>
                            <div class="info-content">
                                <label>Rol</label>
                                <p>{{ ucfirst($usuario->role) }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </section>

                <!-- Acciones -->
                <section class="profile-actions">
                    <h2 class="section-title">
                        <i class="ri-settings-3-line"></i> Acciones Rápidas
                    </h2>
                    <div class="action-buttons">
                        <a href="{{ route('perfil.edit') }}" class="btn-edit">
                            <i class="ri-edit-2-line"></i> Editar Perfil
                        </a>
                        <a href="{{ route('password.change') }}" class="btn-change-password">
                            <i class="ri-lock-password-line"></i> Cambiar Contraseña
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </main>
</div>

<style>
    .profile-container {
        display: flex;
        min-height: 100vh;
        background: linear-gradient(to bottom, #f0f4f8, #ffffff);
    }
    .main-content {
        flex: 1;
        padding: 2rem;
    }
    .profile-card {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 15px 25px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .profile-header {
        padding: 2.5rem 2rem;
        color: white;
    }
    .avatar-container {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }
    .avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        border: 2px solid white;
    }
    .profile-title {
        font-size: 1.75rem;
        font-weight: 600;
    }
    .profile-body {
        padding: 2rem;
        margin-top: -2rem;
    }
    .section-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.25rem;
    }
    .info-item {
        display: flex;
        gap: 1rem;
        padding: 1rem;
        background: #f1f5f9;
        border-left: 4px solid #3b82f6;
        border-radius: 0.5rem;
        transition: 0.2s;
    }
    .info-item:hover {
        background: #e2e8f0;
        transform: translateY(-2px);
    }
    .info-icon {
        font-size: 1.5rem;
        color: #3b82f6;
    }
    .info-content label {
        font-size: 0.875rem;
        color: #64748b;
    }
    .info-content p {
        font-size: 1rem;
        font-weight: 500;
        color: #1e293b;
    }
    .profile-actions {
        margin-top: 2.5rem;
    }
    .action-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }
    .btn-edit, .btn-change-password {
        padding: 0.75rem 1.25rem;
        border-radius: 8px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }
    .btn-edit {
        background: #3b82f6;
        color: white;
    }
    .btn-edit:hover {
        background: #2563eb;
    }
    .btn-change-password {
        background: white;
        color: #3b82f6;
        border: 1px solid #3b82f6;
    }
    .btn-change-password:hover {
        background: #eff6ff;
    }
    @media (max-width: 768px) {
        .main-content {
            padding: 1rem;
        }
        .avatar-container {
            flex-direction: column;
            text-align: center;
        }
        .info-grid {
            grid-template-columns: 1fr;
        }
        .action-buttons {
            flex-direction: column;
        }
    }
</style>
@endsection
