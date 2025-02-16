<?php

namespace App\Controllers;

/**Class Home
 * 
 * [Controlador principal ,este maneja la vista inicial de la aplicación.
 * 
 * @ App\Controllers
 */
class Home extends BaseController
{
    /**Método index
     * 
     * [El metodo index devolvera la vista principal de la aplicación.]
     *
     * @return string Devuelve vista de la página principal para poder ser monstrada.
     * 
     */
    public function index(): string
    {
        return view('index');
    }
}
