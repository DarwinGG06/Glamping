<?php

namespace Database\Factories;

use App\Models\CabinLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cabin>
 */
class CabinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->streetName(),
            'capacity' => fake()->randomDigit(),
            // Utiliza el modelo CabinLevel para obtener un registro aleatorio
            'cabinlevel_id' => CabinLevel::query()->inRandomOrder()->value('id') ?? CabinLevel::factory()->create()->id,
        ];
    }
}
