<?php

namespace App\Filament\Resources\Orders\Widgets;

use App\Filament\Resources\Orders\Pages\ListOrders;
use App\Models\Order;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class OrderStats extends StatsOverviewWidget
{
    use InteractsWithPageTable;

    protected ?string $pollingInterval = null;

    protected function getTablePage(): string
    {
        return ListOrders::class;
    }

    protected function getStats(): array
    {
        $orderData = Trend::model(Order::class)->between(
            start: now()->subYear(),
            end: now(),
        )->perMonth()->count();

        return [
            Stat::make('Orders', $this->getPageTableQuery()->count())->chart(
                $orderData->map(fn (TrendValue $value) => $value->aggregate)->toArray()
            ),
            Stat::make('Open orders', $this->getPageTableQuery()->whereIn('status', ['open', 'processing'])->count()),
            Stat::make('Average price', number_format((float) $this->getPageTableQuery()->avg('total_price'), 2))
        ];
    }
}
