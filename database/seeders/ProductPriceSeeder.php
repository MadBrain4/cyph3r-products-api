<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Currency;
use App\Models\ProductPrice;

class ProductPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $currencies = Currency::all();

        foreach ($products as $product) {
            foreach ($currencies->where('id', '!=', $product->currency_id) as $currency) {
                // Decidir aleatoriamente si agregar o no el precio para esta moneda
                if (rand(0, 100) < 80) { // 80% de probabilidad de crear precio (ajusta al gusto)
                    ProductPrice::factory()->create([
                        'product_id' => $product->id,
                        'currency_id' => $currency->id,
                    ]);
                }
                // El 20% restante no crea precio para dejar vacíos y permitir pruebas
            }
        }
    }
}
