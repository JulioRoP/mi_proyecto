<?php

namespace App\Models;

use CodeIgniter\Model;

class PecesModel extends Model
{
    protected $table = 'PECES'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'ID_PEZ'; // Clave primaria de la tabla
    protected $allowedFields = [
        'ESPECIE',
        'FECHA_NACIMIENTO',
        'PESO',
        'LONGITUD',
        'TIPO_AGUA',
        'FECHA_BAJA',
    ]; // Campos permitidos para inserción/actualización
}
