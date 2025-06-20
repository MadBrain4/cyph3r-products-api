<?php

return [
    'validation_failed' => 'Validation failed. Please check the input data.',

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

    'price' => [
        'added' => 'Price added successfully.',
    ],

    'product' => [
        'name_required'               => 'The name field is required.',
        'name_string'                 => 'The name must be a string.',
        'name_max'                    => 'The name may not be greater than 255 characters.',
        'description_string'          => 'The description must be a string.',
        'price_required'              => 'The price field is required.',
        'price_numeric'               => 'The price must be a number.',
        'price_min'                   => 'The price must be at least 0.',
        'currency_required'           => 'The currency is required.',
        'currency_exists'             => 'The selected currency is invalid.',
        'tax_required'                => 'The tax cost is required.',
        'tax_numeric'                 => 'The tax cost must be a number.',
        'tax_min'                     => 'The tax cost must be at least 0.',
        'manufacturing_required'      => 'The manufacturing cost is required.',
        'manufacturing_numeric'       => 'The manufacturing cost must be a number.',
        'manufacturing_min'           => 'The manufacturing cost must be at least 0.',
        'manufacturing_lt_price'      => 'The manufacturing cost must be less than the product price.',
        'duplicate_currency_price' => 'There is already a price for this currency on this product.',

    ],


    'attributes' => [
        'name'                  => 'name',
        'email'                 => 'email',
        'password'              => 'password',
        'password_confirmation' => 'password confirmation',
        'price'                 => 'price',
        'currency'              => 'currency',
        'currency_id'           => 'coin',
    ],

];
