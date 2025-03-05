<?php helper('form'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <base href="../">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>
<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png)">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="../../demo1/dist/index.html" class="mb-12">
                    <img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form action="<?= base_url('register/process') ?>" method="post">
                        <?= csrf_field(); ?>
                        <!--begin::Heading-->
                        <div class="mb-10 text-center">
                            <h1 class="text-dark mb-3">Crear una cuenta</h1>
                            <div class="text-gray-400 fw-bold fs-4">¿Ya tienes una cuenta?
                                <a href="<?= base_url('login') ?>" class="link-primary fw-bolder">Inicia sesión aquí</a>
                            </div>
                        </div>
                        <!--end::Heading-->
                        
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6">Nombre de usuario</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" name="name" value="<?= set_value('name') ?>" autocomplete="off" required />
                            <?php if (isset($validation) && $validation->getError('name')): ?>
                                <div class="text-danger"><?= $validation->getError('name') ?></div>
                            <?php endif; ?>
                        </div>
                        <!--end::Input group-->
                        
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6">Correo electrónico</label>
                            <input class="form-control form-control-lg form-control-solid" type="email" name="email" value="<?= set_value('email') ?>" autocomplete="off" required />
                        </div>
                        <!--end::Input group-->
                        
                        <!--begin::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <label class="form-label fw-bolder text-dark fs-6">Contraseña</label>
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" required />
                            <div class="text-muted">Usa 8 o más caracteres.</div>
                            <?php if (isset($validation) && $validation->getError('password')): ?>
                                <div class="text-danger"><?= $validation->getError('password') ?></div>
                            <?php endif; ?>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6">Confirmar Contraseña</label>
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password_confirm" autocomplete="off" required />
                            <?php if (isset($validation) && $validation->getError('password_confirm')): ?>
                                <div class="text-danger"><?= $validation->getError('password_confirm') ?></div>
                            <?php endif; ?>
                        </div>
                        <!--end::Input group-->

                        <!--end::Input group-->
                        
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <label class="form-check form-check-custom form-check-solid form-check-inline">
                                <input class="form-check-input" type="checkbox" name="toc" value="1" />
                                <span class="form-check-label fw-bold text-gray-700 fs-6">Estoy de acuerdo con los
                                    <a href="#" class="ms-1 link-primary">términos y condiciones</a>.</span>
                            </label>
                        </div>
                        <!--end::Input group-->
                        
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary">
                                <span class="indicator-label">Registrarse</span>
                                <span class="indicator-progress">Por favor espere...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
                    <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
                    <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
                </div>
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Main-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
</body>
</html>
