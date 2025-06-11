@extends('layouts.app-modern')

@section('title', 'Cambiar Contraseña')

@section('content')
<div class="security-container">
    <div class="security-card">
        <!-- Encabezado con icono -->
        <div class="security-header">
            <div class="security-icon">
                <i class="ri-shield-keyhole-line"></i>
            </div>
            <h2 class="security-title">Cambiar Contraseña</h2>
            <p class="security-subtitle">Protege tu cuenta con una contraseña segura</p>
        </div>

        <!-- Alertas -->
        @if (session('status'))
            <div class="alert-success">
                <i class="ri-checkbox-circle-line"></i>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                <i class="ri-error-warning-line"></i>
                <div>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('perfil.password.update') }}" method="POST" class="security-form">
            @csrf
            @method('PUT')

            <!-- Campo de nueva contraseña -->
            <div class="form-group">
                <label for="password" class="form-label">
                    <i class="ri-lock-2-line"></i> Nueva contraseña
                </label>
                <div class="input-wrapper">
                    <input type="password" name="password" id="password" required
                           class="form-input @error('password') input-error @enderror">
                    <button type="button" class="toggle-password" data-target="password">
                        <i class="ri-eye-line"></i>
                    </button>
                </div>
                @error('password')
                    <p class="form-error-message">{{ $message }}</p>
                @enderror
                <div class="password-strength-meter mt-2 hidden">
                    <div class="strength-bar"></div>
                    <p class="strength-text text-xs mt-1"></p>
                </div>
            </div>

            <!-- Campo de confirmación -->
            <div class="form-group">
                <label for="password_confirmation" class="form-label">
                    <i class="ri-lock-password-line"></i> Confirmar contraseña
                </label>
                <div class="input-wrapper">
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                           class="form-input">
                    <button type="button" class="toggle-password" data-target="password_confirmation">
                        <i class="ri-eye-line"></i>
                    </button>
                </div>
            </div>

            <!-- Requisitos de contraseña -->
            <div class="password-requirements">
                <p class="requirements-title">Tu contraseña debe contener:</p>
                <ul class="requirements-list">
                    <li data-requirement="length"><i class="ri-check-line"></i> Mínimo 8 caracteres</li>
                    <li data-requirement="uppercase"><i class="ri-check-line"></i> Al menos una mayúscula</li>
                    <li data-requirement="number"><i class="ri-check-line"></i> Al menos un número</li>
                    <li data-requirement="special"><i class="ri-check-line"></i> Al menos un carácter especial</li>
                </ul>
            </div>

            <!-- Botón de envío -->
            <div class="form-actions">
                <a href="{{ route('perfil.show') }}" class="btn-secondary">
                    <i class="ri-arrow-left-line"></i> Cancelar
                </a>
                <button type="submit" class="btn-primary">
                    <i class="ri-key-2-line"></i> Actualizar Contraseña
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .security-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 120px);
        padding: 2rem;
    }

    .security-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        width: 100%;
        max-width: 500px;
        padding: 2.5rem;
    }

    .security-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .security-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1rem;
        background: linear-gradient(135deg, #fef2f2, #fee2e2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ef4444;
        font-size: 2.5rem;
    }

    .security-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 0.5rem;
    }

    .security-subtitle {
        color: #6b7280;
        font-size: 1rem;
    }

    .alert-success {
        background: #ecfdf5;
        color: #065f46;
        padding: 1rem;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
        border-left: 4px solid #10b981;
    }

    .alert-error {
        background: #fef2f2;
        color: #b91c1c;
        padding: 1rem;
        border-radius: 8px;
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
        border-left: 4px solid #ef4444;
    }

    .security-form {
        margin-top: 2rem;
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
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .input-wrapper {
        position: relative;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        font-size: 0.875rem;
        transition: all 0.2s;
        padding-right: 40px;
    }

    .form-input:focus {
        outline: none;
        border-color: #ef4444;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    .input-error {
        border-color: #ef4444;
    }

    .toggle-password {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #9ca3af;
        cursor: pointer;
        font-size: 1.1rem;
    }

    .toggle-password:hover {
        color: #6b7280;
    }

    .form-error-message {
        color: #ef4444;
        font-size: 0.75rem;
        margin-top: 0.25rem;
    }

    .password-requirements {
        background: #f9fafb;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 2rem;
    }

    .requirements-title {
        font-size: 0.875rem;
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.75rem;
    }

    .requirements-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.5rem;
    }

    .requirements-list li {
        font-size: 0.75rem;
        color: #6b7280;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .requirements-list li i {
        color: #9ca3af;
    }

    .requirements-list li.valid i {
        color: #10b981;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
    }

    .btn-primary {
        background: #ef4444;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-primary:hover {
        background: #dc2626;
        transform: translateY(-1px);
    }

    .btn-secondary {
        background: white;
        color: #374151;
        border: 1px solid #e5e7eb;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-secondary:hover {
        background: #f9fafb;
        border-color: #d1d5db;
    }

    /* Password strength meter */
    .password-strength-meter {
        width: 100%;
        height: 4px;
        background: #e5e7eb;
        border-radius: 2px;
        overflow: hidden;
    }

    .strength-bar {
        height: 100%;
        width: 0;
        background: #ef4444;
        transition: width 0.3s, background 0.3s;
    }

    @media (max-width: 640px) {
        .security-card {
            padding: 1.5rem;
        }
        
        .requirements-list {
            grid-template-columns: 1fr;
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
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('ri-eye-line', 'ri-eye-off-line');
                } else {
                    input.type = 'password';
                    icon.classList.replace('ri-eye-off-line', 'ri-eye-line');
                }
            });
        });

        // Password strength indicator
        const passwordInput = document.getElementById('password');
        const strengthMeter = document.querySelector('.password-strength-meter');
        const strengthBar = document.querySelector('.strength-bar');
        const strengthText = document.querySelector('.strength-text');
        const requirements = document.querySelectorAll('.requirements-list li');

        if (passwordInput) {
            strengthMeter.classList.remove('hidden');
            
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                const strength = calculatePasswordStrength(password);
                
                // Update strength meter
                strengthBar.style.width = `${strength.score * 25}%`;
                
                // Update strength color
                if (strength.score <= 1) {
                    strengthBar.style.backgroundColor = '#ef4444';
                    strengthText.textContent = 'Débil';
                    strengthText.className = 'strength-text text-xs mt-1 text-red-500';
                } else if (strength.score <= 2) {
                    strengthBar.style.backgroundColor = '#f59e0b';
                    strengthText.textContent = 'Moderada';
                    strengthText.className = 'strength-text text-xs mt-1 text-yellow-500';
                } else if (strength.score <= 3) {
                    strengthBar.style.backgroundColor = '#3b82f6';
                    strengthText.textContent = 'Fuerte';
                    strengthText.className = 'strength-text text-xs mt-1 text-blue-500';
                } else {
                    strengthBar.style.backgroundColor = '#10b981';
                    strengthText.textContent = 'Muy fuerte';
                    strengthText.className = 'strength-text text-xs mt-1 text-green-500';
                }
                
                // Update requirements
                requirements.forEach(li => {
                    const requirement = li.getAttribute('data-requirement');
                    if (strength[requirement]) {
                        li.classList.add('valid');
                        li.querySelector('i').className = 'ri-check-line text-green-500';
                    } else {
                        li.classList.remove('valid');
                        li.querySelector('i').className = 'ri-check-line text-gray-300';
                    }
                });
            });
        }
        
        function calculatePasswordStrength(password) {
            const strength = {
                score: 0,
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                number: /[0-9]/.test(password),
                special: /[^A-Za-z0-9]/.test(password)
            };
            
            // Calculate score
            strength.score = Object.values(strength).filter(Boolean).length - 1;
            
            return strength;
        }
    });
</script>
@endsection