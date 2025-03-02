<?php

namespace App\Controllers;

use App\Models\TanquesModel;

class TanquesController extends BaseController
{
    public function index()
    {
        $tanquesModel = new TanquesModel();
        $data['tanques'] = $tanquesModel->where('FECHA_BAJA', NULL)->findAll(); // Solo tanques activos

        // ------------buscador-------------
        $capacidadBusqueda = $this->request->getVar('CAPACIDAD'); 
        $localizacionBusqueda = $this->request->getVar('LOCALIZACION');
        $tipoAguaBusqueda = $this->request->getVar('TIPO_AGUA');
        $estadoBusqueda = $this->request->getVar('estado');

        if ($estadoBusqueda == 'activo') {
            $tanquesModel->where('FECHA_BAJA IS NULL');
        } elseif ($estadoBusqueda == 'baja') {
            $tanquesModel->where('FECHA_BAJA IS NOT NULL');
        } elseif ($estadoBusqueda == 'todos') {
            // No aplicamos ningún filtro de FECHA_BAJA
        }

        if($capacidadBusqueda) {
            $tanquesModel->like('CAPACIDAD', $capacidadBusqueda);
        }

        if ($localizacionBusqueda) {
            $tanquesModel->like('LOCALIZACION', $localizacionBusqueda);
        }

        if ($tipoAguaBusqueda) {
            $tanquesModel->like('TIPO_AGUA', $tipoAguaBusqueda);
        }

        $data['capacidadBusqueda'] = $capacidadBusqueda;
        $data['localizacionBusqueda'] = $localizacionBusqueda;
        $data['tipoAguaBusqueda'] = $tipoAguaBusqueda;
        $data['estadoBusqueda'] = $estadoBusqueda;

        // --------paginación-------------
        $perPage = 4;
        $page = $this->request->getVar('page') ?: 1;  // Obtener la página actual
        $data['tanques'] = $tanquesModel->paginate($perPage);
        $data['pager'] = $tanquesModel->pager;
        
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

        // Filtrar los tanques activos (si no hay filtros activos, exporta todos los tanques)
        $data['tanques'] = $tanquesModel->where('FECHA_BAJA', NULL)->findAll();

        // Definir el nombre del archivo CSV
        $filename = 'tanques_' . date('Y-m-d_H-i-s') . '.csv';

        // Abrir el archivo en modo escritura
        $file = fopen('php://output', 'w');

        // Establecer el encabezado de las columnas
        $header = ['CAPACIDAD', 'LOCALIZACION', 'TIPO_AGUA', 'FECHA_BAJA'];
        fputcsv($file, $header);

        // Escribir los datos de cada tanque
        foreach ($data['tanques'] as $tanque) {
            fputcsv($file, [
                $tanque['CAPACIDAD'],
                $tanque['LOCALIZACION'],
                $tanque['TIPO_AGUA'],
                $tanque['FECHA_BAJA']
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

