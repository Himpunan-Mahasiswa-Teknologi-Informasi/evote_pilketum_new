<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CakeResource\Pages;
use App\Filament\Resources\CakeResource\RelationManagers;
use App\Models\Cake;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;

class CakeResource extends Resource
{
    protected static ?string $model = Cake::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama')
                    ->required(),
                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->rows(4),

                Forms\Components\Select::make('prodi')
                    ->label('Program Studi')
                    ->options([
                        'TI' => 'D4 Teknik Informatika',
                        'SIB' => 'D4 Sistem Informasi Bisnis'
                    ])
                    ->required(),
                Forms\Components\TextInput::make('kelas')
                    ->label('Kelas')
                    ->required(),
                Forms\Components\Select::make('id_paslon')
                    ->required()
                    ->relationship('paslon', 'no_urut'),
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

                Tables\Columns\TextColumn::make('paslon.no_urut')
                    ->label('No Urut Paslon'),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('prodi')
                    ->label('Program Studi'),

                Tables\Columns\TextColumn::make('kelas')
                    ->label('Kelas'),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi'),
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
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListCakes::route('/'),
            'create' => Pages\CreateCake::route('/create'),
            'edit' => Pages\EditCake::route('/{record}/edit'),
        ];
    }
}
