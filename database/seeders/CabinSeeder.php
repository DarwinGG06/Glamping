<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //importante 

class CabinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cabins')->insert([
            'name' => "Cabaña luxury",
            'capacity' => 3,
            'cabinlevel_id' => 1,
        ]);
    }
}
