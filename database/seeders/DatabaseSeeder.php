<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ThirdParty;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        ThirdParty::factory(2)->create();
        $this->call([
            PermissionSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
            ProductSeeder::class,
            CustomerSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
