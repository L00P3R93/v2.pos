<?php

namespace Database\Seeders;

use App\Filament\Resources\Orders\OrderResource;
use App\Models\Address;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Console\Helper\ProgressBar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::raw('SET time_zone = "+03:00"');

        Storage::deleteDirectory('public');

        // Seed roles and permissions first
        $this->command->warn(PHP_EOL . 'Creating Roles and Permissions ...');
        $this->call(RolesSeeder::class);
        $this->command->info('Roles and Permissions created.');

        // Create Admin User
        $this->command->warn(PHP_EOL . 'Creating Admin User...');
        $admin = User::updateOrCreate([
            'name' => 'Sntaks Admin',
            'email' => 'sntaksolutionsltd@gmail.com',
            'phone' => '254727796831',
            'email_verified_at' => now(),
            'password' => Hash::make('Asdf@1234'),
            'remember_token' => Str::random(10),
            'status' => 'active',
        ]);
        $admin->assignRole('Super Admin');
        $this->command->info("Super Admin {$admin->name} created and assigned to 'Super Admin' role.");

        // Create Non-Admin Users
        $this->command->warn(PHP_EOL . 'Creating Non-Admin Users...');
        $users = $this->withProgressBar(10, fn () => User::factory(1)->create());
        $users->each(function (User $user) {
            $roles = ['Manager', 'Accountant', 'Inventory', 'Sales'];
            $user->assignRole($roles[array_rand($roles)]);
        });
        $this->command->info('Non-Admin users ' . $users->count() . ' created, assigned roles.');

        // Creating Brands
        $this->command->warn(PHP_EOL . 'Creating Brands...');
        $brands = $this->withProgressBar(20, fn () => Brand::factory()->count(20)
            ->has(Address::factory()->count(rand(1, 2)))
            ->create());
        Brand::query()->update(['sort' => new Expression('id')]);
        $this->command->info('Brands ' . $brands->count() . ' created.');

        // Creating Categories
        $this->command->warn(PHP_EOL . 'Creating Categories...');
        $categories = $this->withProgressBar(20, fn () => Category::factory(1)
            ->has(
                Category::factory()->count(3),
                'children'
            )->create());
        $this->command->info('Categories ' . $categories->count() . ' created.');

        // Creating Customers
        $this->command->warn(PHP_EOL . 'Creating Customers...');
        $customers = $this->withProgressBar(100, fn () => Customer::factory(1)
            ->has(
                Address::factory()->count(rand(1, 3)),
            )->create());
        $this->command->info('Customers ' . $customers->count() . ' created.');

        // Creating Products
        $this->command->warn(PHP_EOL . 'Creating Products...');
        $products = $this->withProgressBar(50, fn () => Product::factory(1)
            ->sequence(fn ($sequence) => ['brand_id' => $brands->random(1)->first()->id])
            ->hasAttached($categories->random(rand(3, 6)), ['created_at' => now(), 'updated_at' => now()])
            ->has(
                Comment::factory()->count(rand(10, 20))
                    ->state(fn (array $attributes, Product $product) => ['customer_id' => $customers->random(1)->first()->id])
            )
            ->create());
        $this->command->info('Products ' . $products->count() . ' created.');

        // Creating Orders
        $this->command->warn(PHP_EOL . 'Creating Orders...');
        $orders = $this->withProgressBar(100, fn () => Order::factory(1)
            ->sequence(fn ($sequence) => ['customer_id' => $customers->random(1)->first()->id])
            ->has(Payment::factory()->count(rand(1, 3)))
            ->has(
                OrderItem::factory()->count(rand(2, 5))->state(fn (array $attributes, Order $order) => ['product_id' => $products->random(1)->first()->id]),
                'items'
            )
            ->create());
        foreach ($orders->random(rand(5, 8)) as $order) {
            Notification::make()
                ->title('New Order')
                ->icon(Heroicon::OutlinedShoppingBag)
                ->body("{$order->customer->name} ordered {$order->items->count()} items.")
                ->actions([
                    Action::make('View')->url(OrderResource::getUrl('edit', ['record' => $order])),
                ])->sendToDatabase($admin);
        }
        $this->command->info('Orders ' . $orders->count() . ' created.');
    }

    protected function withProgressBar(int $amount, \Closure $createCollectionOfOne): Collection
    {
        $progressBar = new ProgressBar($this->command->getOutput(), $amount);
        $progressBar->start();

        $collection = new Collection();
        foreach (range(1, $amount) as $i) {
            $collection = $collection->merge($createCollectionOfOne());
            $progressBar->advance();
        }

        $progressBar->finish();

        $this->command->getOutput()->writeln("\n");

        return $collection;
    }
}
