<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $techSource = Supplier::where('name', 'TechSource Philippines Inc.')->first();
        $megaHardware = Supplier::where('name', 'MegaHardware Depot')->first();
        $electroWorld = Supplier::where('name', 'ElectroWorld Solutions')->first();

        Product::create([
            'name' => 'Acer Aspire 5 Laptop',
            'description' => '15.6" FHD Display, Intel Core i5, 8GB RAM, 512GB SSD - Perfect for work and study',
            'price' => 28999.00,
            'sku' => 'ACER-ASP5-001',
            'supplier_id' => $techSource->id
        ]);

        Product::create([
            'name' => 'Logitech M185 Wireless Mouse',
            'description' => 'Compact wireless mouse with 12-month battery life, reliable plug-and-play connection',
            'price' => 599.00,
            'sku' => 'LOG-M185-001',
            'supplier_id' => $techSource->id
        ]);

        Product::create([
            'name' => 'Redragon K552 Mechanical Keyboard',
            'description' => 'RGB backlit mechanical gaming keyboard with blue switches, durable aluminum frame',
            'price' => 1599.00,
            'sku' => 'RED-K552-001',
            'supplier_id' => $megaHardware->id
        ]);

        Product::create([
            'name' => 'UGREEN USB-C Hub 7-in-1',
            'description' => 'Multi-port adapter with HDMI 4K, USB 3.0, SD/TF card reader, PD charging',
            'price' => 1299.00,
            'sku' => 'UGR-7IN1-001',
            'supplier_id' => $megaHardware->id
        ]);

        Product::create([
            'name' => 'Samsung 27" Monitor LS27R350',
            'description' => '27" FHD IPS monitor with 75Hz refresh rate, AMD FreeSync, eye care features',
            'price' => 8999.00,
            'sku' => 'SAM-27FHD-001',
            'supplier_id' => $electroWorld->id
        ]);

        Product::create([
            'name' => 'Razer Kiyo Pro Webcam',
            'description' => '1080p 60FPS webcam with adaptive light sensor, built-in ring light, noise-canceling mic',
            'price' => 4599.00,
            'sku' => 'RZ-KIYO-001',
            'supplier_id' => $electroWorld->id
        ]);
    }
}
