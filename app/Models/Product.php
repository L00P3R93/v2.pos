<?php

namespace App\Models;

use App\Traits\Auditable;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    /** @use HasFactory<ProductFactory> */
    use Auditable, HasFactory, InteractsWithMedia;

    protected $table = 'products';

    protected $casts = [
        'featured' => 'boolean',
        'is_visible' => 'boolean',
        'backorder' => 'boolean',
        'requires_shipping' => 'boolean',
        'published_at' => 'date',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id')->withTimestamps();
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product-images')->useDisk('public');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Fit::Crop, 150, 150)
            ->performOnCollections('product-images');

        $this->addMediaConversion('thumb-webp')
            ->fit(Fit::Crop, 150, 150)
            ->format('webp')
            ->performOnCollections('product-images');

        $this->addMediaConversion('card')
            ->fit(Fit::Crop, 400, 400)
            ->performOnCollections('product-images');

        $this->addMediaConversion('card-webp')
            ->fit(Fit::Crop, 400, 400)
            ->format('webp')
            ->performOnCollections('product-images');

        $this->addMediaConversion('full')
            ->fit(Fit::Contain, 800, 800)
            ->performOnCollections('product-images');

        $this->addMediaConversion('full-webp')
            ->fit(Fit::Contain, 800, 800)
            ->format('webp')
            ->performOnCollections('product-images');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
