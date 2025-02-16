<?php

namespace App\Controllers;

use App\Models\RegistroModel;

class RegistroController extends BaseController
{
    public function register()
    {
        return view('registro');
    }

    public function processRegister()
    {
        helper(['form', 'url']);

        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[usuarios.EMAIL]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return view('register', [
                'validation' => $this->validator,
            ]);
        }

        $registroModel = new RegistroModel();
        $registroModel->save([
            'NOMBRE_USUARIO' => $this->request->getPost('name'),
            'EMAIL' => $this->request->getPost('email'),
            'CONTRASEÑA_HASH' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'FECHA_REGISTRO' => date('Y-m-d'),
            'ID_ROL' => 1 // Asignar un rol por defecto, por ejemplo, 1.
        ]);

        return redirect()->to('/login')->with('success', 'Usuario registrado correctamente.');
    }
}