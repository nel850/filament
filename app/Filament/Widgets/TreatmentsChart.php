<?php

namespace App\Filament\Widgets;

use App\Models\Treatment;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\LineChartWidget;

class TreatmentsChart extends LineChartWidget
{
    protected static ?string $heading = 'Treatments';

    protected function getData(): array
    {
        $data = Trend::model(Treatment::class)
        ->between(
            start: now()->subYear(),
            end: now(),
        )
        ->perMonth()
        ->count();


        return [
            'datasets' => [
                [
                    'lable' => 'Treatments',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
           'labels' => $data->map(fn (TrendValue $value) => $value->date), 
        ];
    }
}
