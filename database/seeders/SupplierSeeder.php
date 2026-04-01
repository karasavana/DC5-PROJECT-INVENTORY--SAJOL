<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        Supplier::create([
            'name' => 'TechSource Philippines Inc.',
            'email' => 'sales@techsource.ph',
            'phone' => '+63-2-8856-2300',
            'address' => '123 Ortigas Avenue, Pasig City, Metro Manila 1600',
            'contact_person' => 'Juan Dela Cruz'
        ]);

        Supplier::create([
            'name' => 'MegaHardware Depot',
            'email' => 'info@megahardware.com.ph',
            'phone' => '+63-2-8771-4500',
            'address' => '456 Makati Avenue, Makati City, Metro Manila 1200',
            'contact_person' => 'Maria Santos'
        ]);

        Supplier::create([
            'name' => 'ElectroWorld Solutions',
            'email' => 'contact@electroworld.ph',
            'phone' => '+63-2-8123-6789',
            'address' => '789 Quezon Boulevard, Quezon City, Metro Manila 1100',
            'contact_person' => 'Carlos Reyes'
        ]);
    }
}
