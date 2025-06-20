<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::factory()->create(['name' => 'USD', 'symbol' => '$', 'exchange_rate' => 1]);
        Currency::factory()->create(['name' => 'EUR', 'symbol' => '€', 'exchange_rate' => 0.93]);
        Currency::factory()->create(['name' => 'CLP', 'symbol' => 'CLP$', 'exchange_rate' => 900]);
    }
}
