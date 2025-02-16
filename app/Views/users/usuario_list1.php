<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<body>
   
<!-- ----------- busqueda-------- -->
<div class="container mt-5">
    <h1 class="text-center">Listado de Usuarios</h1><br><br>
        <!-- Formulario de búsqueda -->
    <form method="GET" action="<?= base_url('usuarios') ?>" class="mb-3">
        <div class="container d-flex">
            <div class="input-group w-auto">
                <input type="text" name="NOMBRE_USUARIO" class="form-control" placeholder="Nombre" value="<?= $nombreUsuarioBusqueda  ?>">
                <button type="submit" class="btn btn-primary">Buscar</button>&nbsp;&nbsp;
                <input type="text" name="EMAIL" class="form-control" placeholder="Email" value="<?= isset($emailUsuarioBusqueda) ? $emailUsuarioBusqueda : '' ?>">
                <button type="submit" class="btn btn-primary">Buscar</button>&nbsp;&nbsp;
                <input type="date" name="FECHA_REGISTRO" class="form-control" placeholder="Fecha de Registro" value="<?= isset($fechaRegistroBusqueda) ? $fechaRegistroBusqueda : '' ?>">
                <button type="submit" class="btn btn-primary">Buscar</button>&nbsp;&nbsp;
                <input type="text" name="ROL" class="form-control" placeholder="Rol" value="<?= isset($rolUsuarioBusqueda) ? $rolUsuarioBusqueda : '' ?>">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <!-- Agrega más campos según sea necesario -->
                <!-- Select para Filtrar por estado (Activo, Baja, Todos) -->
                <select name="estado" class="form-control" onchange="this.form.submit()">
                    <option value="" disabled selected>Estado</option>
                    <option value="activo" <?= isset($estadoBusqueda) && $estadoBusqueda == 'activo' ? 'selected' : '' ?>>Activo</option>
                    <option value="baja" <?= isset($estadoBusqueda) && $estadoBusqueda == 'baja' ? 'selected' : '' ?>>De baja</option>
                    <option value="todos" <?= isset($estadoBusqueda) && $estadoBusqueda == 'todos' ? 'selected' : '' ?>>Todos</option>
                </select>
            </div>
        </div>
    </form><br>
    <button onclick="location.href='<?php echo base_url('home'); ?>'" class="btn btn-primary mb-3">Volver a Inicio</button>

    <?php if (session()->getFlashdata('success')): ?>
        <script>
            toastr.success('<?= session()->getFlashdata('success'); ?>');
        </script>
    <?php endif; ?>

    <a href="<?= base_url('usuarios/save') ?>" class="btn btn-primary mb-3">Crear Usuario</a>

    <?php if (!empty($usuarios) && is_array($usuarios)): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Nombre</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Fecha registro</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= esc($usuario['NOMBRE_USUARIO']) ?></td>
                    <td><?= esc($usuario['EMAIL']) ?></td>
                    <td><?= esc($usuario['CONTRASEÑA_HASH']) ?></td>
                    <td><?= esc($usuario['FECHA_REGISTRO']) ?></td>
                    <td><?= esc($usuario['ID_ROL']) ?></td>
                    <td>
                        <a href="<?= base_url('usuarios/save/' . $usuario['ID_USUARIO']) ?>" class="btn btn-warning">Editar</a>
                        <a href="<?= base_url('usuarios/baja/' . esc($usuario['ID_USUARIO'])) ?>" 
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Estás seguro de dar de baja este usuario?');">Dar de baja</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- -----------paginacion------------ -->
    <div class="mt-4">
        <?= $pager->links('default', 'custom_pagination') ?>
    </div>
<?php else: ?>
    <p class="text-center">No hay usuarios registrados.</p>
<?php endif; ?>

</div>
</body>
</html>
