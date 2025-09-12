<?php

namespace Database\Factories;

use App\Faker\Providers\KenyaProvider;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'name' => $name = $faker->unique()->words(3, true),
            'slug' => Str::slug($name),
            'description' => $faker->realText(),
            'is_visible' => $faker->boolean(),
            'created_at' => $faker->dateTimeBetween('-1 year', '-6 month'),
            'updated_at' => $faker->dateTimeBetween('-5 month', 'now'),
        ];
    }
}
