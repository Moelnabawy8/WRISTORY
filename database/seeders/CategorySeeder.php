<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Men', 'Women', 'Unisex', 'Classic', 'Digital',
            'Smart', 'Luxury', 'Sport', 'Automatic', 'Chronograph'
        ];

        foreach ($categories as $category) {
           Category::firstOrCreate(['name' => $category]);
        }
    }
}
