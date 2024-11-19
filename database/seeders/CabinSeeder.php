<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('cabins')->insert([
            'name' => 'Cabaña 1',
            'cabinlevel_id' => 1,
            'capacity' => 4,
        ]);
    }
}
