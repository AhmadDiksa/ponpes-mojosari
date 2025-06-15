<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalKegiatanResource\Pages;
use App\Models\JadwalKegiatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

// Import komponen
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class JadwalKegiatanResource extends Resource
{
    protected static ?string $model = JadwalKegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationLabel = 'Jadwal Kegiatan';
    protected static ?string $modelLabel = 'Jadwal Kegiatan';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('waktu')
                    ->label('Waktu')
                    ->placeholder('Contoh: 03.00 atau 07.00 - 12.30')
                    ->required(),
                TextInput::make('kegiatan')
                    ->label('Nama Kegiatan')
                    ->required(),
                Select::make('tipe')
                    ->label('Tipe Jadwal')
                    ->options([
                        'harian' => 'Harian',
                        'tambahan' => 'Tambahan',
                    ])
                    ->required(),
                TextInput::make('urutan')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0)
                    ->helperText('Angka lebih kecil akan tampil lebih dulu.')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // Mengurutkan jadwal berdasarkan kolom 'urutan' secara default
            ->defaultSort('urutan', 'asc')
            ->columns([
                TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable(),
                TextColumn::make('waktu')
                    ->label('Waktu')
                    ->searchable(),
                TextColumn::make('kegiatan')
                    ->label('Nama Kegiatan')
                    ->searchable(),
                TextColumn::make('tipe')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'harian' => 'success',
                        'tambahan' => 'warning',
                    })
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJadwalKegiatans::route('/'),
            'create' => Pages\CreateJadwalKegiatan::route('/create'),
            'edit' => Pages\EditJadwalKegiatan::route('/{record}/edit'),
        ];
    }    
}