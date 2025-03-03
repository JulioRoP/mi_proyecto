<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FiltroAcceso implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $role = $session->get('id_rol');  // Obtener el rol del usuario desde la sesión

        // Verificar si el usuario tiene rol 2
        if ($role == 2) {
            // Si el rol es 2 (usuario), no puede acceder a rutas como 'usuarios/save'
            return redirect()->to('/acceso-denegado');  // Redirige a una página de acceso denegado
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No necesitamos hacer nada después de la solicitud
    }
}
