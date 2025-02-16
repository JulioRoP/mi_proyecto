<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($proveedor) ? 'Editar Proveedor' : 'Crear Proveedor' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center"><?= isset($proveedor) ? 'Editar Proveedor' : 'Crear Proveedor' ?></h1>

    <!-- Mostrar errores de validación -->
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= isset($proveedor) ? base_url('proveedores/save/' . $proveedor['ID_PROVEEDOR']) : base_url('proveedores/save') ?>" method="post">
        <?= csrf_field(); ?>

        <div class="mb-3">
            <label for="nombre_proveedor" class="form-label">Nombre del Proveedor</label>
            <input type="text" name="nombre_proveedor" id="nombre_proveedor" class="form-control" value="<?= isset($proveedor) ? esc($proveedor['NOMBRE_PROVEEDOR']) : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="tipo_producto" class="form-label">Tipo de Producto</label>
            <input type="text" name="tipo_producto" id="tipo_producto" class="form-control" value="<?= isset($proveedor) ? esc($proveedor['TIPO_PRODUCTO']) : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="<?= isset($proveedor) ? esc($proveedor['TELEFONO']) : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= isset($proveedor) ? esc($proveedor['EMAIL']) : '' ?>" required>
        </div>

        <button type="submit" class="btn btn-primary"><?= isset($proveedor) ? 'Actualizar' : 'Crear' ?></button>
        <a href="<?= base_url('proveedores') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
