<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = Currency::all();

        Product::factory(10)->make()->each(function ($product) use ($currencies) {
            $product->currency_id = $currencies->random()->id;
            $product->save();
        });
    }
}
