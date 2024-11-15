<?php

namespace App\Filament\Imports;

use Illuminate\Support\Facades\Log;
use App\Models\Mahasiswa;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Carbon\Carbon;

class MahasiswaImporter extends Importer
{
    protected static ?string $model = Mahasiswa::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nim')
                ->label('NIM')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
        ];
    }

    public function resolveRecord(): ?Mahasiswa
    {
        $data = $this->data;

        Log::info('Importing record: ', $data);

        if (empty($data['nim'])) {
            Log::error('NIM is missing in the CSV data.');
            return null;
        }

        return Mahasiswa::firstOrNew([
            'nim' => $data['nim'],
        ], [
            'status_vote' => 'no',
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your mahasiswa import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
