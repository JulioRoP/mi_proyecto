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
        // Obtener los datos enviados desde el cliente (en formato JSON)
        $data = json_decode($this->request->getBody(), true);

        // Extraer los campos de los datos enviados
        $titulo = $data['TITULO'];
        $fechaInicio = $data['FECHA_INICIO'];
        $fechaFin = $data['FECHA_FIN'];
        $descripcionEs = $data['DESCRIPCION_ES'];
        $descripcionEng = $data['DESCRIPCION_ENG'];

        // Validar que los campos requeridos no estén vacíos
        if (!$titulo || !$fechaInicio || !$fechaFin || !$descripcionEs || !$descripcionEng) {
            return $this->response->setJSON(['error' => 'Todos los campos son obligatorios'], 400);
        }

        // Preparar los datos para insertar en la base de datos
        $eventData = [
            'TITULO' => $titulo,
            'FECHA_INICIO' => $fechaInicio,
            'FECHA_FIN' => $fechaFin,
            'DESCRIPCION_ES' => $descripcionEs,
            'DESCRIPCION_ENG' => $descripcionEng,
            'FECHA_ELIMINACION' => null
        ];

        $model = new EventModel();

        // Insertar el evento en la base de datos
        if ($model->insert($eventData)) {
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
