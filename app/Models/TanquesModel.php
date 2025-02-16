<?php

namespace App\Models;

use CodeIgniter\Model;

class TanquesModel extends Model
{
    protected $table = 'TANQUES'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'ID_TANQUE'; // Clave primaria de la tabla
    protected $allowedFields = [
        'CAPACIDAD',
        'LOCALIZACION',
        'TIPO_AGUA',
        'FECHA_BAJA',
    ]; // Campos permitidos para inserción/actualización
}
