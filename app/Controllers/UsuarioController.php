<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class UsuarioController extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        
        

        
        // ------------buscador-------------
        $nombreUsuarioBusqueda = $this->request->getVar('NOMBRE_USUARIO');
        $emailUsuarioBusqueda = $this->request->getVar('EMAIL');
        $fechaRegistroBusqueda = $this->request->getVar('FECHA_REGISTRO');
        $rolUsuarioBusqueda = $this->request->getVar('ROL');
        $estadoBusqueda = $this->request->getVar('estado');

        // Aplicar los filtros si es necesario
        if ($estadoBusqueda == 'activo') {
            $usuarioModel->where('FECHA_BAJA IS NULL');
        } elseif ($estadoBusqueda == 'baja') {
            $usuarioModel->where('FECHA_BAJA IS NOT NULL');
        } elseif ($estadoBusqueda == 'todos') {
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
            $usuarioModel->like('ROLES.NOMBRE_ROL', $rolUsuarioBusqueda); // Cambia ID_ROL por NOMBRE_ROL
        }
        

        $data['nombreUsuarioBusqueda'] = $nombreUsuarioBusqueda;
        $data['emailUsuarioBusqueda'] = $emailUsuarioBusqueda;
        $data['fechaRegistroBusqueda'] = $fechaRegistroBusqueda;
        $data['rolUsuarioBusqueda'] = $rolUsuarioBusqueda;
        $data['estadoBusqueda'] = $estadoBusqueda;

        // --------paginacion-------------
        $perPage = 4;  // Definir cuántos usuarios por página
        $page = $this->request->getVar('page') ?: 1;
        $data['usuarios'] = $usuarioModel->get_usuarios_with_roles_paginated($perPage);
        $data['pager'] = $usuarioModel->pager;
        // --------paginacion------------
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

    // public function baja($id)
    // {
    //     $usuarioModel = new UsuarioModel();
        
    //     // Obtener la fecha actual
    //     $fechaBaja = date('Y-m-d');

    //     // Actualizar el campo FECHA_BAJA con la fecha actual
    //     $usuarioModel->update($id, ['FECHA_BAJA' => $fechaBaja]);

    //     // Redirigir al listado con un mensaje de éxito
    //     return redirect()->to('/usuarios')->with('success', 'Usuario dado de baja correctamente.');
    // }
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

            // Mensaje de éxito al dar de baja
            return redirect()->to('/usuarios')->with('success', 'Usuario dado de baja correctamente.');
        } else {
            // Si ya tiene fecha de baja, eliminarla (dar de alta)
            $usuarioModel->update($id, ['FECHA_BAJA' => null]);

            // Mensaje de éxito al dar de alta
            return redirect()->to('/usuarios')->with('success', 'Usuario dado de alta correctamente.');
        }
    }

    

}
