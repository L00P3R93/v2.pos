<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Number;

class OrderStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $orderData = Trend::model(Order::class)->between(
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
            Stat::make('', Order::count())->chart(
                $orderData->map(fn (TrendValue $value) => $value->aggregate)->toArray()
            )->color('success')->description('Total Orders')->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('', Order::query()->whereIn('status', ['open', 'processing'])->count())->description('Open orders')->descriptionIcon('heroicon-m-clock'),
            Stat::make('', 'KES ' . $formatNumber((float) Order::query()->avg('total_price')))->description('Average price')->descriptionIcon('heroicon-m-currency-dollar')
        ];
    }
}
