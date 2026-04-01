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
            'brand' => 'Apple',
            'model' => 'iPhone 15 Pro',
            'name' => 'iPhone 15 Pro 256GB',
            'description' => '6.1" Super Retina XDR display, A17 Pro chip, titanium design, ProRAW photography',
            'price' => 62990.00,
            'sku' => 'APL-IP15P-256',
            'supplier_id' => $techSource->id
        ]);

        Product::create([
            'brand' => 'Samsung',
            'model' => 'Galaxy S24 Ultra',
            'name' => 'Galaxy S24 Ultra 512GB',
            'description' => '6.8" Dynamic AMOLED 2X, S Pen included, 200MP camera, titanium armor frame',
            'price' => 74990.00,
            'sku' => 'SAM-GS24U-512',
            'supplier_id' => $techSource->id
        ]);

        Product::create([
            'brand' => 'Xiaomi',
            'model' => 'Redmi Note 13 Pro',
            'name' => 'Redmi Note 13 Pro 256GB',
            'description' => '6.67" AMOLED 120Hz display, 200MP main camera, 67W fast charging, MediaTek Dimensity 7200',
            'price' => 18990.00,
            'sku' => 'XIA-RN13P-256',
            'supplier_id' => $megaHardware->id
        ]);

        Product::create([
            'brand' => 'OnePlus',
            'model' => '12',
            'name' => 'OnePlus 12 256GB',
            'description' => '6.82" LTPO 3 AMOLED, Snapdragon 8 Gen 3, 100W SuperVOOC charging, Hasselblad camera',
            'price' => 45990.00,
            'sku' => 'ONE-OP12-256',
            'supplier_id' => $megaHardware->id
        ]);

        Product::create([
            'brand' => 'Google',
            'model' => 'Pixel 8 Pro',
            'name' => 'Pixel 8 Pro 256GB',
            'description' => '6.7" LTPO OLED, Google Tensor G3, 50MP main camera, 7 years of updates',
            'price' => 52990.00,
            'sku' => 'GOO-PX8P-256',
            'supplier_id' => $electroWorld->id
        ]);

        Product::create([
            'brand' => 'Oppo',
            'model' => 'Find X7 Ultra',
            'name' => 'Find X7 Ultra 512GB',
            'description' => '6.82" AMOLED 120Hz, Snapdragon 8 Gen 3, Hasselblad camera system, 100W charging',
            'price' => 48990.00,
            'sku' => 'OPPO-FX7U-512',
            'supplier_id' => $electroWorld->id
        ]);
    }
}
