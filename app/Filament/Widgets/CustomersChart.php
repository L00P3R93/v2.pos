<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use Filament\Widgets\ChartWidget;

class CustomersChart extends ChartWidget
{
    protected ?string $heading = 'Total Customers';

    protected function getData(): array
    {
        $currentYear = now()->year;
        $customers = Customer::query()
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $monthlyData = array_fill(1,12, 0);
        foreach ($customers as $month => $count) {
            $monthlyData[$month] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'New Customers',
                    'data' => array_values($monthlyData),
                    'fill' => 'start',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.2)',
                    'borderColor' => 'rgba(16, 185, 129, 1)',
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
