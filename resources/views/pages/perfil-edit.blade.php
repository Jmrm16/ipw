@extends('layouts.app-modern')

@section('title', 'Editar Perfil')

@section('content')
<div class="profile-edit-container">
    <div class="profile-edit-card">
        <!-- Encabezado -->
        <div class="profile-edit-header">
            <div class="header-icon">
                <i class="ri-user-settings-line"></i>
            </div>
            <div>
                <h1 class="header-title">Editar Perfil</h1>
                <p class="header-subtitle">Actualiza tu información personal</p>
            </div>
        </div>

        <!-- Formulario -->
        <form action="{{ route('perfil.update') }}" method="POST" class="profile-edit-form">
            @csrf
            @method('PUT')

            <!-- Campo Nombre -->
            <div class="form-group">
                <label for="name" class="form-label">
                    <i class="ri-user-line"></i> Nombre completo
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"
                       class="form-input @error('name') input-error @enderror"
                       placeholder="Ingresa tu nombre completo">
                @error('name')
                    <p class="form-error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo Email -->
            <div class="form-group">
                <label for="email" class="form-label">
                    <i class="ri-mail-line"></i> Correo electrónico
                </label>
                <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}"
                       class="form-input @error('email') input-error @enderror"
                       placeholder="Ingresa tu correo electrónico">
                @error('email')
                    <p class="form-error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Sección opcional para foto de perfil -->
            <div class="form-group">
                <label class="form-label">
                    <i class="ri-image-line"></i> Foto de perfil
                </label>
                <div class="flex items-center gap-4">
                    <div class="avatar-preview">
                        @if(Auth::user()->profile_photo_path)
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Foto de perfil">
                        @else
                            <div class="avatar-initials">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    <div class="file-upload-wrapper">
                        <input type="file" id="profile_photo" name="profile_photo" class="file-upload-input" accept="image/*">
                        <label for="profile_photo" class="file-upload-label">
                            <i class="ri-upload-cloud-line"></i> Cambiar foto
                        </label>
                    </div>
                </div>
            </div>

            <!-- Acciones -->
            <div class="form-actions">
                <a href="{{ route('perfil.show') }}" class="btn-secondary">
                    <i class="ri-close-line"></i> Cancelar
                </a>
                <button type="submit" class="btn-primary">
                    <i class="ri-save-line"></i> Guardar cambios
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .profile-edit-container {
        max-width: 640px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .profile-edit-card {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .profile-edit-header {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        padding: 2rem;
        background: linear-gradient(135deg, #f0f7ff 0%, #e1effe 100%);
        border-bottom: 1px solid #e2e8f0;
    }

    .header-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #3b82f6;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
    }

    .header-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.25rem;
    }

    .header-subtitle {
        color: #64748b;
        font-size: 0.875rem;
    }

    .profile-edit-form {
        padding: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: #475569;
        margin-bottom: 0.5rem;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        transition: all 0.2s;
    }

    .form-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .input-error {
        border-color: #ef4444;
    }

    .form-error-message {
        color: #ef4444;
        font-size: 0.75rem;
        margin-top: 0.25rem;
    }

    .avatar-preview {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid #e2e8f0;
    }

    .avatar-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .avatar-initials {
        width: 100%;
        height: 100%;
        background: #3b82f6;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: 600;
    }

    .file-upload-wrapper {
        flex: 1;
    }

    .file-upload-input {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .file-upload-label {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: white;
        color: #3b82f6;
        border: 1px solid #e2e8f0;
        border-radius: 0.5rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
    }

    .file-upload-label:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e2e8f0;
    }

    .btn-primary {
        background: #3b82f6;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-primary:hover {
        background: #2563eb;
    }

    .btn-secondary {
        background: white;
        color: #475569;
        border: 1px solid #e2e8f0;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-secondary:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
    }

    @media (max-width: 640px) {
        .profile-edit-header {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
            padding: 1.5rem;
        }
        
        .header-icon {
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
        }
        
        .profile-edit-form {
            padding: 1.5rem;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .btn-primary, .btn-secondary {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<script>
    // Mostrar vista previa de la imagen seleccionada
    document.getElementById('profile_photo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const avatarPreview = document.querySelector('.avatar-preview');
                avatarPreview.innerHTML = `<img src="${event.target.result}" alt="Preview">`;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection