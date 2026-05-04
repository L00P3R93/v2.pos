<?php

namespace App\Filament\Widgets;

use App\Models\Payment;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class RevenueStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $revenueData = Trend::model(Payment::class)
            ->between(start: now()->subYear(), end: now())
            ->perMonth()
            ->sum('amount');

        $todayRevenue = Payment::query()->whereDate('created_at', today())->sum('amount');
        $monthRevenue = Payment::query()
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('amount');
        $totalRevenue = Payment::query()->sum('amount');

        return [
            Stat::make("Today's Revenue", 'KES '.number_format((float) $todayRevenue))
                ->description('Payments received today')
                ->descriptionIcon('heroicon-m-sun')
                ->color('success'),
            Stat::make('Monthly Revenue', 'KES '.number_format((float) $monthRevenue))
                ->description(now()->format('F Y'))
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary'),
            Stat::make('Total Revenue', 'KES '.number_format((float) $totalRevenue))
                ->chart($revenueData->map(fn (TrendValue $value) => $value->aggregate)->toArray())
                ->description('All-time collections')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('warning'),
        ];
    }
}
