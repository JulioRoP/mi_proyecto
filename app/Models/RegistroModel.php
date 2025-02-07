<?php
namespace App\Models;

use CodeIgniter\Model;

class RegistroModel extends Model {
    protected $table = 'USUARIOS';
    protected $primaryKey = 'ID_USUARIO';
    protected $allowedFields = ['NOMBRE_USUARIO', 'EMAIL', 'CONTRASEÑA_HASH', 'FECHA_REGISTRO', 'FECHA_BAJA', 'ID_ROL'];
}
