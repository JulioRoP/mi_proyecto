<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;

class LoginController extends Controller
{
    protected $loginModel;

    public function __construct()
    {
        // Cargamos el modelo
        $this->loginModel = new LoginModel();

        // Verificar si el usuario ya está autenticado, si es así, redirigirlo a la página principal
        if (session()->has('user_id')) {
            return redirect()->to('http://localhost/mi_proyecto/public/index.php');
        }
    }

    // Muestra el formulario de login
    public function index()
    {
        return view('login'); // Cargar la vista login.php
    }

    // Maneja el proceso de autenticación
    public function authenticate()
    {
        // Depuración para verificar si el método se está llamando
        log_message('debug', 'Método authenticate() llamado');

        // Recibir datos del formulario
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Verificar las credenciales con el modelo
        $user = $this->loginModel->check_login($email, $password);

        // Si el usuario existe
        if ($user) {
            // Depuración para ver los datos del usuario
            log_message('debug', 'Usuario encontrado: ' . print_r($user, true));

            // Guardar datos en sesión
            session()->set([
                'user_id' => $user['ID_USUARIO'],
                'user_email' => $user['EMAIL'],
                'user_role' => $user['ID_ROL'],
            ]);

            // Redirigir a la página principal (index)
            return redirect()->to(base_url('/')); // Redirige a la página principal después de iniciar sesión
        } else {
            // Depuración en caso de error
            log_message('debug', 'Error de login, credenciales incorrectas');

            // Si no es correcto, mostrar mensaje de error
            session()->setFlashdata('error', 'Email o contraseña incorrectos.');
            return redirect()->to('/login'); // Volver al login
        }
    }

    // Cerrar sesión
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login'); // Redirigir a la página de login después de cerrar sesión
    }
}
