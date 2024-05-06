<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $bodySpecifications = [
        //     'Dimension',
        //     'Weight',
        //     'Sim',
        //     'Battery',
        //     'display'

        // ];

        // foreach ($bodySpecifications as $specName1) {
        //     DB::table('p_specs')->insert([
        //         'name' => $specName1,
        //         'type' => 'Body',
        //         'status' => 'active',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }


        // $bodySpecifications = [
        //     'OS',
        //     'Chipsit',
        //     'CPU',
        //     'GPU',
        // ];

        // foreach ($bodySpecifications as $specName2) {
        //     DB::table('p_specs')->insert([
        //         'name' => $specName2,
        //         'type' => 'Platform',
        //         'status' => 'active',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // $bodySpecifications = [
        //     'RAM',
        //     'Storage',

        // ];

        // foreach ($bodySpecifications as $specName3) {
        //     DB::table('p_specs')->insert([
        //         'name' => $specName3,
        //         'type' => 'Memory',
        //         'status' => 'active',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }


        $bodySpecifications = [
            'Primary Camera',
            'Secondary Camera',
            'Features',
            'Video',

        ];

        foreach ($bodySpecifications as $specName4) {
            DB::table('p_specs')->insert([
                'name' => $specName4,
                'type' => 'camera',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        $bodySpecifications = [
            'Entertainment',

        ];

        foreach ($bodySpecifications as $specName5) {
            DB::table('p_specs')->insert([
                'name' => $specName5,
                'type' => 'Entertainment',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        $bodySpecifications = [
            'Hidden Features',
            'connectivity',
            'Operating Frequency',
            'colors',
            'sensors',
            'Ring Tones',
            'Messaging',

        ];

        foreach ($bodySpecifications as $specName6) {
            DB::table('p_specs')->insert([
                'name' => $specName6,
                'type' => 'other Features',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }







    }
    }


