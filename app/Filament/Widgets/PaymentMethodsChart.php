<?php

namespace App\Filament\Widgets;

use App\Models\Payment;
use Filament\Widgets\ChartWidget;

class PaymentMethodsChart extends ChartWidget
{
    protected ?string $heading = 'Revenue by Payment Method';

    protected ?string $description = 'Total collected per method';

    protected function getData(): array
    {
        $payments = Payment::query()
            ->selectRaw('method, COUNT(*) as count, SUM(amount) as total')
            ->groupBy('method')
            ->orderByDesc('total')
            ->get();

        $colors = [
            'rgba(99, 102, 241, 0.8)',
            'rgba(16, 185, 129, 0.8)',
            'rgba(245, 158, 11, 0.8)',
            'rgba(239, 68, 68, 0.8)',
            'rgba(59, 130, 246, 0.8)',
            'rgba(168, 85, 247, 0.8)',
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Revenue (KES)',
                    'data' => $payments->pluck('total')->map(fn ($v) => (float) $v)->toArray(),
                    'backgroundColor' => array_slice($colors, 0, $payments->count()),
                    'borderRadius' => 4,
                ],
            ],
            'labels' => $payments->pluck('method')->map(fn ($m) => ucfirst($m))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
