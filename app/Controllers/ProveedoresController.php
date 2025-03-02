<?php

namespace App\Controllers;

use App\Models\ProveedoresModel;

class ProveedoresController extends BaseController
{
    public function index()
    {
        $proveedoresModel = new ProveedoresModel();
        $data['proveedores'] = $proveedoresModel->where('FECHA_BAJA', NULL)->findAll(); // Solo proveedores activos

        // ------------ Buscador -------------
        $nombreProveedorBusqueda = $this->request->getVar('NOMBRE_PROVEEDOR');  // Obtener el término de búsqueda desde el formulario
        $tipoProductoBusqueda = $this->request->getVar('TIPO_PRODUCTO');
        $telefonoBusqueda = $this->request->getVar('TELEFONO');
        $emailBusqueda = $this->request->getVar('EMAIL');
        $estadoBusqueda = $this->request->getVar('estado');

        if ($estadoBusqueda == 'activo') {
            $proveedoresModel->where('FECHA_BAJA IS NULL');  // Solo activos
        } elseif ($estadoBusqueda == 'baja') {
            $proveedoresModel->where('FECHA_BAJA IS NOT NULL');  // Solo dados de baja
        }

        // Filtros adicionales
        if ($nombreProveedorBusqueda) {
            $proveedoresModel->like('NOMBRE_PROVEEDOR', $nombreProveedorBusqueda);
        }
        if ($tipoProductoBusqueda) {
            $proveedoresModel->like('TIPO_PRODUCTO', $tipoProductoBusqueda);
        }
        if ($telefonoBusqueda) {
            $proveedoresModel->like('TELEFONO', $telefonoBusqueda);
        }
        if ($emailBusqueda) {
            $proveedoresModel->like('EMAIL', $emailBusqueda);
        }

        $data['nombreProveedorBusqueda'] = $nombreProveedorBusqueda;
        $data['tipoProductoBusqueda'] = $tipoProductoBusqueda;
        $data['telefonoBusqueda'] = $telefonoBusqueda;
        $data['emailBusqueda'] = $emailBusqueda;
        $data['estadoBusqueda'] = $estadoBusqueda;

        // Paginación
        $perPage = 4; // Número de elementos por página
        $page = $this->request->getVar('page') ?: 1;  // Obtener la página actual
        $data['proveedores'] = $proveedoresModel->paginate($perPage);
        $data['pager'] = $proveedoresModel->pager;

        return view('proveedores_list', $data);
    }

    public function saveProveedores($id = null)
    {
        $proveedoresModel = new ProveedoresModel();
        helper(['form', 'url']);

        // Cargar datos del proveedor si es edición
        $data['proveedor'] = $id ? $proveedoresModel->find($id) : null;

        if ($this->request->getMethod() == 'POST') {

            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nombre_proveedor' => 'required|min_length[3]|max_length[255]',
                'tipo_producto' => 'required|min_length[3]|max_length[255]',
                'telefono' => 'required|numeric',
                'email' => 'required|valid_email',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $proveedoresData = [
                    'NOMBRE_PROVEEDOR' => $this->request->getPost('nombre_proveedor'),
                    'TIPO_PRODUCTO' => $this->request->getPost('tipo_producto'),
                    'TELEFONO' => $this->request->getPost('telefono'),
                    'EMAIL' => $this->request->getPost('email'),
                    'FECHA_REGISTRO' => date('Y-m-d'),
                ];

                if ($id) {
                    // Actualizar proveedor existente
                    $proveedoresModel->update($id, $proveedoresData);
                    $message = 'Proveedor actualizado correctamente.';
                } else {
                    // Crear nuevo proveedor
                    $proveedoresModel->save($proveedoresData);
                    $message = 'Proveedor creado correctamente.';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/proveedores')->with('success', $message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('proveedores_form', $data);
    }

    // public function baja($id)
    // {
    //     $proveedoresModel = new ProveedoresModel();

    //     // Obtener la fecha actual
    //     $fechaBaja = date('Y-m-d');

    //     // Actualizar el campo FECHA_BAJA con la fecha actual
    //     $proveedoresModel->update($id, ['FECHA_BAJA' => $fechaBaja]);

    //     // Redirigir al listado con un mensaje de éxito
    //     return redirect()->to('/proveedores')->with('success', 'Proveedor dado de baja correctamente.');
    // }
    public function baja($id)
    {
        $proveedoresModel = new ProveedoresModel();
        $proveedor = $proveedoresModel->find($id); // Obtener el proveedor actual
    
        if (is_null($proveedor['FECHA_BAJA'])) {
            // Obtener la fecha actual
            $fechaBaja = date('Y-m-d');
    
            // Actualizar el campo FECHA_BAJA con la fecha actual
            $proveedoresModel->update($id, ['FECHA_BAJA' => $fechaBaja]);
    
            // Redirigir al listado con un mensaje de éxito
            return redirect()->to('/proveedores')->with('success', 'Proveedor dado de baja correctamente.');
        } else {
            // Si FECHA_BAJA no es null, dar de alta (poner FECHA_BAJA a null)
            $proveedoresModel->update($id, ['FECHA_BAJA' => null]);
    
            // Redirigir al listado con un mensaje de éxito
            return redirect()->to('/proveedores')->with('success', 'Proveedor dado de alta correctamente.');
        }
    }
    
    public function exportarProveedores()
    {
        $proveedoresModel = new ProveedoresModel();
        $proveedores = $proveedoresModel->findAll(); // Obtener todos los proveedores

        // Definir el encabezado para la descarga del archivo CSV
        $filename = 'proveedores_' . date('Y-m-d_H-i-s') . '.csv';
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        $output = fopen('php://output', 'w');

        // Escribir los encabezados del archivo CSV
        fputcsv($output, ['ID_PROVEEDOR', 'NOMBRE_PROVEEDOR', 'TIPO_PRODUCTO', 'TELEFONO', 'EMAIL', 'FECHA_BAJA']);

        // Escribir los datos de los proveedores
        foreach ($proveedores as $proveedor) {
            fputcsv($output, [
                $proveedor['ID_PROVEEDOR'],
                $proveedor['NOMBRE_PROVEEDOR'],
                $proveedor['TIPO_PRODUCTO'],
                $proveedor['TELEFONO'],
                $proveedor['EMAIL'],
                $proveedor['FECHA_BAJA'],
            ]);
        }

        fclose($output);
        exit();
    }

}
