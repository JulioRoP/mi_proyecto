namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Email\Email;

class Contacto extends Controller
{
    public function enviar()
    {
        $email = service('email');

        $nombre  = $this->request->getPost('nombre');
        $correo  = $this->request->getPost('email');
        $mensaje = $this->request->getPost('mensaje');

        // Configurar el correo
        $email->setFrom($correo, $nombre);
        $email->setTo('tu_correo@gmail.com'); // Donde quieres recibir los mensajes
        $email->setSubject('Nuevo mensaje de contacto');
        $email->setMessage("<p><b>Nombre:</b> $nombre</p>
                            <p><b>Correo:</b> $correo</p>
                            <p><b>Mensaje:</b><br>$mensaje</p>");

        // Intentar enviar el correo
        if ($email->send()) {
            return "✅ ¡Correo enviado correctamente!";
        } else {
            return "❌ Error al enviar el correo.";
        }
    }
}
