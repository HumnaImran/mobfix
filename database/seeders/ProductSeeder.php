<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $mobileModels = [
            [
                'name' => 'iPhone 13',
                'category_id' => 2,
                'price' => 12000,
                'store_id' => 1,
            ],
            [
                'name' => 'Samsung Galaxy S21',
                'category_id' => 1,
                'price' => 150000,
                'store_id' => 2,
            ],

            [
                'name' => 'Oppo A16e (4GB , 64GB) Dual Sim',
                'category_id' => 8,
                'price' => 45000,
                'store_id' => 2,
            ],

            [
                'name' => 'Oppo A16e (4GB , 64GB) Dual Sim',
                'category_id' => 8,
                'price' => 45000,
                'store_id' => 2,
            ],

            [
                'name' => 'Google Pixel 6',
                'category_id' => 4,
                'price' => 90000,
                'store_id' => 1,
            ],
            [
                'name' => 'Xiaomi Redmi Note 10',
                'category_id' => 6,
                'price' => 300,
                'store_id' => 2,
            ],

            [
                'name' => 'OnePlus 9 Pro',
                'category_id' => 1,
                'price' => 1100,
                'store_id' => 3,
            ],
            [
                'name' => 'Sony Xperia 5 III',
                'category_id' => 11,
                'price' => 800,
                'store_id' => 1,
            ],

        ];

        // Seed mobile models
        foreach ($mobileModels as $modelData) {
            Product::create($modelData);
        }
    }
}
