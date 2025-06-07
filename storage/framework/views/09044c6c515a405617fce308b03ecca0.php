<?php $__env->startSection('title', 'Iniciar Sesión'); ?>

<?php $__env->startSection('content'); ?>
<!-- Encabezado con gradiente y parallax -->
<div class="container-fluid page-header d-flex align-items-center justify-content-center mb-5 py-5 position-relative overflow-hidden"
     style="background: linear-gradient(135deg, #1e5799 0%, #207cca 51%, #2989d8 100%); height: 400px;">
    <div class="position-absolute w-100 h-100" style="top:0; left:0; background-image: url('<?php echo e(asset('img/headers.jpg')); ?>'); background-size: cover; background-position: center; opacity: 0.15; z-index: 1;"></div>
    <div class="text-center text-white position-relative z-index-2">
        <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown">Bienvenido</h1>
        <p class="lead fs-4 mb-4 animate__animated animate__fadeInUp">Inicia sesión para acceder a tu cuenta</p>
    </div>
</div>

<!-- Sección del login con estilo -->
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg p-4 rounded-4">
                <div class="card-body">
                    <h2 class="mb-3 fw-bold text-primary text-center">Iniciar Sesión</h2>
                    <p class="mb-4 text-muted text-center">Usa tus credenciales o tu cuenta de Google</p>

                    <!-- Mostrar errores -->
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Formulario tradicional -->
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" id="email" name="email" class="form-control" required autofocus value="<?php echo e(old('email')); ?>">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <!-- Recordarme -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Recordarme</label>
                        </div>
                        <div class="text-center mt-3">
                            <small>¿No tienes una cuenta? <a href="<?php echo e(route('register')); ?>">Regístrate</a></small>
                        </div>

                        <!-- Botón iniciar sesión -->
                        <button type="submit" class="btn btn-primary w-100 mb-3">Iniciar Sesión</button>
                    </form>

                    <!-- Separador -->
                    <div class="text-center my-3">
                        <span class="text-muted">— o —</span>
                    </div>

                    <!-- Google Login -->
                    <a href="<?php echo e(route('google.login')); ?>" class="btn btn-danger w-100">
                        <i class="fab fa-google me-2"></i> Iniciar Sesión con Google
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estilos adicionales -->
<style>
    .page-header {
        position: relative;
        overflow: hidden;
    }
    .z-index-1 {
        z-index: 1;
    }
    .z-index-2 {
        z-index: 2;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\nueva aseguradora\ipw\resources\views/auth/login.blade.php ENDPATH**/ ?>