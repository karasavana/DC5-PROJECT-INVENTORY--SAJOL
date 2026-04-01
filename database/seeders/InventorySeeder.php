<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $locations = [
            'Warehouse A - Pasig',
            'Warehouse B - Makati', 
            'Warehouse C - Quezon City',
            'Warehouse D - Mandaluyong',
            'Warehouse E - BGC Taguig'
        ];

        foreach ($products as $index => $product) {
            Inventory::create([
                'quantity' => rand(5, 50),
                'location' => $locations[$index % count($locations)],
                'min_stock' => 5,
                'max_stock' => 30,
                'product_id' => $product->id
            ]);
        }
    }
}
