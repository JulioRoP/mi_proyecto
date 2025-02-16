<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pez) ? 'Editar Pez' : 'Crear Pez' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center"><?= isset($pez) ? 'Editar Pez' : 'Crear Pez' ?></h1>

    <!-- Mostrar errores de validación -->
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <!-- Formulario -->
    <form action="<?= isset($pez) ? base_url('peces/save/' . $pez['ID_PEZ']) : base_url('peces/save') ?>" method="post">
        <?= csrf_field(); ?>

        <div class="mb-3">
            <label for="especie" class="form-label">Especie</label>
            <input type="text" name="especie" id="especie" class="form-control" 
                   value="<?= isset($pez) ? esc($pez['ESPECIE']) : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" 
                   value="<?= isset($pez) ? esc($pez['FECHA_NACIMIENTO']) : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="peso" class="form-label">Peso</label>
            <input type="number" step="any" name="peso" id="peso" class="form-control" 
                   value="<?= isset($pez) ? esc($pez['PESO']) : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="longitud" class="form-label">Longitud</label>
            <input type="number" step="any" name="longitud" id="longitud" class="form-control" 
                   value="<?= isset($pez) ? esc($pez['LONGITUD']) : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="tipo_agua" class="form-label">Tipo de Agua</label>
            <select name="tipo_agua" id="tipo_agua" class="form-control" required>
                <option value="" disabled selected>Seleccionar Tipo de Agua</option>
                <option value="dulce" <?= isset($pez) && $pez['TIPO_AGUA'] == 'dulce' ? 'selected' : '' ?>>Dulce</option>
                <option value="salada" <?= isset($pez) && $pez['TIPO_AGUA'] == 'salada' ? 'selected' : '' ?>>Salada</option>
                <option value="neutra" <?= isset($pez) && $pez['TIPO_AGUA'] == 'neutra' ? 'selected' : '' ?>>Neutra</option>
                <option value="mixta" <?= isset($pez) && $pez['TIPO_AGUA'] == 'mixta' ? 'selected' : '' ?>>Mixta</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success"><?= isset($pez) ? 'Actualizar' : 'Guardar' ?></button>
        <a href="<?= base_url('peces') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
