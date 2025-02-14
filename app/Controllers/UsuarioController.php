<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class UsuarioController extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $data['usuarios'] = $usuarioModel->where('FECHA_BAJA', NULL)->findAll(); // Solo usuarios activos

        
        // ------------buscador-------------
        $nombreUsuarioBusqueda  = $this->request->getVar('NOMBRE_USUARIO');//obtener el temrino de busqueda desde el formulario
        $emailUsuarioBusqueda = $this->request->getVar('EMAIL');
        $fechaRegistroBusqueda = $this->request->getVar('FECHA_REGISTRO');
        $rolUsuarioBusqueda = $this->request->getVar('ROL');
        $estadoBusqueda = $this->request->getVar('estado');

        // Aplicar los filtros si es necesario
        if ($estadoBusqueda == 'activo') {
            $usuarioModel->where('FECHA_BAJA IS NULL');  // Solo activos
        } elseif ($estadoBusqueda == 'baja') {
            $usuarioModel->where('FECHA_BAJA IS NOT NULL');  // Solo dados de baja
        } elseif ($estadoBusqueda == 'todos') {
            // No aplicamos ningún filtro de FECHA_BAJA, mostramos todos
        }

        //aplicar filtro si se introduce nombre
        if($nombreUsuarioBusqueda ){
            $query = $usuarioModel->like('NOMBRE_USUARIO',$nombreUsuarioBusqueda );
        }        
        
        if ($emailUsuarioBusqueda) {
            $usuarioModel->like('EMAIL', $emailUsuarioBusqueda);
        }
        
        if ($fechaRegistroBusqueda) {
            $usuarioModel->like('FECHA_REGISTRO', $fechaRegistroBusqueda);
        }
        
        if ($rolUsuarioBusqueda) {
            $usuarioModel->like('ROL', $rolUsuarioBusqueda);
        }
        
        // Agrega más filtros según sea necesario
        
        $data['nombreUsuarioBusqueda'] = $nombreUsuarioBusqueda ;//mantener el termino de busqueda en la vista
        $data['emailUsuarioBusqueda'] = $emailUsuarioBusqueda;
        $data['fechaRegistroBusqueda'] = $fechaRegistroBusqueda;
        $data['rolUsuarioBusqueda'] = $rolUsuarioBusqueda;
        $data['estadoBusqueda'] = $estadoBusqueda;
        // Agrega más variables según sea necesario
        // ------------buscador-------------


        // --------pginacion-------------
        $perPage =4; //numero de elementos por pagina
        $page = $this->request->getVar('page') ?: 1;  // Obtener la página actual
        $data['usuarios'] = $usuarioModel->paginate($perPage);
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

        if ($this->request->getMethod() == 'POST') {

            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nombre' => 'required|min_length[3]|max_length[255]',
                'email' => 'required|valid_email|is_unique[USUARIOS.EMAIL]',
                'contraseña' => 'required|min_length[6]',
                'rol' => 'required|in_list[administrador,visitante]',
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
                    'ROL' => $this->request->getPost('rol'),
                    'FECHA_REGISTRO' => date('Y-m-d'),
                ];

                // if ($id) {
                //     // Actualizar usuario existente
                //     $usuarioModel->update($id, $usuarioData);
                //     $message = 'Usuario actualizado correctamente.';
                // } else {
                //     // Crear nuevo usuario
                //     $usuarioModel->save($usuarioData);
                //     $message = 'Usuario creado correctamente.';
                // }
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
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id); // Obtener el usuario actual
    
        if (is_null($usuario['FECHA_BAJA'])) {
            // Obtener la fecha actual
            $fechaBaja = date('Y-m-d');
    
            // Actualizar el campo FECHA_BAJA con la fecha actual
            $usuarioModel->update($id, ['FECHA_BAJA' => $fechaBaja]);
    
            // Redirigir al listado con un mensaje de éxito
            return redirect()->to('/usuarios')->with('success', 'Usuario dado de baja correctamente.');
        } else {
            // Si FECHA_BAJA no es null, dar de alta (poner FECHA_BAJA a null)
            $usuarioModel->update($id, ['FECHA_BAJA' => null]);
    
            // Redirigir al listado con un mensaje de éxito
            return redirect()->to('/usuarios')->with('success', 'Usuario dado de alta correctamente.');
        }
    }
    

}
