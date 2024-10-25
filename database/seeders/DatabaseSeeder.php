<?php

namespace Database\Seeders;

use App\Models\CabinLevel;
use App\Models\Cabin;
use App\Models\Service;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        CabinLevel::factory()->count(10)->create();
        Cabin::factory()->count(10)->create();
        Service::factory()->count(10)->create();

        $this->call([
            UserSeeder::class,
            ServiceSeeder::class,
            CabinLevelSeeder::class,
        ]);
    }
}
