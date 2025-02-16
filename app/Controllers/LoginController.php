<?php

namespace App\Controllers;

use App\Models\LoginModel;

class LoginController extends BaseController
{
    public function login()
    {
        return view('login'); // Carga y retorna la vista del formulario de inicio de sesión.
    }

    public function processLogin()
    {
        helper(['form', 'url']); // Carga los helpers necesarios.
        $session = session(); // Inicia una sesión.

        $rules = [
            'email' => 'required|valid_email', // El email es obligatorio y debe ser válido.
            'password' => 'required', // La contraseña es obligatoria.
        ];

        if (!$this->validate($rules)) {
            return view('login', [
                'validation' => $this->validator, // Pasa los errores de validación a la vista.
            ]);
        }

        $loginModel = new LoginModel();
        $user = $loginModel->findByEmail($this->request->getPost('email'));

        if ($user && password_verify($this->request->getPost('password'), $user['CONTRASEÑA_HASH'])) {
            // Credenciales correctas, se guarda la sesión.
            $session->set([
                'id' => $user['ID_USUARIO'],
                'name' => $user['NOMBRE_USUARIO'],
                'email' => $user['EMAIL'],
                'isLoggedIn' => true,
                'created_at' => $user['FECHA_REGISTRO'],
            ]);

            return redirect()->to('/dashboard')->with('success', 'Inicio de sesión exitoso.');
        }

        // Si las credenciales son incorrectas, se muestra un error.
        return redirect()->to('/login')->with('error', 'Correo o contraseña incorrectos.');
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); // Destruye la sesión.
        return redirect()->to('/login')->with('success', 'Has cerrado sesión correctamente.');
    }
}
