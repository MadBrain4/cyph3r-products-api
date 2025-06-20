<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductPricesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'product' => [
                'name' => $this->name,
                'description' => $this->description,
                'prices' => $this->prices->map(function ($price) {
                    return [
                        'currency' => $price->currency->name,
                        'symbol' => $price->currency->symbol,
                        'price' => $price->price,
                    ];
                }),
            ]
        ];
    }
}
