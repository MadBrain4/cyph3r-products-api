<?php

return [

    'auth' => [

        'name' => [
            'required' => 'El nombre es obligatorio.',
            'max'      => 'El nombre no debe superar los :max caracteres.',
        ],

        'email' => [
            'required' => 'El correo electrónico es obligatorio.',
            'email'    => 'El correo electrónico no es válido.',
            'unique'   => 'Este correo ya está registrado.',
            'exists'   => 'No existe un usuario con este correo.',
        ],

        'password' => [
            'required'  => 'La contraseña es obligatoria.',
            'min'       => 'La contraseña debe tener al menos :min caracteres.',
            'confirmed' => 'Las contraseñas no coinciden.',
        ],

        'password_confirmation' => [
            'required' => 'Debes confirmar la contraseña.',
        ],

    ],

    'product' => [
        'name_required'               => 'El campo nombre es obligatorio.',
        'name_string'                 => 'El nombre debe ser una cadena de texto.',
        'name_max'                    => 'El nombre no debe exceder los 255 caracteres.',
        'description_string'          => 'La descripción debe ser una cadena de texto.',
        'price_required'              => 'El precio es obligatorio.',
        'price_numeric'               => 'El precio debe ser un número.',
        'price_min'                   => 'El precio debe ser al menos 0.',
        'currency_required'           => 'La divisa es obligatoria.',
        'currency_exists'             => 'La divisa seleccionada no es válida.',
        'tax_required'                => 'El costo de impuestos es obligatorio.',
        'tax_numeric'                 => 'El costo de impuestos debe ser numérico.',
        'tax_min'                     => 'El costo de impuestos debe ser al menos 0.',
        'manufacturing_required'      => 'El costo de fabricación es obligatorio.',
        'manufacturing_numeric'       => 'El costo de fabricación debe ser un número.',
        'manufacturing_min'           => 'El costo de fabricación debe ser al menos 0.',
        'manufacturing_lt_price'      => 'El costo de fabricación debe ser menor al precio del producto.',
    ],


    'attributes' => [
        'name'                  => 'nombre',
        'email'                 => 'correo electrónico',
        'password'              => 'contraseña',
        'password_confirmation' => 'confirmación de contraseña',
    ],

];
