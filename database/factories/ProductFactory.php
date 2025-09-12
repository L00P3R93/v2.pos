<?php

namespace Database\Factories;

use App\Faker\Providers\KenyaProvider;
use App\Models\Product;
use App\Models\User;
use Database\Seeders\LocalImages;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Exceptions\UnreachableUrl;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'sku' => $faker->unique()->ean8(),
            'barcode' => $faker->ean13(),
            'description' => $faker->realText(),
            'qty' => $faker->randomDigitNotNull(),
            'security_stock' => $faker->randomDigitNotNull(),
            'featured' => $faker->boolean(),
            'is_visible' => $faker->boolean(),
            'old_price' => $faker->randomFloat(2, 100, 500),
            'price' => $faker->randomFloat(2, 80, 400),
            'cost' => $faker->randomFloat(2, 50, 200),
            'type' => $faker->randomElement(['deliverable', 'downloadable']),
            'published_at' => $faker->dateTimeBetween('-1 year', '+1 year'),
            'created_at' => $faker->dateTimeBetween('-1 year', '-6 month'),
            'updated_at' => $faker->dateTimeBetween('-5 month', 'now'),
        ];
    }

    public function configure(): ProductFactory
    {
        return $this->afterCreating(function (Product $product): void {
            try {
                $product->addMedia(LocalImages::getRandomPath())->preservingOriginal()->toMediaCollection('product-images');
            } catch (UnreachableUrl $e) { return; }
        });
    }
}
