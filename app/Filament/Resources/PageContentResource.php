<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageContentResource\Pages;
use App\Models\PageContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

// Import komponen form yang akan kita gunakan
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;

class PageContentResource extends Resource
{
    protected static ?string $model = PageContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Konten Halaman';
    protected static ?string $modelLabel = 'Konten Halaman';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('section_name')
                    ->label('Bagian Halaman')
                    ->options([
                        'visi' => 'Visi',
                        'misi' => 'Misi',
                        'larangan' => 'Larangan',
                    ])
                    ->required()
                    // Mencegah duplikasi section (hanya boleh ada 1 Visi, 1 Misi, dst)
                    ->unique(ignoreRecord: true),

                // Repeater adalah komponen terbaik untuk list dinamis
                Repeater::make('content')
                    ->label('Daftar Konten')
                    ->schema([
                        TextInput::make('item')
                            ->label('Item Teks')
                            ->required(),
                    ])
                    ->addActionLabel('Tambah Item')
                    // Kita perlu mengubah format data agar sesuai dengan model kita
                    ->mutateDehydratedStateUsing(function ($state): string {
                        // Mengubah array of arrays menjadi array of strings
                        // Dari: [['item' => 'Teks 1'], ['item' => 'Teks 2']]
                        // Menjadi: ['Teks 1', 'Teks 2'] -> lalu di-encode ke JSON
                        $items = array_column($state, 'item');
                        return json_encode($items);
                    })
                    ->mutateStateUsing(function (?string $state): array {
                        // Mengubah JSON string dari DB menjadi format yang dimengerti Repeater
                        if (empty($state)) {
                            return [];
                        }
                        // Dari: '["Teks 1", "Teks 2"]'
                        // Menjadi: [['item' => 'Teks 1'], ['item' => 'Teks 2']]
                        $items = json_decode($state, true);
                        return array_map(fn ($item) => ['item' => $item], $items);
                    })
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section_name')
                    ->label('Bagian Halaman')
                    ->badge() // Membuatnya terlihat seperti badge/label
                    ->searchable(),
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
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageContents::route('/'),
            'create' => Pages\CreatePageContent::route('/create'),
            'edit' => Pages\EditPageContent::route('/{record}/edit'),
        ];
    }    
}