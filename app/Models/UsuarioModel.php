<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'USUARIOS'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'ID_USUARIO'; // Clave primaria de la tabla
    protected $allowedFields = [
        'NOMBRE_USUARIO',
        'EMAIL',
        'CONTRASEÑA_HASH',
        'FECHA_REGISTRO',
        'ID_ROL',
        'FECHA_BAJA',
    ]; // Campos permitidos para inserción/actualización
}
