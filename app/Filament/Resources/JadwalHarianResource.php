<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalHarianResource\Pages;
use App\Models\JadwalKegiatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

// ... import lain ...

class JadwalHarianResource extends Resource
{
    protected static ?string $model = JadwalKegiatan::class;

    // Konfigurasi Navigasi
    protected static ?string $navigationIcon = 'heroicon-o-sun';
    protected static ?string $modelLabel = 'Kegiatan Harian';
    protected static ?string $pluralModelLabel = 'Kegiatan Harian';
    protected static ?string $navigationGroup = 'Jadwal Kegiatan'; // Masukkan ke dalam grup
    protected static ?int $navigationSort = 1;

    // FUNGSI KUNCI: Filter data secara global untuk resource ini
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('tipe', 'harian');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('waktu')->required(),
                Forms\Components\TextInput::make('kegiatan')->required(),
                // Sembunyikan field 'tipe' dan isi otomatis
                Forms\Components\Hidden::make('tipe')->default('harian'),
                Forms\Components\TextInput::make('urutan')->numeric()->default(0)->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('urutan', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('urutan')->sortable(),
                Tables\Columns\TextColumn::make('waktu')->searchable(),
                Tables\Columns\TextColumn::make('kegiatan')->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
            // ... sisa konfigurasi table
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJadwalHarians::route('/'),
            'create' => Pages\CreateJadwalHarian::route('/create'),
            'edit' => Pages\EditJadwalHarian::route('/{record}/edit'),
        ];
    }
}