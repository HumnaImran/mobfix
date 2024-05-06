<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\category;



class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mobileBrands = ['Samsung Mobiles', 'Apple Iphones', 'Infinix Mobiles','Google Mobiles', 'Huawei Mobiles', 'Xiaomi Mobiles','Lenovo Mobiles','Oppo Mobiles', 'Nokia Mobiles', 'Vivo Mobiles', 'Sony Mobiles'];
        foreach ($mobileBrands as $brand) {
            Category::create(['name' => $brand]);
        }
    }
}
