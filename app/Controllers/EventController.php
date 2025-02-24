<?php

namespace App\Controllers;

use App\Models\EventModel;

class EventController extends BaseController
{
    public function showCalendar()
    {
    return view('calendar');
    }

    public function test()
{
    return 'Test method';
}
    // Método para obtener todos los eventos
    public function fetchEvents()
    {
        $model = new EventModel();
        $events = $model->findAll();
        return $this->response->setJSON($events);
    }

    // Método para agregar un nuevo evento
    public function addEvent()
    {
        $model = new EventModel();

        $data = [
            'TITULO' => $this->request->getPost('TITULO'),
            'FECHA_INICIO' => $this->request->getPost('FECHA_INICIO'),
            'FECHA_FIN' => $this->request->getPost('FECHA_FIN'),
            'DESCRIPCION_ES' => $this->request->getPost('DESCRIPCION_ES'),
            'DESCRIPCION_ENG' => $this->request->getPost('DESCRIPCION_ENG'),
            'FECHA_ELIMINACION' => null,
        ];

        if ($model->insert($data)) {
            return $this->response->setJSON(['success' => 'Evento agregado exitosamente']);
        } else {
            return $this->response->setJSON(['error' => 'Error al agregar el evento'], 500);
        }
    }

    // Método para eliminar un evento
    public function deleteEvent($id)
    {
        $model = new EventModel();

        if ($model->delete($id)) {
            return $this->response->setJSON(['success' => 'Evento eliminado exitosamente']);
        } else {
            return $this->response->setJSON(['error' => 'Error al eliminar el evento'], 500);
        }
    }
}
