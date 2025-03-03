<?php

namespace App\Controllers;

use App\Models\PedidoModel;
use App\Models\UsuarioModel;
use App\Models\PecesModel;

class PedidosController extends BaseController
{
    public function pedidos()
    {
        return view('pedidos'); // Carga y retorna la vista del formulario de inicio de sesión.
    }
    public function index()
{
    $pedidoModel = new PedidoModel();
    $usuarioModel = new UsuarioModel(); // Necesitas el modelo de usuarios para la unión
    $pecesModel = new PecesModel(); // Necesitas el modelo de peces para la unión

    // Obtener filtros
    $usuarioBusqueda = $this->request->getVar('USUARIO');
    $estadoBusqueda = $this->request->getVar('estado');
    $fechaPedidoBusqueda = $this->request->getVar('FECHA_PEDIDO');
    $pezBusqueda = $this->request->getVar('ID_PEZ'); // Aquí obtienes el valor del filtro de pez

    // Obtener ordenación
    $sort = $this->request->getVar('sort') ?? 'FECHA_PEDIDO';
    $order = $this->request->getVar('order') ?? 'asc';
    $newOrder = ($order === 'asc') ? 'desc' : 'asc';

    // Aplicar filtros
    if ($estadoBusqueda) {
        $pedidoModel->where('ESTADO', $estadoBusqueda);
    }

    if ($usuarioBusqueda) {
        $pedidoModel->like('USUARIO', $usuarioBusqueda);
    }

    if ($fechaPedidoBusqueda) {
        $pedidoModel->like('FECHA_PEDIDO', $fechaPedidoBusqueda);
    }

    if ($pezBusqueda) {
        $pedidoModel->like('ID_PEZ', $pezBusqueda); // Filtrar también por ID_PEZ
    }

    // Realizar la unión para obtener NOMBRE_USUARIO y ESPECIE
    $pedidos = $pedidoModel->select('PEDIDOS.*, USUARIOS.NOMBRE_USUARIO, PECES.ESPECIE')
        ->join('USUARIOS', 'PEDIDOS.ID_USUARIO = USUARIOS.ID_USUARIO', 'left') // Unión con la tabla USUARIOS
        ->join('PECES', 'PEDIDOS.ID_PEZ = PECES.ID_PEZ', 'left') // Unión con la tabla PECES para obtener la ESPECIE
        ->orderBy($sort, $order)
        ->paginate(4);

    // Pasar los datos a la vista
    $data['pedidos'] = $pedidos;
    $data['pager'] = $pedidoModel->pager;
    $data['usuarioBusqueda'] = $usuarioBusqueda;
    $data['estadoBusqueda'] = $estadoBusqueda;
    $data['fechaPedidoBusqueda'] = $fechaPedidoBusqueda;
    $data['pezBusqueda'] = $pezBusqueda; // Asegúrate de pasar esta variable también
    $data['sort'] = $sort;
    $data['order'] = $order;
    $data['newOrder'] = $newOrder;

    return view('pedidos_list', $data);
}


    public function savePedido($id = null)
    {
        $pedidoModel = new PedidoModel();
        $usuarioModel = new UsuarioModel();
        $pecesModel = new PecesModel();
        
        // Obtener usuarios y peces para los selectores
        $data['usuarios'] = $usuarioModel->findAll();
        $data['peces'] = $pecesModel->findAll();
        
        // Cargar datos del pedido si es edición
        $data['pedido'] = $id ? $pedidoModel->find($id) : null;
        
        if ($this->request->getMethod() == 'POST') {
            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'usuario' => 'required',
                'pez' => 'required',
                'metodo_pago' => 'required',
                'estado' => 'required',
                'fecha_pedido' => 'required|valid_date[Y-m-d]',
            ]);
            
            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $pedidoData = [
                    'USUARIO_ID' => $this->request->getPost('usuario'),
                    'PEZ_ID' => $this->request->getPost('pez'),
                    'METODO_PAGO' => $this->request->getPost('metodo_pago'),
                    'ESTADO' => $this->request->getPost('estado'),
                    'FECHA_PEDIDO' => $this->request->getPost('fecha_pedido'),
                ];
                
                if ($id) {
                    // Actualizar el pedido
                    $pedidoModel->update($id, $pedidoData);
                    $message = 'Pedido actualizado correctamente.';
                } else {
                    // Crear un nuevo pedido
                    $pedidoModel->save($pedidoData);
                    $message = 'Pedido creado correctamente.';
                }
                
                // Redirigir al listado de pedidos
                return redirect()->to('/pedidos')->with('success', $message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('pedidos_form', $data);
    }

    public function baja($id)
    {
        // Cargar el modelo de pedido
        $pedidoModel = new PedidoModel();
        
        // Obtener el pedido por el ID
        $pedido = $pedidoModel->find($id);
        
        if ($pedido) {
            // Cambiar estado del pedido a "cancelado" o lo que sea adecuado
            $pedidoModel->update($id, ['ESTADO' => 'cancelado']);
            
            // Mensaje de éxito
            return redirect()->to('/pedidos')->with('success', 'Pedido cancelado correctamente.');
        } else {
            return redirect()->to('/pedidos')->with('error', 'Pedido no encontrado.');
        }
    }

    public function exportarCSV()
    {
        $pedidoModel = new PedidoModel();
        
        // Obtener todos los pedidos
        $pedidos = $pedidoModel->findAll();
        
        // Definir el nombre del archivo CSV
        $filename = 'pedidos_' . date('Y-m-d_H-i-s') . '.csv';
        
        // Abrir el archivo en modo escritura
        $file = fopen('php://output', 'w');
        
        // Establecer el encabezado de las columnas para el CSV
        $header = ['ID', 'USUARIO_ID', 'PEZ_ID', 'METODO_PAGO', 'ESTADO', 'FECHA_PEDIDO'];
        fputcsv($file, $header);
        
        // Escribir los datos de cada pedido
        foreach ($pedidos as $pedido) {
            fputcsv($file, [
                $pedido['ID'],
                $pedido['USUARIO_ID'],
                $pedido['PEZ_ID'],
                $pedido['METODO_PAGO'],
                $pedido['ESTADO'],
                $pedido['FECHA_PEDIDO']
            ]);
        }
        
        // Cerrar el archivo
        fclose($file);
        
        // Establecer las cabeceras HTTP para forzar la descarga del archivo CSV
        return $this->response->setHeader('Content-Type', 'application/csv')
                               ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"')
                               ->setHeader('Pragma', 'no-cache')
                               ->setHeader('Expires', '0');
    }
}
