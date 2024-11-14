<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaslonResource\Pages;
use App\Filament\Resources\PaslonResource\RelationManagers;
use App\Models\Paslon;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Columns\ImageColumn;

class PaslonResource extends Resource
{
    protected static ?string $model = Paslon::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_urut')
                    ->label('No Urut')
                    ->required(),

                Forms\Components\TextInput::make('nama')
                    ->label('Nama Calon Kandidat')
                    ->required(),

                Forms\Components\TextInput::make('prodi')
                    ->label('Program Studi')
                    ->required(),

                Forms\Components\Textarea::make('visi')
                    ->label('Visi')
                    ->required()
                    ->rows(4),

                Forms\Components\Repeater::make('misis')
                    ->relationship('misis')
                    ->label('Daftar Misi')
                    ->schema([
                        Forms\Components\Textarea::make('misi')
                            ->label('Misi')
                            ->required()
                    ])
                    ->defaultItems(1)
                    ->minItems(1)
                    ->columns(1),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->required()
                    ->maxSize(10240)
                    ->disk('public') // Menyimpan file di disk 'public'
                    ->directory('photos'), // Menyimpan file di folder 'photos' dalam public disk
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_urut'),
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('prodi'),
                Tables\Columns\TextColumn::make('visi'),
                Tables\Columns\TextColumn::make('misi'),

                // Menampilkan gambar dengan path yang disimpan di database
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public') // Menentukan disk tempat gambar disimpan
                    ->width(100) // Menentukan lebar gambar yang ditampilkan
                    ->height(100) // Menentukan tinggi gambar yang ditampilkan
                    ->getStateUsing(function ($record) {
                        // Menyusun URL gambar berdasarkan path yang disimpan
                        return asset('storage/' . $record->foto);
                    }),
            ])
            ->filters([ /* Tambahkan filter jika perlu */])
            ->actions([ /* Tambahkan actions jika perlu */])
            ->bulkActions([ /* Tambahkan bulk actions jika perlu */]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaslons::route('/'),
            'create' => Pages\CreatePaslon::route('/create'),
            'edit' => Pages\EditPaslon::route('/{record}/edit'),
        ];
    }
}
