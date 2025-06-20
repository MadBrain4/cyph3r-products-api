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
                ProductPrice::factory()->create([
                    'product_id' => $product->id,
                    'currency_id' => $currency->id,
                ]);
            }
        }
    }
}
