<?php

return [

    'auth' => [

        'name' => [
            'required' => 'The name is required.',
            'max'      => 'The name may not be greater than :max characters.',
        ],

        'email' => [
            'required' => 'The email is required.',
            'email'    => 'The email must be a valid email address.',
            'unique'   => 'This email is already registered.',
            'exists'   => 'No user found with this email.',
        ],

        'password' => [
            'required'  => 'The password is required.',
            'min'       => 'The password must be at least :min characters.',
            'confirmed' => 'Passwords do not match.',
        ],

        'password_confirmation' => [
            'required' => 'You must confirm the password.',
        ],

    ],

    'product' => [
        'name' => [
            'required' => 'The product name is required.',
        ],
        'price' => [
            'required' => 'The price is required.',
        ],
        'currency_id' => [
            'required' => 'The currency is required.',
            'exists' => 'The selected currency does not exist.',
        ],
        'tax_cost' => [
            'required' => 'The tax cost is required.',
        ],
        'manufacturing_cost' => [
            'required' => 'The manufacturing cost is required.',
        ],
    ],

    'attributes' => [
        'name'                  => 'name',
        'email'                 => 'email',
        'password'              => 'password',
        'password_confirmation' => 'password confirmation',
    ],

];
