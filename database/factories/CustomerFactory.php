<?php

namespace Database\Factories;

use App\Faker\Providers\KenyaProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->withFaker();
        $faker->addProvider(new KenyaProvider($faker));
        return [
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'phone' => $faker->unique()->kenyanPhone(),
            'birthday' => $faker->dateTimeBetween('-35 years', '-18 years'),
            'gender' => $faker->randomElement(['male', 'female']),
            'created_at' => $faker->dateTimeBetween('-1 year', '-6 month'),
            'updated_at' => $faker->dateTimeBetween('-5 month', 'now'),
        ];
    }
}
