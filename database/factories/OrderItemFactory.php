<?php

namespace Database\Factories;

use App\Faker\Providers\KenyaProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
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
            'qty' => $faker->numberBetween(1, 10),
            'unit_price' => $faker->randomFloat(2, 100, 500),
        ];
    }
}
