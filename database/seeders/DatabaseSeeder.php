<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $this->call(UserSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(StoreSeeder::class);
        // $this->call(ProductSeeder::class);
        // $this->call(SpecificationSeeder::class);
        $this->call(RepairTypesSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
