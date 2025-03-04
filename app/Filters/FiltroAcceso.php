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

        // Si el usuario NO está autenticado (no tiene sesión activa)
        if (!$role) {  
            return redirect()->to('/acceso-denegado');
        }

        // Si el usuario tiene rol 2, se bloquea el acceso
        if ($role == 2) {
            return redirect()->to('/acceso-denegado');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se necesita lógica después de la solicitud
    }
}
