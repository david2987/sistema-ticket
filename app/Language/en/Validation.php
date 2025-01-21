<?php

// override core en language system validation or define your own en language validation message
return [
    // Mensajes de error predeterminados de validación
    'required'        => 'El campo {field} es obligatorio.',
    'min_length'      => 'El campo {field} debe tener al menos {param} caracteres.',
    'max_length'      => 'El campo {field} no puede exceder los {param} caracteres.',
    'exact_length'    => 'El campo {field} debe tener exactamente {param} caracteres.',
    'matches'         => 'El campo {field} no coincide con el campo {param}.',
    'numeric'         => 'El campo {field} solo debe contener números.',
    'integer'         => 'El campo {field} debe ser un número entero.',
    'alpha'           => 'El campo {field} solo debe contener letras.',
    'alpha_numeric'   => 'El campo {field} solo debe contener letras y números.',
    'alpha_dash'      => 'El campo {field} solo puede contener letras, números, guiones y guiones bajos.',
    'valid_email'     => 'El campo {field} debe contener una dirección de correo electrónico válida.',
    'is_unique'       => 'El campo {field} debe ser único.',
    'less_than'       => 'El campo {field} debe contener un número menor que {param}.',
    'greater_than'    => 'El campo {field} debe contener un número mayor que {param}.',
    'valid_url'       => 'El campo {field} debe contener una URL válida.',
    'valid_date'      => 'El campo {field} debe contener una fecha válida.',
    'regex_match'     => 'El campo {field} no tiene el formato correcto.',
    'in_list'         => 'El campo {field} debe ser uno de: {param}.',
    'decimal'         => 'El campo {field} debe contener un número decimal.',
    'differs'         => 'El campo {field} debe ser diferente de {param}.',
    'is_natural'      => 'El campo {field} solo debe contener números positivos.',
    'is_natural_no_zero' => 'El campo {field} debe contener un número mayor que cero.',
];
