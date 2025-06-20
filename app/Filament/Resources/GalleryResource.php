<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

// Import semua komponen yang dibutuhkan
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $modelLabel = 'Foto Galeri';
    protected static ?string $pluralModelLabel = 'Foto Galeri';

    // Mengelompokkan menu Galeri & Album menjadi satu grup
    protected static ?string $navigationGroup = 'Galeri';
    protected static ?int $navigationSort = 2; // Urutan di bawah Album

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Foto')
                    ->schema([
                        Select::make('album_id')
                            ->label('Pilih Album')
                            ->relationship('album', 'title') // Mengambil data dari relasi 'album' dan menampilkan 'title'
                            ->searchable()
                            ->preload() // Memuat opsi saat halaman dibuka
                            ->required()
                            ->helperText('Foto harus dimasukkan ke dalam sebuah album.'),

                        FileUpload::make('image_path')
                            ->label('Upload Foto')
                            ->required()
                            ->directory('../gallery-photos') // Menyimpan file di 'storage/app/gallery-photos'
                            ->image() // Validasi dasar untuk gambar
                            ->imageEditor() // Aktifkan editor gambar (crop, rotate, dll)
                            ->maxSize(2048) // Batas ukuran file 2MB
                            ->validationMessages([
                                'maxSize' => 'Ukuran file tidak boleh lebih dari 2MB.',
                            ]),

                        TextInput::make('title')
                            ->label('Judul Foto')
                            ->required()
                            ->maxLength(255),
                        
                        Textarea::make('description')
                            ->label('Deskripsi (Opsional)')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Gambar')
                    ->width(120)
                    ->height('auto')
                    ->square(), // Membuat thumbnail berbentuk persegi

                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->wrap(), // Membungkus teks jika terlalu panjang
                
                TextColumn::make('album.title')
                    ->label('Album')
                    ->searchable()
                    ->sortable()
                    ->badge(),

                TextColumn::make('created_at')
                    ->label('Tanggal Upload')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('album_id')
                    ->label('Filter Berdasarkan Album')
                    ->relationship('album', 'title') // Menggunakan relasi untuk filter
                    ->searchable()
                    ->preload(),
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }    
}