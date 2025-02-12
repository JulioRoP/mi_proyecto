<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Tanques</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<body>
   
<!-- ----------- busqueda-------- -->
<div class="container mt-5">
    <h1 class="text-center">Listado de Tanques</h1><br><br>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="<?= base_url('tanques') ?>" class="mb-3">
        <div class="container d-flex">
            <div class="input-group w-auto">
                <!-- Campo Capacidad -->
                <input type="text" name="CAPACIDAD" class="form-control" placeholder="Capacidad" value="<?= $capacidadBusqueda ?>">

                <!-- Campo Localización -->
                <input type="text" name="LOCALIZACION" class="form-control" placeholder="Localización" value="<?= $localizacionBusqueda ?>">

                <!-- Select para Tipo de Agua -->
                <select name="TIPO_AGUA" class="form-control">
                    <option value="">Tipo de Agua</option>
                    <option value="salada" <?= isset($tipoAguaBusqueda) && $tipoAguaBusqueda == 'salada' ? 'selected' : '' ?>>Salada</option>
                    <option value="dulce" <?= isset($tipoAguaBusqueda) && $tipoAguaBusqueda == 'dulce' ? 'selected' : '' ?>>Dulce</option>
                    <option value="neutra" <?= isset($tipoAguaBusqueda) && $tipoAguaBusqueda == 'neutra' ? 'selected' : '' ?>>Neutra</option>
                    <option value="mixta" <?= isset($tipoAguaBusqueda) && $tipoAguaBusqueda == 'mixta' ? 'selected' : '' ?>>Mixta</option>
                </select>

                <!-- Select para Estado -->
                <select name="estado" class="form-control" onchange="this.form.submit()">
                    <option value="" disabled selected>Estado</option>
                    <option value="activo" <?= isset($estadoBusqueda) && $estadoBusqueda == 'activo' ? 'selected' : '' ?>>Activo</option>
                    <option value="baja" <?= isset($estadoBusqueda) && $estadoBusqueda == 'baja' ? 'selected' : '' ?>>De baja</option>
                    <option value="todos" <?= isset($estadoBusqueda) && $estadoBusqueda == 'todos' ? 'selected' : '' ?>>Todos</option>
                </select>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form><br>
    <button onclick="location.href='<?php echo base_url('home'); ?>'" class="btn btn-primary mb-3">Volver a Inicio</button>

    <a href="<?= base_url('tanques/save') ?>" class="btn btn-primary mb-3">Crear Tanque</a>

    <?php if (!empty($tanques) && is_array($tanques)): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Capacidad</th>
                <th>Localización</th>
                <th>Tipo de Agua</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tanques as $tanque): ?>
                <tr>
                    <td><?= esc($tanque['CAPACIDAD']) ?></td>
                    <td><?= esc($tanque['LOCALIZACION']) ?></td>
                    <td><?= esc($tanque['TIPO_AGUA']) ?></td>
                    <td>
                        <a href="<?= base_url('tanques/save/' . $tanque['ID_TANQUE']) ?>" class="btn btn-warning">Editar</a>
                        <a href="<?= base_url('tanques/baja/' . esc($tanque['ID_TANQUE'])) ?>" 
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Estás seguro de dar de baja este tanque?');">Dar de baja</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- -----------paginación------------ -->
    <div class="mt-4">
        <?= $pager->links('default', 'custom_pagination') ?>
    </div>
<?php else: ?>
    <p class="text-center">No hay tanques registrados.</p>
<?php endif; ?>
</div>
</body>
</html>
