<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sex = rand(1, 2)%2 == 1 ? 'M' : 'F';
        return [
            'mrn' => $this->faker->unique()->numberBetween(100000, 999999),
            'name' => $this->faker->name($sex == 'M' ? 'male' : 'female'),
            'sex' => $sex,
            'birth_day' => $this->faker->date(),
            'birth_place' => $this->faker->city,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'origin' => $this->faker->country
        ];
    }
}
