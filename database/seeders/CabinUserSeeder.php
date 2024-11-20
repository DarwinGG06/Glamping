<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CabinUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cabin_user')->insert([
            ['cabin_id' => 1, 'user_id' => 1],
            ['cabin_id' => 1, 'user_id' => 2],
        ]);
    }
}
