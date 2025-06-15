<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PpdbInfoResource\Pages;
use App\Models\PpdbInfo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

// Import komponen
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class PpdbInfoResource extends Resource
{
    protected static ?string $model = PpdbInfo::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Info PPDB';
    protected static ?string $modelLabel = 'Info PPDB';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('kategori')
                    ->options([
                        'ketentuan_umum' => 'Ketentuan Umum',
                        'syarat_pendaftaran' => 'Syarat Pendaftaran',
                        'ketentuan_khusus' => 'Perlengkapan (Ketentuan Khusus)',
                        'biaya' => 'Biaya',
                    ])
                    ->required()
                    ->reactive(), // Membuat form reaktif terhadap perubahan field ini
                
                TextInput::make('judul')
                    ->label('Judul/Nama Item')
                    ->required(),
                
                Textarea::make('deskripsi')
                    ->label('Deskripsi Tambahan (Opsional)')
                    ->helperText("Untuk Perlengkapan, pisahkan item dengan titik koma (;). Contoh: Baju ganti; Celana panjang; Ikat jilbab"),

                TextInput::make('nilai')
                    ->label('Nilai (untuk biaya)')
                    ->numeric()
                    ->prefix('Rp')
                    // Hanya tampilkan field ini jika kategori adalah 'biaya'
                    ->visible(fn (callable $get) => $get('kategori') === 'biaya'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kategori')
                    ->badge(),
                TextColumn::make('judul')
                    ->searchable(),
                TextColumn::make('nilai')
                    ->label('Nilai')
                    ->money('IDR')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'ketentuan_umum' => 'Ketentuan Umum',
                        'syarat_pendaftaran' => 'Syarat Pendaftaran',
                        'ketentuan_khusus' => 'Perlengkapan (Ketentuan Khusus)',
                        'biaya' => 'Biaya',
                    ]),
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
            'index' => Pages\ListPpdbInfos::route('/'),
            'create' => Pages\CreatePpdbInfo::route('/create'),
            'edit' => Pages\EditPpdbInfo::route('/{record}/edit'),
        ];
    }    
}