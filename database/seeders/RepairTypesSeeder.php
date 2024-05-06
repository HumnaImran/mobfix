<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepairTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('repair_types')->insert([
            ['name' => 'Inner Screen Replacement'],
            ['name' => 'Outer Screen Replacement'],
            ['name' => 'MainBoard Replacement'],
            ['name' => 'Battery Replacement'],
            ['name' => 'Charging Port Repair'],
            ['name' => 'Camera Repair'],
            ['name' => 'Software Troubleshooting'],
            ['name' => 'Water Damage Repair'],
            ['name' => 'Speaker/Microphone Repair'],
            ['name' => 'Home Button Repair'],
            ['name' => 'Data Recover'],

        ]);
    }
}
