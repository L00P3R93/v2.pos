<?php

namespace Database\Factories;

use Akaunting\Money\Currency;
use App\Faker\Providers\KenyaProvider;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
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
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'reference' => 'PAY' . $faker->unique()->randomNumber(6),
            'currency' => $faker->randomElement(collect(Currency::getCurrencies())->keys()),
            'amount' => $faker->randomFloat(2, 100, 2000),
            'provider' => $faker->randomElement(['stripe', 'paypal', 'cash', 'mpesa']),
            'method' => $faker->randomElement(['credit_card', 'bank_transfer', 'paypal', 'cash', 'mpesa']),
            'created_at' => $faker->dateTimeBetween('-1 year', '-6 month'),
            'updated_at' => $faker->dateTimeBetween('-5 month', 'now'),
        ];
    }
}
