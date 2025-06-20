<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaranganResource\Pages;
use App\Models\ProfilKonten;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class LaranganResource extends Resource
{
    protected static ?string $model = ProfilKonten::class;
    protected static ?string $modelLabel = 'Poin Larangan';
    protected static ?string $pluralModelLabel = 'Larangan';
    protected static ?string $navigationIcon = 'heroicon-o-x-circle';
    protected static ?string $navigationGroup = 'Profil';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('kategori', 'larangan');
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Hidden::make('kategori')->default('larangan'),
            Forms\Components\Textarea::make('konten')
                ->label('Isi Poin Larangan')
                ->required(),
            Forms\Components\TextInput::make('urutan')
                ->numeric()
                ->default(0)
                ->helperText('Urutan tampil, angka lebih kecil akan tampil lebih dulu.'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('konten')->wrap(),
                Tables\Columns\TextColumn::make('urutan')->sortable(),
            ])
            ->defaultSort('urutan', 'asc')
            ->reorderable('urutan')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLarangans::route('/'),
        ];
    }
}
