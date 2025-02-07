<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller {
    public function viewIndexCopia() {
        return view('index-copia'); // Cargar la vista 'index-copia'
    }
}
