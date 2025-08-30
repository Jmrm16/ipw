@extends('layouts.app')

@section('title', 'Restablecer contraseña')

@section('content')
<div class="container-fluid page-header d-flex align-items-center justify-content-center mb-5 py-5 position-relative overflow-hidden"
     style="background: linear-gradient(135deg, #1e5799 0%, #207cca 51%, #2989d8 100%); height: 300px;">
  <div class="position-absolute w-100 h-100" style="top:0; left:0; background-image: url('{{ asset('img/headers.jpg') }}'); background-size: cover; background-position: center; opacity: 0.15; z-index: 1;"></div>
  <div class="text-center text-white position-relative z-3">
    <h1 class="display-5 fw-bold mb-2 animate__animated animate__fadeInDown">Crea una nueva contraseña</h1>
    <p class="lead animate__animated animate__fadeInUp">El enlace expira en poco tiempo</p>
  </div>
</div>

<div class="container mb-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card border-0 shadow-lg p-4 rounded-4 bg-light-subtle card-hover-effect">
        <div class="card-body">
          <h2 class="mb-3 fw-bold text-primary text-center">Restablecer contraseña</h2>

          @if ($errors->any())
            <div class="alert alert-danger" role="alert">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form method="POST" action="{{ route('password.update') }}" onsubmit="this.querySelector('button[type=submit]').disabled=true;">
            @csrf

<input type="hidden" name="token" value="{{ $token }}">
<input type="hidden" name="email" value="{{ $email }}">


            <div class="mb-3 position-relative">
              <label for="password" class="form-label">Nueva contraseña</label>
              <input type="password" id="password" name="password"
                     class="form-control form-control-lg rounded-pill pe-5"
                     required autocomplete="new-password">
              <button type="button" class="btn btn-link position-absolute top-50 end-0 translate-middle-y me-3 p-0"
                aria-label="Mostrar u ocultar contraseña"
                onclick="const p=document.getElementById('password'); p.type = p.type==='password' ? 'text' : 'password'; this.querySelector('i').classList.toggle('bi-eye'); this.querySelector('i').classList.toggle('bi-eye-slash');">
                <i class="bi bi-eye-slash fs-5"></i>
              </button>
            </div>

            <div class="mb-4">
              <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
              <input type="password" id="password_confirmation" name="password_confirmation"
                     class="form-control form-control-lg rounded-pill"
                     required autocomplete="new-password">
            </div>
            <pre class="text-muted small">
        token={{ $token }}
        email={{ $email }}
        </pre>


            <button type="submit" class="btn btn-primary-gradient w-100 py-2 fw-semibold rounded-pill">
              <i class="bi bi-check2-circle me-2"></i> Guardar contraseña
            </button>

            <div class="text-center mt-3">
              <small><a href="{{ route('login') }}"><i class="bi bi-arrow-left"></i> Volver a iniciar sesión</a></small>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
