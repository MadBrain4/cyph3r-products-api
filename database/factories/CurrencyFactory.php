<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Currency>
 */
class CurrencyFactory extends Factory
{
    protected $model = Currency::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->currencyCode,
            'symbol' => $this->faker->randomElement(['$', '€', '£', '¥']),
            'exchange_rate' => $this->faker->randomFloat(2, 0.5, 2.5),
        ];
    }
}
