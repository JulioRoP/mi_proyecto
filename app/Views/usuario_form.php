<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($tanque) ? 'Editar Tanque' : 'Crear Tanque' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center"><?= isset($tanque) ? 'Editar Tanque' : 'Crear Tanque' ?></h1>

    <!-- Mostrar errores de validación -->
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <!-- Formulario -->
    <form action="<?= isset($tanque) ? base_url('tanques/save/' . $tanque['ID_TANQUE']) : base_url('tanques/save') ?>" method="post">
        <?= csrf_field(); ?>

        <div class="mb-3">
            <label for="capacidad" class="form-label">Capacidad</label>
            <input type="text" name="capacidad" id="capacidad" class="form-control" 
                   value="<?= isset($tanque) ? esc($tanque['CAPACIDAD']) : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="localizacion" class="form-label">Localización</label>
            <input type="text" name="localizacion" id="localizacion" class="form-control" 
                   value="<?= isset($tanque) ? esc($tanque['LOCALIZACION']) : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="tipo_agua" class="form-label">Tipo de Agua</label>
            <select name="tipo_agua" id="tipo_agua" class="form-control" required>
                <option value="dulce" <?= isset($tanque) && $tanque['TIPO_AGUA'] == 'dulce' ? 'selected' : '' ?>>Dulce</option>
                <option value="salada" <?= isset($tanque) && $tanque['TIPO_AGUA'] == 'salada' ? 'selected' : '' ?>>Salada</option>
                <option value="neutra" <?= isset($tanque) && $tanque['TIPO_AGUA'] == 'neutra' ? 'selected' : '' ?>>Neutra</option>
                <option value="mixta" <?= isset($tanque) && $tanque['TIPO_AGUA'] == 'mixta' ? 'selected' : '' ?>>Mixta</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success"><?= isset($tanque) ? 'Actualizar' : 'Guardar' ?></button>
        <a href="<?= base_url('tanques') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
