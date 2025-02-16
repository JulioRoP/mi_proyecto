<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistroModel extends Model
{
    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'ID_USUARIO'; // Clave primaria

    protected $allowedFields = ['NOMBRE_USUARIO', 'EMAIL', 'CONTRASEÑA_HASH', 'FECHA_REGISTRO', 'ID_ROL'];

    protected $useTimestamps = false; // Si no usas created_at y updated_at
}
