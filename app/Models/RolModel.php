<?php

namespace App\Models;

use CodeIgniter\Model;

class RolModel extends Model
{
    // Especifica el nombre de la tabla en la base de datos
    protected $table = 'ROLES';  // Asegúrate de que el nombre de la tabla sea correcto
    protected $primaryKey = 'ID_ROL';  // El campo que actúa como clave primaria
    protected $allowedFields = ['ID_ROL', 'NOMBRE_ROL'];  // Los campos que se pueden insertar o actualizar

    // Si necesitas reglas de validación específicas para la tabla de roles, las puedes agregar aquí.
    // Por ejemplo, si quieres que un rol siempre tenga un nombre único
    // protected $validationRules = [
    //     'NOMBRE_ROL' => 'required|is_unique[ROLES.NOMBRE_ROL]',
    // ];

    // Función para obtener todos los roles
    public function getRoles()
    {
        return $this->findAll();
    }

    // Función para obtener un rol por su ID
    public function getRolById($id)
    {
        return $this->where('ID_ROL', $id)->first();
    }
}
