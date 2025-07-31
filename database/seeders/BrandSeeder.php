<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Rolex', 'Omega', 'Casio', 'Seiko', 'Tissot',
            'Fossil', 'Tag Heuer', 'Citizen', 'Daniel Wellington',
            'Apple', 'Samsung', 'Hublot', 'Longines'
        ];

        foreach ($brands as $brand) {
           Brand::firstOrCreate(['name' => $brand]);
        }
    }
}
