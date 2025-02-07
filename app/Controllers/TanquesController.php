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

    public function saveTanque($id = null)
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

    public function baja($id)
    {
        $tanquesModel = new TanquesModel();

        // Obtener la fecha actual
        $fechaBaja = date('Y-m-d');

        // Actualizar el campo FECHA_BAJA con la fecha actual
        $tanquesModel->update($id, ['FECHA_BAJA' => $fechaBaja]);

        // Redirigir al listado con un mensaje de éxito
        return redirect()->to('/tanques')->with('success', 'Tanque dado de baja correctamente.');
    }
}
