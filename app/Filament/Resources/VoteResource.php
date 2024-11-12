<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VoteResource\Pages;
use App\Filament\Resources\VoteResource\RelationManagers;
use App\Models\Vote;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\VoteResource\Widgets\Stats;

class VoteResource extends Resource
{
    protected static ?string $model = Vote::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_paslon')
                    ->required()
                    ->relationship('paslon', 'no_urut'),
                Forms\Components\Select::make('id_mahasiswa')
                    ->required()
                    ->relationship('mahasiswa', 'nim'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('paslon.no_urut')
                    ->label('No Urut Paslon'),
                Tables\Columns\TextColumn::make('mahasiswa.nim')
                    ->label('NIM Mahasiswa'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu Voting'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Update Waktu Voting'),
            ])
            ->filters([
                SelectFilter::make('id_paslon')
                    ->relationship('paslon', 'no_urut'),
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
            'index' => Pages\ListVotes::route('/'),
            'create' => Pages\CreateVote::route('/create'),
            'edit' => Pages\EditVote::route('/{record}/edit'),
        ];
    }
}
