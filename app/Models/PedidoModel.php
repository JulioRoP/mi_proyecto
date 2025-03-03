<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table = 'PEDIDOS'; // Nombre de la tabla de pedidos
    protected $primaryKey = 'ID_PEDIDO'; // Clave primaria de la tabla
    protected $allowedFields = [
        'USUARIO_ID',
        'PEZ_ID',
        'METODO_PAGO',
        'ESTADO',
        'FECHA_PEDIDO',
    ];

    // Método para obtener pedidos con información de usuario y pez
    public function get_pedidos_with_details_paginated($perPage)
    {
        return $this->select('PEDIDOS.*, USUARIOS.NOMBRE_USUARIO, PECES.ESPECIE, PECES.TIPO_AGUA')
            ->join('USUARIOS', 'PEDIDOS.USUARIO_ID = USUARIOS.ID_USUARIO', 'left') // Unir con la tabla de usuarios
            ->join('PECES', 'PEDIDOS.PEZ_ID = PECES.ID_PEZ', 'left') // Unir con la tabla de peces
            ->paginate($perPage); // Paginar los resultados
    }

    // Método para obtener todos los pedidos
    public function getAllPedidos()
    {
        return $this->findAll();
    }

    // Método para cambiar el estado de un pedido (por ejemplo, "cancelado")
    public function updateEstado($id, $estado)
    {
        return $this->update($id, ['ESTADO' => $estado]);
    }
}
