<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class OrdersChart extends ChartWidget
{
    protected ?string $heading = 'Orders Per Month';

    protected function getData(): array
    {
        $currentYear = now()->year;
        $orders = \App\Models\Order::query()
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $monthlyData = array_fill(1,12, 0);
        foreach ($orders as $month => $count) {
            $monthlyData[$month] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Orders',
                    'data' => array_values($monthlyData),
                    'fill' => 'start',
                    'backgroundColor' => 'rgba(99, 102, 241, 0.2)',
                    'borderColor' => 'rgba(99, 102, 241, 1)',
                    'borderWidth' => 2,
                    'tension' => 0.3,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
