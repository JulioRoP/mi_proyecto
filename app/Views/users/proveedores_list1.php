<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Proveedores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Listado de Proveedores</h1><br><br>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="<?= base_url('proveedores') ?>" class="mb-3">
        <div class="input-group">
            <input type="text" name="NOMBRE_PROVEEDOR" class="form-control" placeholder="Nombre del Proveedor" value="<?= $nombreProveedorBusqueda ?>">
            <input type="text" name="TIPO_PRODUCTO" class="form-control" placeholder="Tipo de Producto" value="<?= $tipoProductoBusqueda ?>">
            <input type="text" name="TELEFONO" class="form-control" placeholder="Teléfono" value="<?= $telefonoBusqueda ?>">
            <input type="email" name="EMAIL" class="form-control" placeholder="Email" value="<?= $emailBusqueda ?>">
            <select name="estado" class="form-control">
                <option value="activo" <?= $estadoBusqueda == 'activo' ? 'selected' : '' ?>>Activo</option>
                <option value="baja" <?= $estadoBusqueda == 'baja' ? 'selected' : '' ?>>De baja</option>
                <option value="todos" <?= $estadoBusqueda == 'todos' ? 'selected' : '' ?>>Todos</option>
            </select>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>
    <button onclick="location.href='<?php echo base_url('home'); ?>'" class="btn btn-primary mb-3">Volver a Inicio</button>


    <!-- Mensaje de éxito -->
    <?php if (session()->getFlashdata('success')): ?>
        <script>
            toastr.success('<?= session()->getFlashdata('success'); ?>');
        </script>
    <?php endif; ?>

    <a href="<?= base_url('proveedores/save') ?>" class="btn btn-primary mb-3">Crear Proveedor</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre Proveedor</th>
                <th>Tipo Producto</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proveedores as $proveedor): ?>
            <tr>
                <td><?= esc($proveedor['NOMBRE_PROVEEDOR']) ?></td>
                <td><?= esc($proveedor['TIPO_PRODUCTO']) ?></td>
                <td><?= esc($proveedor['TELEFONO']) ?></td>
                <td><?= esc($proveedor['EMAIL']) ?></td>
                <td>
                    <a href="<?= base_url('proveedores/save/' . esc($proveedor['ID_PROVEEDOR'])) ?>" class="btn btn-warning">Editar</a>
                    <a href="<?= base_url('proveedores/baja/' . esc($proveedor['ID_PROVEEDOR'])) ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de dar de baja este proveedor?');">Dar de baja</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Paginación -->
    <!-- -----------paginación------------ -->
    <div class="mt-4">
        <?= $pager->links('default', 'custom_pagination') ?>
    </div>
</div>
</body>
</html>
