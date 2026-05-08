<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\Conversions\ConversionCollection;
use Spatie\MediaLibrary\Conversions\Jobs\PerformConversionsJob;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductObserver
{
    /**
     * Regenerate any missing image conversions whenever a product is saved.
     * Spatie Media Library runs conversions automatically on fresh uploads;
     * this observer covers images that were imported or added outside the
     * normal upload flow.
     */
    public function saved(Product $product): void
    {
        Cache::increment('pos.products.version');

        $product->getMedia('product-images')
            ->filter(fn (Media $media): bool => ! $media->hasGeneratedConversion('thumb'))
            ->each(function (Media $media): void {
                PerformConversionsJob::dispatch(
                    ConversionCollection::createForMedia($media),
                    $media,
                    onlyMissing: true,
                );
            });
    }

    public function deleted(Product $product): void
    {
        Cache::increment('pos.products.version');
    }
}
