<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber,
            'date' => $faker->date(),
            'time' => $faker->time(),
            'people' => $faker->numberBetween(1, 10),
            'message' => $faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
