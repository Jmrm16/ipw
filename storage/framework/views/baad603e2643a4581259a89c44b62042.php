<?php $__env->startSection('title', 'Iniciar Sesión'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid page-header d-flex align-items-center justify-content-center mb-5 py-5 position-relative overflow-hidden"
     style="background: linear-gradient(135deg, #1e5799 0%, #207cca 51%, #2989d8 100%); height: 400px;">
    <div class="position-absolute w-100 h-100" style="top:0; left:0; background-image: url('<?php echo e(asset('img/headers.jpg')); ?>'); background-size: cover; background-position: center; opacity: 0.15; z-index: 1;"></div>
    <div class="text-center text-white position-relative z-index-2">
        <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown">Bienvenido</h1>
        <p class="lead fs-4 mb-4 animate__animated animate__fadeInUp">Inicia sesión para acceder a tu cuenta</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg p-4 rounded-4 bg-light-subtle card-hover-effect">
                <div class="card-body">
                    <h2 class="mb-3 fw-bold text-primary text-center">Iniciar Sesión</h2>
                    <p class="mb-4 text-muted text-center">Usa tus credenciales o tu cuenta de Google</p>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="redirect_to" value="<?php echo e(request()->query('redirect_to')); ?>">

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg rounded-pill" required autofocus value="<?php echo e(old('email')); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg rounded-pill" required>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Recordarme</label>
                        </div>

                        <button type="submit" class="btn btn-primary-gradient w-100 py-2 fw-semibold rounded-pill">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión
                        </button>

                        <div class="text-center mt-3">
                            <small>¿No tienes una cuenta? 
                                <a href="<?php echo e(route('register', ['redirect_to' => request()->query('redirect_to')])); ?>">Regístrate</a>
                            </small>
                        </div>
                    </form>

                    <div class="text-center my-4 text-muted">
                        <span>— o —</span>
                    </div>

                    <a href="<?php echo e(route('google.login')); ?>" class="btn btn-outline-danger w-100 py-2 rounded-pill fw-semibold">
                        <i class="fab fa-google me-2"></i> Iniciar Sesión con Google
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-primary-gradient {
        background: linear-gradient(45deg, #207cca, #1e5799);
        color: #fff;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary-gradient:hover {
        background: linear-gradient(45deg, #1e5799, #207cca);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-outline-danger {
        border-width: 2px;
        transition: all 0.3s ease;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: #fff;
    }

    .card-hover-effect:hover {
        transform: translateY(-4px);
        transition: 0.3s ease;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.08);
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\aseguradora\resources\views/auth/login.blade.php ENDPATH**/ ?>