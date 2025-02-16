<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos.
    protected $primaryKey = 'ID_USUARIO'; // Clave primaria.

    protected $allowedFields = ['NOMBRE_USUARIO', 'EMAIL', 'CONTRASEÑA_HASH', 'FECHA_REGISTRO', 'ID_ROL'];

    /**
     * Busca un usuario por su correo electrónico.
     */
    public function findByEmail($email)
    {
        return $this->where('EMAIL', $email)->first();
    }
}
