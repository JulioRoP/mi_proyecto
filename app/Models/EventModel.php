<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class EventModel extends Model
{
    protected $table = 'EVENTO'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'PK_ID_EVENTO'; // Clave primaria de la tabla
    protected $allowedFields = [
        'TITULO',
        'FECHA_INICIO',
        'FECHA_FIN',
        'DESCRIPCION_ES',
        'DESCRIPCION_ENG',
        'FECHA_ELIMINACION',
    ];
}