<?php

namespace Database\Factories;

use App\Faker\Providers\KenyaProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
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
            'country' => strtolower($faker->countryCode()),
            'street' => $faker->streetAddress(),
            'state' => $faker->county(),
            'city' => $faker->city(),
            'zip' => $faker->postcode(),
        ];
    }
}
