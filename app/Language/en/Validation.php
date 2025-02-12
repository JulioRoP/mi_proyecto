<?php

// override core en language system validation or define your own en language validation message
return [
    'required' => 'El campo {field} es obligatorio.',
    'min_length' => 'El campo {field} debe tener al menos {param} caracteres.',
    'max_length' => 'El campo {field} no puede exceder de {param} caracteres.',
    'matches' => 'El campo {field} no coincide con el campo {param}.',
    'is_unique' => 'El campo {field} debe ser único.',
    'valid_email' => 'El campo {field} debe contener una dirección de correo electrónico válida.',
    'numeric' => 'El campo {field} debe contener solo números.',
    'integer' => 'El campo {field} debe contener un número entero.',
    'regex_match' => 'El campo {field} no tiene el formato correcto.',
    'greater_than' => 'El campo {field} debe contener un número mayor que {param}.',
    'greater_than_equal_to' => 'El campo {field} debe contener un número mayor o igual que {param}.',
    'less_than' => 'El campo {field} debe contener un número menor que {param}.',
    'less_than_equal_to' => 'El campo {field} debe contener un número menor o igual que {param}.',
    'in_list' => 'El campo {field} debe ser uno de: {param}.',
    'alpha' => 'El campo {field} solo puede contener caracteres alfabéticos.',
    'alpha_numeric' => 'El campo {field} solo puede contener caracteres alfanuméricos.',
    'alpha_numeric_spaces' => 'El campo {field} solo puede contener caracteres alfanuméricos y espacios.',
    'alpha_dash' => 'El campo {field} solo puede contener caracteres alfanuméricos, guiones y guiones bajos.',
    'valid_url' => 'El campo {field} debe contener una URL válida.',
    'valid_ip' => 'El campo {field} debe contener una IP válida.',
    'uploaded' => 'El campo {field} contiene un archivo no válido.',
    'max_size' => 'El archivo del campo {field} es demasiado grande.',
    'is_image' => 'El archivo del campo {field} debe ser una imagen.',
    'mime_in' => 'El archivo del campo {field} debe ser del tipo: {param}.',

    // Otros mensajes de validación
    'valid_date' => 'El campo {field} debe contener una fecha válida.',
    'valid_time' => 'El campo {field} debe contener una hora válida.',
    'valid_datetime' => 'El campo {field} debe contener una fecha y hora válidas.',

];
