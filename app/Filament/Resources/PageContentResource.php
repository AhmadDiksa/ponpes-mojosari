<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageContentResource\Pages;
use App\Models\PageContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

// Import semua komponen Form dan Table yang kita butuhkan
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;

class PageContentResource extends Resource
{
    protected static ?string $model = PageContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Konten Halaman Statis';
    protected static ?string $modelLabel = 'Konten Halaman';
    protected static ?string $pluralModelLabel = 'Konten Halaman Statis';
    protected static ?int $navigationSort = 4; // Mengatur urutan di sidebar navigasi

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('section_name')
                    ->label('Bagian Halaman')
                    ->options([
                        'visi' => 'Visi',
                        'misi' => 'Misi',
                        'larangan' => 'Tata Tertib & Larangan',
                        'sejarah' => 'Sejarah',
                    ])
                    ->required()
                    // Mencegah duplikasi section (hanya boleh ada 1 Visi, 1 Misi, dst)
                    ->unique(ignoreRecord: true)
                    // Membuat form reaktif terhadap perubahan field ini
                    ->reactive(),

                // Gunakan Repeater untuk Visi, Misi, Larangan
                Repeater::make('content')
                    ->label('Daftar Konten')
                    ->schema([
                        TextInput::make('item')
                            ->label('Item Teks')
                            ->required(),
                    ])
                    ->addActionLabel('Tambah Item')
                    // Fungsi ini dijalankan SEBELUM data disimpan ke DB
                    ->mutateDehydratedStateUsing(function ($state): ?string {
                        if (empty($state)) {
                            return null;
                        }
                        // Mengubah array of arrays menjadi array of strings
                        // Dari: [['item' => 'Teks 1'], ['item' => 'Teks 2']]
                        // Menjadi: ['Teks 1', 'Teks 2'] -> lalu di-encode ke JSON
                        $items = array_column($state, 'item');
                        return json_encode($items);
                    })
                    // Fungsi ini dijalankan SAAT data dimuat dari DB ke form
                    ->mutateLoadedStateUsing(function (?string $state): array {
                        if (empty($state)) {
                            return [];
                        }
                        // Mengubah JSON string dari DB menjadi format yang dimengerti Repeater
                        // Dari: '["Teks 1", "Teks 2"]'
                        // Menjadi: [['item' => 'Teks 1'], ['item' => 'Teks 2']]
                        $items = json_decode($state, true) ?: []; // Handle jika json_decode gagal
                        return array_map(fn ($item) => ['item' => $item], $items);
                    })
                    // Tampilkan field ini HANYA jika 'section_name' adalah visi, misi, atau larangan
                    ->visible(fn (callable $get) => in_array($get('section_name'), ['visi', 'misi', 'larangan'])),

                // Gunakan RichEditor untuk Sejarah
                RichEditor::make('content')
                    ->label('Konten Sejarah')
                    ->required()
                    ->columnSpanFull() // Mengambil lebar penuh
                    // Tampilkan field ini HANYA jika 'section_name' adalah 'sejarah'
                    ->visible(fn (callable $get) => $get('section_name') === 'sejarah'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('section_name')
                    ->label('Bagian Halaman')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'visi' => 'Visi',
                        'misi' => 'Misi',
                        'larangan' => 'Tata Tertib & Larangan',
                        'sejarah' => 'Sejarah',
                        default => $state,
                    })
                    ->searchable(),
                
                TextColumn::make('content')
                    ->label('Ringkasan Konten')
                    ->limit(70)
                    ->formatStateUsing(function (string $state): string {
                        // Cek apakah konten adalah JSON atau HTML biasa
                        $decoded = json_decode($state);
                        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                            // Jika JSON, gabungkan item pertama
                            return count($decoded) . ' item (Contoh: ' . ($decoded[0] ?? '') . '...)';
                        }
                        // Jika bukan JSON (HTML dari RichEditor), strip tags dan tampilkan
                        return strip_tags($state);
                    }),

                TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Bulk actions dinonaktifkan karena setiap section unik
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListPageContents::route('/'),
            'create' => Pages\CreatePageContent::route('/create'),
            'edit' => Pages\EditPageContent::route('/{record}/edit'),
        ];
    }    
}