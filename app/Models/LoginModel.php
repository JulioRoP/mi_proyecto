<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    // Nombre de la tabla
    protected $table = 'USUARIOS'; // Asegúrate de que sea el nombre correcto de la tabla
    protected $primaryKey = 'ID_USUARIO';

    // Verificar las credenciales de login
    public function check_login($email, $password)
    {
        // Buscar al usuario por su email
        $user = $this->where('EMAIL', $email)->first();

        // Verificar la contraseña utilizando password_verify
        if ($user && password_verify($password, $user['CONTRASEÑA_HASH'])) {
            return $user; // Si la contraseña es correcta, devolvemos los datos del usuario
        }
        
        return null; // Si no hay coincidencias, devolvemos null
    }
}
