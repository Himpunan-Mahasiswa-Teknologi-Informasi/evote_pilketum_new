<?php

namespace App\Filament\Widgets;

use App\Models\Mahasiswa;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsMahasiswaOverview extends BaseWidget
{
    protected function getCards(): array
    {
        // Menghitung jumlah mahasiswa
        $jumlahMahasiswa = Mahasiswa::count();

        // Menghitung jumlah mahasiswa yang belum memilih
        $jumlahMahasiswaBelumMemilih = Mahasiswa::where('status_vote', 'no')->count();

        // Menghitung jumlah mahasiswa yang sudah memilih
        $jumlahMahasiswaSudahMemilih = Mahasiswa::where('status_vote', 'done')->count();

        return [
            // Card untuk total jumlah mahasiswa
            Card::make('Jumlah Mahasiswa', $jumlahMahasiswa)
                ->description('Total Mahasiswa Terdaftar')
                ->descriptionIcon('heroicon-s-users'),

            // Card untuk jumlah mahasiswa yang belum memilih
            Card::make('Mahasiswa Belum Memilih', $jumlahMahasiswaBelumMemilih)
                ->description('Total Mahasiswa Belum Memilih')
                ->descriptionIcon('heroicon-s-users'),

            // Card untuk jumlah mahasiswa yang sudah memilih
            Card::make('Mahasiswa Sudah Memilih', $jumlahMahasiswaSudahMemilih)
                ->description('Total Mahasiswa Sudah Memilih')
                ->descriptionIcon('heroicon-s-users'),
        ];
    }
}
