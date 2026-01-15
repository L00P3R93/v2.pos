<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Number;

class ProductStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $productData = Trend::model(Product::class)->between(
            start: now()->subYear(),
            end: now(),
        )->perMonth()->count();

        $formatNumber = function (int $number): string {
            if ($number < 1000) {
                return (string) Number::format($number, 0);
            }

            if ($number < 1000000) {
                return Number::format($number / 1000, 2) . 'k';
            }

            return Number::format($number / 1000000, 2) . 'M';
        };

        return [
            Stat::make('', Product::query()->count())->chart(
                $productData->map(fn (TrendValue $value) => $value->aggregate)->toArray()
            )->color('primary')->description('Total Products')->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('', Product::query()->sum('qty'))->description('Product Inventory')->descriptionIcon('heroicon-m-archive-box'),
            Stat::make('', 'KES ' . $formatNumber((float) Product::query()->avg('price')))->description('Average price')->descriptionIcon('heroicon-m-currency-dollar'),
        ];
    }
}
