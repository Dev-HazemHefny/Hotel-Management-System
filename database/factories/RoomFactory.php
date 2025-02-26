<?php

namespace Database\Factories;

use App\Actions\Jetstream\UpdateTeamName;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_title' => $this->faker->word,
            'image' => $this->faker->word,
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(100,900),
            'wifi' =>$this->faker->randomElement(['yes', 'no']),
            'room_type' => $this->faker->randomElement(['single', 'double', 'family']),
            'room_status' => $this->faker->randomElement(['available', 'booked', 'maintenance']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
