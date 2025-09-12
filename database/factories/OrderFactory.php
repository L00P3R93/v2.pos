<?php

namespace Database\Factories;

use App\Faker\Providers\KenyaProvider;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
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
            'number' => 'OR' . $faker->unique()->randomNumber(6),
            'currency' => strtolower($faker->currencyCode()),
            'total_price' => $faker->randomFloat(2, 100, 2000),
            'status' => $faker->randomElement(['new', 'processing', 'shipped', 'delivered', 'cancelled']),
            'shipping_price' => $faker->randomFloat(2, 100, 500),
            'shipping_method' => $faker->randomElement(['free', 'flat', 'flat_rate', 'flat_rate_per_item']),
            'notes' => $faker->realText(100),
            'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $faker->dateTimeBetween('-5 month', 'now'),
        ];
    }

    public function configure(): Factory
    {
        return $this->afterCreating(function (Order $order): void {
            $order->address()->save(OrderAddressFactory::new()->make());
        });
    }
}
