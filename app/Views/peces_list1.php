<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Peces</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<body>
   
<!-- ----------- busqueda-------- -->
<div class="container mt-5">
    <h1 class="text-center">Listado de Peces</h1><br><br>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="<?= base_url('peces') ?>" class="mb-3">
        <div class="container d-flex">
            <div class="input-group w-auto">
                <!-- Campo Especie -->
                <input type="text" name="ESPECIE" class="form-control" placeholder="Especie" value="<?= $especieBusqueda ?>">

                <!-- Campo Fecha de Nacimiento -->
                <input type="date" name="FECHA_NACIMIENTO" class="form-control" placeholder="Fecha de Nacimiento" value="<?= isset($fechaNacimientoBusqueda) ? $fechaNacimientoBusqueda : '' ?>">

                <!-- Campo Peso -->
                <input type="number" step="any" name="PESO" class="form-control" placeholder="Peso" value="<?= isset($pesoBusqueda) ? $pesoBusqueda : '' ?>">

                <!-- Campo Longitud -->
                <input type="number" step="any" name="LONGITUD" class="form-control" placeholder="Longitud" value="<?= isset($longitudBusqueda) ? $longitudBusqueda : '' ?>">

                <!-- Select para Tipo de Agua -->
                <select name="TIPO_AGUA" class="form-control" >
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

    <?php if (session()->getFlashdata('success')): ?>
        <script>
            toastr.success('<?= session()->getFlashdata('success'); ?>');
        </script>
    <?php endif; ?>

    <a href="<?= base_url('peces/save') ?>" class="btn btn-primary mb-3">Crear Pez</a>

    <?php if (!empty($peces) && is_array($peces)): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Especie</th>
                <th>Fecha Nacimiento</th>
                <th>Peso</th>
                <th>Longitud</th>
                <th>Tipo de agua</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peces as $pez): ?>
                <tr>
                    <td><?= esc($pez['ESPECIE']) ?></td>
                    <td><?= esc($pez['FECHA_NACIMIENTO']) ?></td>
                    <td><?= esc($pez['PESO']) ?></td>
                    <td><?= esc($pez['LONGITUD']) ?></td>
                    <td><?= esc($pez['TIPO_AGUA']) ?></td>

                    <td>
                        <a href="<?= base_url('peces/save/' . $pez['ID_PEZ']) ?>" class="btn btn-warning">Editar</a>
                        <a href="<?= base_url('peces/baja/' . esc($pez['ID_PEZ'])) ?>" 
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Estás seguro de dar de baja este pez?');">Dar de baja</a>
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
        <p class="text-center">No hay peces registrados.</p>
    <?php endif; ?>

</div>
</body>
</html>
