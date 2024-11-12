<?php

namespace App\Filament\Widgets;

use App\Models\Mahasiswa;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class JumlahMahasiswa extends BaseWidget
{
    protected function getCards(): array
    {
        // Menghitung jumlah mahasiswa
        $jumlahMahasiswa = Mahasiswa::count();

        return [
            Card::make('Jumlah Mahasiswa', $jumlahMahasiswa)
                ->description('Total Mahasiswa Terdaftar')
                ->descriptionIcon('heroicon-s-users'),
        ];
    }
}
