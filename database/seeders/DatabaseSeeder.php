<?php

namespace Database\Seeders;

use App\Models\CabinLevel;
use App\Models\Service;
use App\Models\User;
use App\Models\Cabin;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        CabinLevel::factory()->count(10)->create();
        Service::factory()->count(10)->create();
        Cabin::factory()->count(10)->create();

        $this->call([
            UserSeeder::class,
            ServiceSeeder::class,
            CabinLevelSeeder::class,
            CabinSeeder::class,
            CabinServiceSeeder::class,
            CabinUserSeeder::class,
        ]);
    }
}
