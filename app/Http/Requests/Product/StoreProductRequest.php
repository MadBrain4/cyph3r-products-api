<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name'               => 'required|string|max:255',
            'description'        => 'nullable|string',
            'price'              => 'required|numeric|min:0',
            'currency_id'        => 'required|exists:currencies,id',
            'tax_cost'           => 'required|numeric|min:0',
            'manufacturing_cost' => 'required|numeric|min:0|lt:price',
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'name.required'               => __('validation.product.name_required'),
            'name.string'                 => __('validation.product.name_string'),
            'name.max'                    => __('validation.product.name_max'),
            'description.string'          => __('validation.product.description_string'),
            'price.required'              => __('validation.product.price_required'),
            'price.numeric'               => __('validation.product.price_numeric'),
            'price.min'                   => __('validation.product.price_min'),
            'currency_id.required'        => __('validation.product.currency_required'),
            'currency_id.exists'          => __('validation.product.currency_exists'),
            'tax_cost.required'           => __('validation.product.tax_required'),
            'tax_cost.numeric'            => __('validation.product.tax_numeric'),
            'tax_cost.min'                => __('validation.product.tax_min'),
            'manufacturing_cost.required' => __('validation.product.manufacturing_required'),
            'manufacturing_cost.numeric'  => __('validation.product.manufacturing_numeric'),
            'manufacturing_cost.min'      => __('validation.product.manufacturing_min'),
            'manufacturing_cost.lt'       => __('validation.product.manufacturing_lt_price'),
        ];
    }

    /**
     * Handle failed validation.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => __('validation.validation_failed'),
            'errors'  => $validator->errors(),
        ], 422));
    }
}
