<?php

namespace App\Controllers;

use App\Models\EventModel;

class EventController extends BaseController
{
    // Método para mostrar el calendario
    public function showCalendar()
    {
        return view('calendar');
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
        // Obtén los datos del POST
        $data = [
            'TITULO' => $this->request->getPost('TITULO'),
            'FECHA_INICIO' => $this->request->getPost('FECHA_INICIO'),
            'FECHA_FIN' => $this->request->getPost('FECHA_FIN'),
            'DESCRIPCION_ES' => $this->request->getPost('DESCRIPCION_ES'),
            'DESCRIPCION_ENG' => $this->request->getPost('DESCRIPCION_ENG'),
            'FECHA_ELIMINACION' => null,
        ];

        $model = new EventModel();

        // Insertar el evento en la base de datos
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

        // Verificar si el evento existe
        $event = $model->find($id);
        if (!$event) {
            return $this->response->setJSON(['error' => 'Evento no encontrado'], 404);
        }

        // Eliminar el evento
        if ($model->delete($id)) {
            return $this->response->setJSON(['success' => 'Evento eliminado exitosamente']);
        } else {
            return $this->response->setJSON(['error' => 'Error al eliminar el evento'], 500);
        }
    }
}
