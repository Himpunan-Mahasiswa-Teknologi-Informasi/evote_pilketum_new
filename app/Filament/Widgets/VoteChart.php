<?php

namespace App\Filament\Widgets;

use App\Models\Vote;
use Filament\Widgets\ChartWidget;

class VoteChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Hasil Pemilihan';
    protected static string $color = 'info';

    protected function getData(): array
    {
        // Ambil data jumlah vote berdasarkan paslon
        $votes = Vote::with('paslon')
            ->get()
            ->groupBy('paslon.no_urut')
            ->map(fn($items) => $items->count());

        // Pisahkan data menjadi label dan data untuk chart
        $labels = $votes->keys()->toArray();
        $data = $votes->values()->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Vote',
                    'data' => $data,
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        // Tambahkan lebih banyak warna jika ada lebih dari tiga paslon
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
