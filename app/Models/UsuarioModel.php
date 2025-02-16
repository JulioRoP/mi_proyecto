<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'USUARIOS';
    protected $primaryKey = 'ID_USUARIO';
    protected $allowedFields = [
        'NOMBRE_USUARIO',
        'EMAIL',
        'CONTRASEÑA_HASH',
        'FECHA_REGISTRO',
        'ID_ROL',
        'FECHA_BAJA',
    ];

    public function get_usuarios_with_roles_paginated($perPage)
    {
        return $this->select('USUARIOS.*, ROLES.NOMBRE_ROL')
            ->join('ROLES', 'USUARIOS.ID_ROL = ROLES.ID_ROL', 'left') // Asegurar usuarios sin rol
            ->paginate($perPage);
    }
    
    

}