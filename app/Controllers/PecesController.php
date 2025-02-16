<?php

namespace App\Controllers;

use App\Models\PecesModel;

class PecesController extends BaseController
{
    public function index()
    {
        $pecesModel = new PecesModel();
        $data['peces'] = $pecesModel->where('FECHA_BAJA', NULL)->findAll(); // Solo peces activos

        // ------------buscador-------------
        $especieBusqueda = $this->request->getVar('ESPECIE');  // Obtener el término de búsqueda desde el formulario
        $fechaNacimientoBusqueda = $this->request->getVar('FECHA_NACIMIENTO');
        $pesoBusqueda = $this->request->getVar('PESO');
        $longitudBusqueda = $this->request->getVar('LONGITUD');
        $estadoBusqueda = $this->request->getVar('estado');
        $tipoAguaBusqueda = $this->request->getVar('TIPO_AGUA');  // Nueva variable para tipo de agua

        // Aplicar los filtros si es necesario
        if ($estadoBusqueda == 'activo') {
            $pecesModel->where('FECHA_BAJA IS NULL');  // Solo activos
        } elseif ($estadoBusqueda == 'baja') {
            $pecesModel->where('FECHA_BAJA IS NOT NULL');  // Solo dados de baja
        } elseif ($estadoBusqueda == 'todos') {
            // No aplicamos ningún filtro de FECHA_BAJA, mostramos todos
        }

        // Aplicar filtro si se introduce especie
        if($especieBusqueda) {
            $pecesModel->like('ESPECIE', $especieBusqueda);
        }

        if ($fechaNacimientoBusqueda) {
            $pecesModel->like('FECHA_NACIMIENTO', $fechaNacimientoBusqueda);
        }

        if ($pesoBusqueda) {
            $pecesModel->like('PESO', $pesoBusqueda);
        }

        if ($longitudBusqueda) {
            $pecesModel->like('LONGITUD', $longitudBusqueda);
        }

        // Aplicar filtro para tipo de agua (nuevo campo)
        if ($tipoAguaBusqueda) {
            $pecesModel->like('TIPO_AGUA', $tipoAguaBusqueda);
        }

        // Agregar más filtros si es necesario

        $data['especieBusqueda'] = $especieBusqueda;
        $data['fechaNacimientoBusqueda'] = $fechaNacimientoBusqueda;
        $data['pesoBusqueda'] = $pesoBusqueda;
        $data['longitudBusqueda'] = $longitudBusqueda;
        $data['estadoBusqueda'] = $estadoBusqueda;
        $data['tipoAguaBusqueda'] = $tipoAguaBusqueda;  // Pasar el valor de búsqueda de tipo de agua

        // ------------buscador-------------

        // --------paginación-------------
        $perPage = 4; // Número de elementos por página
        $page = $this->request->getVar('page') ?: 1;  // Obtener la página actual
        $data['peces'] = $pecesModel->paginate($perPage, 'default', $page);
        $data['pager'] = $pecesModel->pager;
        // --------paginación-------------

        return view('peces_list', $data);
    }

    public function savePeces($id = null)
    {
        $pecesModel = new PecesModel();
        helper(['form', 'url']);

        // Cargar datos del pez si es edición
        $data['pez'] = $id ? $pecesModel->find($id) : null;

        if ($this->request->getMethod() == 'POST') {

            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'especie' => 'required|min_length[3]|max_length[255]',
                'fecha_nacimiento' => 'required|valid_date',
                'peso' => 'required|numeric',
                'longitud' => 'required|numeric',
                'tipo_agua' => 'required|in_list[salada,dulce,neutra,mixta]',  // Nueva regla de validación para el tipo de agua
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $pecesData = [
                    'ESPECIE' => $this->request->getPost('especie'),
                    'FECHA_NACIMIENTO' => $this->request->getPost('fecha_nacimiento'),
                    'PESO' => $this->request->getPost('peso'),
                    'LONGITUD' => $this->request->getPost('longitud'),
                    'TIPO_AGUA' => $this->request->getPost('tipo_agua'),  // Usar el tipo de agua en lugar de observaciones
                    'FECHA_REGISTRO' => date('Y-m-d'),
                ];

                if ($id) {
                    // Actualizar pez existente
                    $pecesModel->update($id, $pecesData);
                    $message = 'Pez actualizado correctamente.';
                } else {
                    // Crear nuevo pez
                    $pecesModel->save($pecesData);
                    $message = 'Pez creado correctamente.';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/peces')->with('success', $message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('peces_form', $data);
    }

    // public function baja($id)
    // {
    //     $pecesModel = new PecesModel();

    //     // Obtener la fecha actual
    //     $fechaBaja = date('Y-m-d');

    //     // Actualizar el campo FECHA_BAJA con la fecha actual
    //     $pecesModel->update($id, ['FECHA_BAJA' => $fechaBaja]);

    //     // Redirigir al listado con un mensaje de éxito
    //     return redirect()->to('/peces')->with('success', 'Pez dado de baja correctamente.');
    // }  
    public function baja($id)
    {
        $pecesModel = new PecesModel();
        $pez = $pecesModel->find($id); // Obtener el pez actual
    
        if (is_null($pez['FECHA_BAJA'])) {
            // Obtener la fecha actual
            $fechaBaja = date('Y-m-d');
    
            // Actualizar el campo FECHA_BAJA con la fecha actual
            $pecesModel->update($id, ['FECHA_BAJA' => $fechaBaja]);
    
            // Redirigir al listado con un mensaje de éxito
            return redirect()->to('/peces')->with('success', 'Pez dado de baja correctamente.');
        } else {
            // Si FECHA_BAJA no es null, dar de alta (poner FECHA_BAJA a null)
            $pecesModel->update($id, ['FECHA_BAJA' => null]);
    
            // Redirigir al listado con un mensaje de éxito
            return redirect()->to('/peces')->with('success', 'Pez dado de alta correctamente.');
        }
    }
    
}
