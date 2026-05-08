<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class OptimizeProductImages extends Command
{
    protected $signature = 'pos:optimize-images
        {--only-missing : Only generate conversions that do not yet exist}
        {--force : Force regeneration even in production}';

    protected $description = 'Generate WebP and resized conversions (thumb/card/full) for all product images';

    public function handle(): int
    {
        $count = Product::has('media')->count();

        if ($count === 0) {
            $this->warn('No products with images found.');

            return self::SUCCESS;
        }

        $this->info("Found {$count} product(s) with images. Queuing conversions…");

        $args = ['modelType' => Product::class];

        if ($this->option('only-missing')) {
            $args['--only-missing'] = true;
        }

        if ($this->option('force')) {
            $args['--force'] = true;
        }

        $this->call('media-library:regenerate', $args);

        $this->info('Done.');

        return self::SUCCESS;
    }
}
