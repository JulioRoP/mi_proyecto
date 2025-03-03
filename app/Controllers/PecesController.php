<?php

namespace App\Controllers;

use App\Models\PecesModel;

class PecesController extends BaseController
{
    public function index()
    {
        $pecesModel = new PecesModel();

        // Obtener filtros
        $especieBusqueda = $this->request->getVar('ESPECIE');
        $fechaNacimientoBusqueda = $this->request->getVar('FECHA_NACIMIENTO');
        $pesoBusqueda = $this->request->getVar('PESO');
        $longitudBusqueda = $this->request->getVar('LONGITUD');
        $estadoBusqueda = $this->request->getVar('estado');
        $tipoAguaBusqueda = $this->request->getVar('TIPO_AGUA');
        
        // Obtener ordenación
        $sort = $this->request->getVar('sort') ?? 'ID_PEZ';
        $order = $this->request->getVar('order') ?? 'asc';
        $newOrder = ($order === 'asc') ? 'desc' : 'asc';
        
        // Aplicar filtros
        if ($estadoBusqueda == 'activo') {
            $pecesModel->where('FECHA_BAJA IS NULL');
        } elseif ($estadoBusqueda == 'baja') {
            $pecesModel->where('FECHA_BAJA IS NOT NULL');
        }
        
        if ($especieBusqueda) {
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
        if ($tipoAguaBusqueda) {
            $pecesModel->like('TIPO_AGUA', $tipoAguaBusqueda);
        }
        
        // Aplicar ordenación
        $pecesModel->orderBy($sort, $order);

        // Paginación
        $perPage = 4;
        $page = $this->request->getVar('page') ?: 1;
        $data['peces'] = $pecesModel->paginate($perPage, 'default', $page);
        $data['pager'] = $pecesModel->pager;
        
        // Pasar datos a la vista
        $data['especieBusqueda'] = $especieBusqueda;
        $data['fechaNacimientoBusqueda'] = $fechaNacimientoBusqueda;
        $data['pesoBusqueda'] = $pesoBusqueda;
        $data['longitudBusqueda'] = $longitudBusqueda;
        $data['estadoBusqueda'] = $estadoBusqueda;
        $data['tipoAguaBusqueda'] = $tipoAguaBusqueda;
        $data['sort'] = $sort;
        $data['order'] = $order;
        $data['newOrder'] = $newOrder;
        
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
    
    public function exportarCSV()
    {
        $pecesModel = new PecesModel();

        // Filtrar los peces activos (si no hay filtros activos, exporta todos los peces)
        $data['peces'] = $pecesModel->where('FECHA_BAJA', NULL)->findAll();

        // Definir el nombre del archivo CSV
        $filename = 'peces_' . date('Y-m-d_H-i-s') . '.csv';

        // Abrir el archivo en modo escritura
        $file = fopen('php://output', 'w');

        // Establecer el encabezado de las columnas
        $header = ['ESPECIE', 'FECHA_NACIMIENTO', 'PESO', 'LONGITUD', 'TIPO_AGUA', 'FECHA_BAJA'];
        fputcsv($file, $header);

        // Escribir los datos de cada pez
        foreach ($data['peces'] as $pez) {
            fputcsv($file, [
                $pez['ESPECIE'],
                $pez['FECHA_NACIMIENTO'],
                $pez['PESO'],
                $pez['LONGITUD'],
                $pez['TIPO_AGUA'],
                $pez['FECHA_BAJA']
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
