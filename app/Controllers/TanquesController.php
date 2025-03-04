<?php

namespace App\Controllers;

use App\Models\TanquesModel;

class TanquesController extends BaseController
{
    public function index()
    {
        $tanquesModel = new TanquesModel();

        // Obtener filtros
        $capacidadBusqueda = $this->request->getVar('CAPACIDAD'); 
        $localizacionBusqueda = $this->request->getVar('LOCALIZACION');
        $tipoAguaBusqueda = $this->request->getVar('TIPO_AGUA');
        $estadoBusqueda = $this->request->getVar('estado');

        // Obtener ordenación
        $sort = $this->request->getVar('sort') ?? 'CAPACIDAD';
        $order = $this->request->getVar('order') ?? 'asc';
        $newOrder = ($order === 'asc') ? 'desc' : 'asc';

        // Aplicar filtros
        if ($estadoBusqueda == 'activo') {
            $tanquesModel->where('FECHA_BAJA IS NULL');
        } elseif ($estadoBusqueda == 'baja') {
            $tanquesModel->where('FECHA_BAJA IS NOT NULL');
        } elseif ($estadoBusqueda == 'todos') {
            // No aplicamos ningún filtro de FECHA_BAJA
        }

        if ($capacidadBusqueda) {
            $tanquesModel->like('CAPACIDAD', $capacidadBusqueda);
        }

        if ($localizacionBusqueda) {
            $tanquesModel->like('LOCALIZACION', $localizacionBusqueda);
        }

        if ($tipoAguaBusqueda) {
            $tanquesModel->like('TIPO_AGUA', $tipoAguaBusqueda);
        }

        // Aplicar ordenación
        $tanquesModel->orderBy($sort, $order);

        // Paginación
        $perPage = 4;
        $page = $this->request->getVar('page') ?: 1;
        $data['tanques'] = $tanquesModel->paginate($perPage);
        $data['pager'] = $tanquesModel->pager;

        // Pasar datos a la vista
        $data['capacidadBusqueda'] = $capacidadBusqueda;
        $data['localizacionBusqueda'] = $localizacionBusqueda;
        $data['tipoAguaBusqueda'] = $tipoAguaBusqueda;
        $data['estadoBusqueda'] = $estadoBusqueda;
        $data['sort'] = $sort;
        $data['order'] = $order;
        $data['newOrder'] = $newOrder;

        return view('tanques_list', $data);
    }


    public function saveTanques($id = null)
    {
        $tanquesModel = new TanquesModel();
        helper(['form', 'url']);

        $data['tanque'] = $id ? $tanquesModel->find($id) : null;

        if ($this->request->getMethod() == 'POST') {

            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'capacidad' => 'required|numeric',
                'localizacion' => 'required|min_length[3]|max_length[255]',
                'tipo_agua' => 'required|in_list[salada,dulce,neutra,mixta]',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $tanquesData = [
                    'CAPACIDAD' => $this->request->getPost('capacidad'),
                    'LOCALIZACION' => $this->request->getPost('localizacion'),
                    'TIPO_AGUA' => $this->request->getPost('tipo_agua'),
                    'FECHA_REGISTRO' => date('Y-m-d'),
                ];

                if ($id) {
                    // Actualizar tanque existente
                    $tanquesModel->update($id, $tanquesData);
                    $message = 'Tanque actualizado correctamente.';
                } else {
                    // Crear nuevo tanque
                    $tanquesModel->save($tanquesData);
                    $message = 'Tanque creado correctamente.';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/tanques')->with('success', $message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('tanques_form', $data);
    }

    // public function baja($id)
    // {
    //     $tanquesModel = new TanquesModel();

    //     // Obtener la fecha actual
    //     $fechaBaja = date('Y-m-d');

    //     // Actualizar el campo FECHA_BAJA con la fecha actual
    //     $tanquesModel->update($id, ['FECHA_BAJA' => $fechaBaja]);

    //     // Redirigir al listado con un mensaje de éxito
    //     return redirect()->to('/tanques')->with('success', 'Tanque dado de baja correctamente.');
    // }


    public function baja($id)
    {
        $tanquesModel = new TanquesModel();
        $tanque = $tanquesModel->find($id); // Obtener el tanque actual

        if (is_null($tanque['FECHA_BAJA'])) {
            // Obtener la fecha actual
            $fechaBaja = date('Y-m-d');

            // Actualizar el campo FECHA_BAJA con la fecha actual
            $tanquesModel->update($id, ['FECHA_BAJA' => $fechaBaja]);

            // Redirigir al listado con un mensaje de éxito
            return redirect()->to('/tanques')->with('success', 'Tanque dado de baja correctamente.');
        } else {
            // Si FECHA_BAJA no es null, dar de alta (poner FECHA_BAJA a null)
            $tanquesModel->update($id, ['FECHA_BAJA' => null]);

            // Redirigir al listado con un mensaje de éxito
            return redirect()->to('/tanques')->with('success', 'Tanque dado de alta correctamente.');
        }
    }
    public function exportarCSV()
{
    $tanquesModel = new TanquesModel();

    // Obtener TODOS los tanques (sin filtrar por FECHA_BAJA)
    $tanques = $tanquesModel->findAll(); 

    // Verificar si hay datos antes de continuar
    if (empty($tanques)) {
        die('No hay datos para exportar.');
    }

    // Definir el nombre del archivo CSV
    $filename = 'tanques_' . date('Y-m-d_H-i-s') . '.csv';

    // Limpiar el buffer de salida para evitar errores
    ob_clean();
    ob_start();

    // Establecer las cabeceras HTTP para la descarga
    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Abrir la salida para escribir el CSV
    $file = fopen('php://output', 'w');

    // Escribir la cabecera del CSV
    fputcsv($file, ['CAPACIDAD', 'LOCALIZACION', 'TIPO_AGUA', 'FECHA_BAJA']);

    // Escribir los datos de cada tanque
    foreach ($tanques as $tanque) {
        fputcsv($file, [
            $tanque['CAPACIDAD'] ?? '', 
            $tanque['LOCALIZACION'] ?? '', 
            $tanque['TIPO_AGUA'] ?? '', 
            $tanque['FECHA_BAJA'] ?? ''  // Si es NULL, se pone vacío
        ]);
    }

    // Cerrar el archivo
    fclose($file);

    // Enviar la salida del buffer y terminar el script
    ob_end_flush();
    exit;
}


}

