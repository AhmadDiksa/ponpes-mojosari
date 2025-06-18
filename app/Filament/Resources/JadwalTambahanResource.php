<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalTambahanResource\Pages;
use App\Models\JadwalKegiatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

// ... import lain ...

class JadwalTambahanResource extends Resource
{
    protected static ?string $model = JadwalKegiatan::class;

    // Konfigurasi Navigasi
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $modelLabel = 'Kegiatan Tambahan';
    protected static ?string $pluralModelLabel = 'Kegiatan Tambahan';
    protected static ?string $navigationGroup = 'Jadwal Kegiatan'; // Masukkan ke grup yang sama
    protected static ?int $navigationSort = 2;

    // FUNGSI KUNCI: Filter data secara global untuk resource ini
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('tipe', 'tambahan');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('waktu')->required(),
                Forms\Components\TextInput::make('kegiatan')->required(),
                // Sembunyikan field 'tipe' dan isi otomatis
                Forms\Components\Hidden::make('tipe')->default('tambahan'),
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
            'index' => Pages\ListJadwalTambahans::route('/'),
            'create' => Pages\CreateJadwalTambahan::route('/create'),
            'edit' => Pages\EditJadwalTambahan::route('/{record}/edit'),
        ];
    }
}