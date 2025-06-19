<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'                  => __('validation.auth.name.required'),
            'name.max'                       => __('validation.auth.name.max'),
            'email.required'                 => __('validation.auth.email.required'),
            'email.email'                    => __('validation.auth.email.email'),
            'email.unique'                   => __('validation.auth.email.unique'),
            'password.required'              => __('validation.auth.password.required'),
            'password.min'                   => __('validation.auth.password.min'),
            'password.confirmed'             => __('validation.auth.password.confirmed'),
            'password_confirmation.required' => __('validation.auth.password_confirmation.required'),
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }
}
