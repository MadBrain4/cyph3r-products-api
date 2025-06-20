<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductPriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'amount' => $this->price,
            'currency' => [
                'id' => $this->currency->id,
                'name' => $this->currency->name,
                'symbol' => $this->currency->symbol,
            ],
        ];
    }
}
