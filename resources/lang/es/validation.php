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
        'name' => [
            'required' => 'El nombre del producto es obligatorio.',
        ],
        'price' => [
            'required' => 'El precio es obligatorio.',
        ],
        'currency_id' => [
            'required' => 'La divisa es obligatoria.',
            'exists' => 'La divisa seleccionada no existe.',
        ],
        'tax_cost' => [
            'required' => 'El costo de impuestos es obligatorio.',
        ],
        'manufacturing_cost' => [
            'required' => 'El costo de fabricación es obligatorio.',
        ],
    ],

    'attributes' => [
        'name'                  => 'nombre',
        'email'                 => 'correo electrónico',
        'password'              => 'contraseña',
        'password_confirmation' => 'confirmación de contraseña',
    ],

];
