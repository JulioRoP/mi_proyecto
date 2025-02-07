<?php

namespace App\Models;

use CodeIgniter\Model;

class ProveedoresModel extends Model
{
    protected $table = 'PROVEEDORES'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'ID_PROVEEDOR'; // Clave primaria de la tabla
    protected $allowedFields = [
        'NOMBRE_PROVEEDOR',
        'TIPO_PRODUCTO',
        'TELEFONO',
        'EMAIL',
        'FECHA_BAJA',
    ]; // Campos permitidos para inserción/actualización
}
