<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SavedCart extends Model
{
    protected $fillable = [
        'user_id',
        'customer_id',
        'name',
        'items',
    ];

    protected function casts(): array
    {
        return [
            'items' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function getTotalAttribute(): float
    {
        return collect($this->items)->sum(fn ($item) => $item['qty'] * $item['price']);
    }

    public function getItemCountAttribute(): int
    {
        return collect($this->items)->sum('qty');
    }
}
