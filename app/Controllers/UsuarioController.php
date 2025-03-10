<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class UsuarioController extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();

        // Obtener filtros
        $nombreUsuarioBusqueda = $this->request->getVar('NOMBRE_USUARIO');
        $emailUsuarioBusqueda = $this->request->getVar('EMAIL');
        $fechaRegistroBusqueda = $this->request->getVar('FECHA_REGISTRO');
        $rolUsuarioBusqueda = $this->request->getVar('ROL');
        $estadoBusqueda = $this->request->getVar('estado');

        // Obtener ordenación
        $sort = $this->request->getVar('sort') ?? 'NOMBRE_USUARIO';
        $order = $this->request->getVar('order') ?? 'asc';
        $newOrder = ($order === 'asc') ? 'desc' : 'asc';

        // Aplicar filtros
        if ($estadoBusqueda == 'activo') {
            $usuarioModel->where('FECHA_BAJA IS NULL');
        } elseif ($estadoBusqueda == 'baja') {
            $usuarioModel->where('FECHA_BAJA IS NOT NULL');
        }

        if ($nombreUsuarioBusqueda) {
            $usuarioModel->like('NOMBRE_USUARIO', $nombreUsuarioBusqueda);
        }

        if ($emailUsuarioBusqueda) {
            $usuarioModel->like('EMAIL', $emailUsuarioBusqueda);
        }

        if ($fechaRegistroBusqueda) {
            $usuarioModel->like('FECHA_REGISTRO', $fechaRegistroBusqueda);
        }

        if ($rolUsuarioBusqueda) {
            $usuarioModel->like('ROLES.NOMBRE_ROL', $rolUsuarioBusqueda);
        }

        // Aplicar ordenación
        $usuarioModel->orderBy($sort, $order);

        // Paginación
        $perPage = 4;
        $page = $this->request->getVar('page') ?: 1;
        $data['usuarios'] = $usuarioModel->get_usuarios_with_roles_paginated($perPage);
        $data['pager'] = $usuarioModel->pager;

        // Pasar datos a la vista
        $data['nombreUsuarioBusqueda'] = $nombreUsuarioBusqueda;
        $data['emailUsuarioBusqueda'] = $emailUsuarioBusqueda;
        $data['fechaRegistroBusqueda'] = $fechaRegistroBusqueda;
        $data['rolUsuarioBusqueda'] = $rolUsuarioBusqueda;
        $data['estadoBusqueda'] = $estadoBusqueda;
        $data['sort'] = $sort;
        $data['order'] = $order;
        $data['newOrder'] = $newOrder;

        return view('usuario_list', $data);
    }



    public function saveUsuario($id = null)
    {
        $usuarioModel = new UsuarioModel();
        helper(['form', 'url']);
        // Cargar datos del usuario si es edición
        $data['usuario'] = $id ? $usuarioModel->find($id) : null;
        $data['rolUsuarioBusqueda'] = $data['usuario'] ? $data['usuario']['ID_ROL'] : '';//para que ponga el rol



        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM ROLES");
        $roles = $query->getResultArray();
        $data['roles'] = $roles;


        if ($this->request->getMethod() == 'POST') {

            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nombre' => 'required|min_length[3]|max_length[255]',
                'email' => 'required|valid_email|is_unique[USUARIOS.EMAIL]',
                'contraseña' => 'required|min_length[8]',
                'rol' => 'required|in_list[1,2]',  // Asegúrate de que 'rol' es uno de los valores válidos
            ]);

            if (!$id) {
                $validation->setRule('email', 'email', 'required|valid_email|is_unique[USUARIOS.EMAIL]');
            } else {
                $validation->setRule('email', 'email', 'required|valid_email');
            }
            

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $usuarioData = [
                    'NOMBRE_USUARIO' => $this->request->getPost('nombre'),
                    'EMAIL' => $this->request->getPost('email'),
                    // 'CONTRASEÑA_HASH' => $this->request->getPost('contraseña'),
                    'CONTRASEÑA_HASH' => password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT),  // Cifrar la contraseña

                    // 'CONTRASEÑA_HASH' => password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT),
                    'ID_ROL' => $this->request->getPost('rol'),  // Accede al 'rol' que viene del formulario
                    'FECHA_REGISTRO' => date('Y-m-d'),
                ];

             
                if ($id) {
                    // Si se está editando y la contraseña fue modificada
                    if ($this->request->getPost('contraseña')) {
                        $usuarioData['CONTRASEÑA_HASH'] = password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT);
                    } else {
                        // Si no se cambia la contraseña, no la modificamos
                        unset($usuarioData['CONTRASEÑA_HASH']);
                    }
                
                    $usuarioModel->update($id, $usuarioData);
                    $message = 'Usuario actualizado correctamente.';
                } else {
                    // Crear nuevo usuario (ya se cifró la contraseña antes)
                    $usuarioModel->save($usuarioData);
                    $message = 'Usuario creado correctamente.';
                }
                

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/usuarios')->with('success', $message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('usuario_form', $data);
    }

    public function baja($id)
{
    // Cargar el modelo de usuario
    $usuarioModel = new UsuarioModel();

    // Obtener el usuario por el ID
    $usuario = $usuarioModel->find($id);

    if (is_null($usuario['FECHA_BAJA'])) {
        // Si no tiene fecha de baja, poner la fecha actual de baja
        $fechaBaja = date('Y-m-d');
        $usuarioModel->update($id, ['FECHA_BAJA' => $fechaBaja]);

        // Responder con el éxito y la fecha de baja
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Usuario dado de baja correctamente.',
            'fecha_baja' => $fechaBaja
        ]);
    } else {
        // Si ya tiene fecha de baja, eliminarla (dar de alta)
        $usuarioModel->update($id, ['FECHA_BAJA' => null]);

        // Responder con el éxito
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Usuario dado de alta correctamente.',
            'fecha_baja' => null
        ]);
    }
}



    public function exportarCSV()
{
    $usuarioModel = new UsuarioModel();

    // Obtener filtros desde la request
    $nombreUsuarioBusqueda = $this->request->getVar('NOMBRE_USUARIO');
    $emailUsuarioBusqueda = $this->request->getVar('EMAIL');
    $fechaRegistroBusqueda = $this->request->getVar('FECHA_REGISTRO');
    $rolUsuarioBusqueda = $this->request->getVar('ROL');
    $estadoBusqueda = $this->request->getVar('estado');

    // Obtener ordenación
    $sort = $this->request->getVar('sort') ?? 'NOMBRE_USUARIO';
    $order = $this->request->getVar('order') ?? 'asc';

    // Aplicar filtros
    if ($estadoBusqueda == 'activo') {
        $usuarioModel->where('FECHA_BAJA IS NULL');
    } elseif ($estadoBusqueda == 'baja') {
        $usuarioModel->where('FECHA_BAJA IS NOT NULL');
    }

    if ($nombreUsuarioBusqueda) {
        $usuarioModel->like('NOMBRE_USUARIO', $nombreUsuarioBusqueda);
    }

    if ($emailUsuarioBusqueda) {
        $usuarioModel->like('EMAIL', $emailUsuarioBusqueda);
    }

    if ($fechaRegistroBusqueda) {
        $usuarioModel->like('FECHA_REGISTRO', $fechaRegistroBusqueda);
    }

    if ($rolUsuarioBusqueda) {
        $usuarioModel->like('ROLES.NOMBRE_ROL', $rolUsuarioBusqueda);
    }

    // Aplicar ordenación
    $usuarioModel->orderBy($sort, $order);

    // Realizar la unión con la tabla ROLES para obtener el NOMBRE_ROL
    $usuarios = $usuarioModel->select('USUARIOS.*, ROLES.NOMBRE_ROL')
                             ->join('ROLES', 'USUARIOS.ID_ROL = ROLES.ID_ROL', 'left')
                             ->findAll();

    // Definir el nombre del archivo CSV
    $filename = 'usuarios_' . date('Y-m-d_H-i-s') . '.csv';

    // Abrir el archivo en modo escritura
    $file = fopen('php://output', 'w');

    // Establecer el encabezado de las columnas para el CSV
    $header = ['NOMBRE_USUARIO', 'EMAIL', 'ROL', 'FECHA_REGISTRO', 'FECHA_BAJA'];
    fputcsv($file, $header);

    // Escribir los datos de cada usuario, sin incluir el ID
    foreach ($usuarios as $usuario) {
        fputcsv($file, [
            $usuario['NOMBRE_USUARIO'],
            $usuario['EMAIL'],
            $usuario['NOMBRE_ROL'],  // Aquí ahora se toma el nombre del rol de la tabla ROLES
            $usuario['FECHA_REGISTRO'],
            $usuario['FECHA_BAJA']
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


// Método en el controlador UsuarioController
public function getUsuariosJson()
{
    // Obtener los filtros enviados desde el frontend
    $nombreUsuario = $this->request->getVar('NOMBRE_USUARIO');
    $email = $this->request->getVar('EMAIL');
    $rol = $this->request->getVar('NOMBRE_ROL');
    $estado = $this->request->getVar('estado');

    // Cargar el modelo de usuarios
    $usuarioModel = new UsuarioModel();

    // Realizar la consulta base
    $usuarioModel->select('USUARIOS.*, ROLES.NOMBRE_ROL')  // Selecciona la columna NOMBRE_ROL de la tabla ROLES
                 ->join('ROLES', 'USUARIOS.ID_ROL = ROLES.ID_ROL', 'left');  // Realiza el JOIN con la tabla ROLES

    // Aplicar los filtros de búsqueda si existen
    if ($nombreUsuario) {
        $usuarioModel->like('USUARIOS.NOMBRE_USUARIO', $nombreUsuario);
    }
    if ($email) {
        $usuarioModel->like('USUARIOS.EMAIL', $email);
    }
    if ($rol) {
        $usuarioModel->where('ROLES.NOMBRE_ROL', $rol);  // Filtro por nombre de rol
    }
    if ($estado) {
        if ($estado == 'activo') {
            $usuarioModel->where('USUARIOS.FECHA_BAJA', NULL);  // Activos
        } elseif ($estado == 'baja') {
            $usuarioModel->where('USUARIOS.FECHA_BAJA IS NOT NULL');  // Inactivos
        }
    }

    // Manejo de la ordenación si se aplica
    $order = $this->request->getVar('order');  // DataTables envia un array de ordenación
    if ($order && isset($order[0])) {
        $orderColumn = $order[0]['column'];  // Obtén el índice de la columna
        $orderDir = $order[0]['dir'];  // Obtén la dirección de la ordenación (asc/desc)

        $columns = ['NOMBRE_USUARIO', 'EMAIL', 'NOMBRE_ROL', 'FECHA_REGISTRO', 'FECHA_BAJA'];
        if (isset($columns[$orderColumn])) {
            $usuarioModel->orderBy($columns[$orderColumn], $orderDir);
        }
    }


    // Paginación
    $start = $this->request->getVar('start');
    $length = $this->request->getVar('length');
    $usuarios = $usuarioModel->findAll($length, $start);

    // Contar el total de usuarios (sin filtros para paginación)
    $totalUsuarios = $usuarioModel->countAllResults(false);

    // Preparar los datos para la respuesta JSON
    $data = [];
    foreach ($usuarios as $usuario) {
        $data[] = [
            'NOMBRE_USUARIO' => $usuario['NOMBRE_USUARIO'],
            'EMAIL' => $usuario['EMAIL'],
            'NOMBRE_ROL' => $usuario['NOMBRE_ROL'],
            'FECHA_REGISTRO' => $usuario['FECHA_REGISTRO'],
            'FECHA_BAJA' => $usuario['FECHA_BAJA'],
            'ID_USUARIO' => $usuario['ID_USUARIO']
        ];
    }

    // Devolver los resultados en formato JSON
    return $this->response->setJSON([
        'draw' => $this->request->getVar('draw'),
        'recordsTotal' => $totalUsuarios,
        'recordsFiltered' => count($data),
        'data' => $data
    ]);
}



public function getUsuarios()
    {
        // Obtener los filtros del formulario
        $nombreUsuario = $this->request->getVar('NOMBRE_USUARIO');
        $email = $this->request->getVar('EMAIL');
        $rol = $this->request->getVar('NOMBRE_ROL');
        $estado = $this->request->getVar('estado');
        $usuarioSeleccionado = $this->request->getVar('NOMBRE_USUARIO_SELECCIONADO');
        
        // Cargar el modelo de usuarios
        $usuarioModel = new UsuarioModel();

        // Filtramos los usuarios según los criterios recibidos
        $usuarios = $usuarioModel->select('ID_USUARIO, NOMBRE_USUARIO, EMAIL, NOMBRE_ROL')
                                ->join('ROLES', 'USUARIOS.ID_ROL = ROLES.ID_ROL', 'left')
                                ->like('NOMBRE_USUARIO', $nombreUsuario)
                                ->like('EMAIL', $email)
                                ->like('ROLES.NOMBRE_ROL', $rol)
                                ->where('USUARIOS.ESTADO', $estado)
                                ->where('USUARIOS.ID_USUARIO', $usuarioSeleccionado ? $usuarioSeleccionado : 'IS NOT NULL')
                                ->findAll();

        // Devolver los usuarios filtrados en formato JSON
        return $this->response->setJSON($usuarios);
    }

    public function getUsuariosPorRol()
    {
        $rol = $this->request->getVar('rol');

        $usuarioModel = new UsuarioModel();
        $usuarios = $usuarioModel->select('NOMBRE_USUARIO')
                                ->join('ROLES', 'USUARIOS.ID_ROL = ROLES.ID_ROL', 'left')
                                ->where('ROLES.NOMBRE_ROL', $rol)
                                ->findAll();

        return $this->response->setJSON($usuarios);
    }








}
