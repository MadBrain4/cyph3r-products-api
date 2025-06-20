<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Currency;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $price = $this->faker->randomFloat(2, 10, 1000);

        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $price,
            'currency_id' => Currency::factory(),
            'tax_cost' => $this->faker->randomFloat(2, 1, 200),
            'manufacturing_cost' => $this->faker->randomFloat(2, 1, $price - 1),
        ];
    }
}
