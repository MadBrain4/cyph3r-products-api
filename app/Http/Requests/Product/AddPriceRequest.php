<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\Product;

class AddPriceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'currency_id' => [
                'required',
                'exists:currencies,id',
                function ($attribute, $value, $fail) {
                    $productId = $this->route('id');
                    $exists = Product::find($productId)
                        ->prices()
                        ->where('currency_id', $value)
                        ->exists();

                    if ($exists) {
                        $fail(__('validation.product.duplicate_currency_price'));
                    }
                },
            ],
            'price' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'currency_id.required' => __('validation.product.currency_required'),
            'currency_id.exists' => __('validation.product.currency_exists'),
            'price.required' => __('validation.product.price_required'),
            'price.numeric' => __('validation.product.price_numeric'),
            'price.min' => __('validation.product.price_min'),
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => __('validation.validation_failed'),
            'errors' => $validator->errors(),
        ], 422));
    }
}
