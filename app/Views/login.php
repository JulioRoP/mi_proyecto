<?php helper('form'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <base href="../"> <!-- Este es el base para las rutas relativas -->
    <meta name="description" content="Iniciar sesión con tu cuenta.">
    <meta name="keywords" content="login, authentication, user access">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<body id="kt_body" class="bg-body">

    <!-- Main Layout -->
    <div class="d-flex flex-column flex-root">
        <!-- Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png)">
            <!-- Content -->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!-- Logo -->
            
                <img alt="Logo" src="assets/media/logos/logo-1-darklg.png" class="500px" style="height: 150px; width: auto; display: block; margin: 0; padding: 0; line-height: 0; vertical-align: top;"/>
                

                <!-- Wrapper -->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!-- Form -->
                    <form action="<?= base_url('login/process') ?>" method="post">
                        <!-- Heading -->
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Iniciar Sesión</h1>
                        </div>

                        <!-- Mensajes de error -->
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                        <?php endif; ?>

                        <?php if (isset($validation)): ?>
                            <div class="alert alert-danger">
                                <?= $validation->listErrors(); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Input Email -->
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">Correo electrónico</label>
                            <input class="form-control form-control-lg form-control-solid" type="email" name="email" value="<?= set_value('email') ?>" required autocomplete="off" />
                        </div>

                        <!-- Input Password -->
                        <div class="fv-row mb-10">
                            <div class="d-flex flex-stack mb-2">
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Contraseña</label>
                                <a href="<?= base_url('password-reset') ?>" class="link-primary fs-6 fw-bolder">¿Olvidaste la contraseña?</a>
                            </div>
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password" required autocomplete="off" />
                        </div>

                        <!-- Actions -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Ingresar</span>
                                <span class="indicator-progress">Por favor espera...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>

                            <div class="text-center text-muted text-uppercase fw-bolder mb-5">o</div>

                            <!-- Google Sign-In -->
                            <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Iniciar sesión con Google
                            </a>

                            <!-- Facebook Sign-In -->
                            <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                <img alt="Logo" src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-3" />Iniciar sesión con Facebook
                            </a>

                            <!-- Apple Sign-In -->
                            <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">
                                <img alt="Logo" src="assets/media/svg/brand-logos/apple-black.svg" class="h-20px me-3" />Iniciar sesión con Apple
                            </a>
                        </div>
                    </form>
                    <br>
                    <div class="mb-10 text-center">
                            <div class="text-gray-400 fw-bold fs-4">¿No tienes cuenta?
                                <a href="<?= base_url('register') ?>" class="link-primary fw-bolder">Regístrate aquí</a>
                            </div>
                        </div>

                    <!-- End of Form -->
                </div>
                <!-- End of Wrapper -->
            </div>
            <!-- End of Content -->

            <!-- Footer -->
            <div class="d-flex flex-center flex-column-auto p-10">
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">Sobre</a>
                    <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contacto</a>
                    <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contáctanos</a>
                </div>
            </div>
            <!-- End of Footer -->
        </div>
        <!-- End of Authentication - Sign-in -->
    </div>
    <!-- End of Main Layout -->


    <script>var hostUrl = "assets/";</script>
    <!-- Global Javascript Bundle (used by all pages) -->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    
    <!-- Agregar el script para mostrar el modal cuando el login sea exitoso -->
    <script>
        <?php if (session()->getFlashdata('success')): ?>
            // Mostrar el modal si el mensaje de éxito está presente
            var myModal = new bootstrap.Modal(document.getElementById('loginSuccessModal'), {
                keyboard: false
            });
            myModal.show();
        <?php endif; ?>
    </script>
</body>
</html>
