<?php
namespace App\Controllers;

use App\Models\RegistroModel;
use CodeIgniter\Controller;

class RegistroController extends Controller {

    public function __construct() {
        helper(['url', 'form']);
    }

    public function index() {
        return view('registro'); // Muestra la vista de registro
    }

    public function saveRegister() {
        // Validar los datos del formulario
        $validation = \Config\Services::validation();
        $validation->setRules([
            'first-name' => 'required',
            'email' => 'required|valid_email|is_unique[USUARIOS.EMAIL]',
            'password' => 'required|min_length[8]',
            'confirm-password' => 'required|matches[password]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Si la validación falla, mostrar errores y redirigir a la página de registro
            return redirect()->to('/registro')->withInput()->with('errors', $validation->getErrors());
        }

        // Guardar los datos en la base de datos
        $model = new RegistroModel();
        $data = [
            'NOMBRE_USUARIO' => $this->request->getPost('first-name'),
            'EMAIL' => $this->request->getPost('email'),
            'CONTRASEÑA_HASH' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'FECHA_REGISTRO' => date('Y-m-d')
        ];
        $model->insert($data);

        return redirect()->to('/login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }
}
