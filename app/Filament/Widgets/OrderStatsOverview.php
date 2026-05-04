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
                return Number::format($number / 1000, 2).'k';
            }

            return Number::format($number / 1000000, 2).'M';
        };

        return [
            Stat::make('Total Orders', Order::count())
                ->chart($orderData->map(fn (TrendValue $value) => $value->aggregate)->toArray())
                ->color('success')
                ->description('All-time orders')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Open Orders', Order::query()->whereIn('status', ['new', 'processing'])->count())
                ->description('New & processing')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
            Stat::make('Avg. Order Value', 'KES '.$formatNumber((int) Order::query()->avg('total_price')))
                ->description('Average order price')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('info'),
        ];
    }
}
