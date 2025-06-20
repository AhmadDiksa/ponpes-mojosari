<?php
namespace App\Filament\Resources;

use App\Filament\Resources\VisiResource\Pages;
use App\Models\ProfilKonten; // <-- Gunakan model baru
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class VisiResource extends Resource
{
    protected static ?string $model = ProfilKonten::class; // <-- Arahkan ke model baru
    protected static ?string $modelLabel = 'Poin Visi';
    protected static ?string $pluralModelLabel = 'Visi';
    protected static ?string $navigationIcon = 'heroicon-o-eye';
    protected static ?string $navigationGroup = 'Profil';

    // Filter data agar resource ini hanya menampilkan kategori 'visi'
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('kategori', 'visi');
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Hidden::make('kategori')->default('visi'), // Otomatis isi kategori
            Forms\Components\Textarea::make('konten')
                ->label('Isi Poin Visi')
                ->required(),
            Forms\Components\TextInput::make('urutan')
                ->numeric()->default(0)
                ->helperText('Urutan tampil, angka lebih kecil akan tampil lebih dulu.'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('konten')->wrap(),
            Tables\Columns\TextColumn::make('urutan')->sortable(),
        ])->defaultSort('urutan', 'asc')->reorderable('urutan')
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisis::route('/'),
        ];
    }
}