<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

// Import komponen
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $modelLabel = 'Berita & Artikel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Konten Utama')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(Berita::class, 'slug', ignoreRecord: true),

                        // RichEditor dengan tombol gambar yang dinonaktifkan
                        RichEditor::make('content')
                            ->label('Isi Berita')
                            ->required()
                            ->columnSpanFull()
                            ->disableToolbarButtons([
                                'attachFiles',
                                'image',
                            ]),
                    ])->columns(2),

                Section::make('Metadata')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Gambar Utama (Thumbnail)')
                            ->image()
                            ->directory('berita-thumbnails')
                            ->imageEditor(),
                        
                        DateTimePicker::make('published_at')
                            ->label('Tanggal Publikasi')
                            ->default(now()),

                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                            ])
                            ->default('draft')
                            ->required(),
                        
                        Select::make('user_id')
                            ->label('Penulis')
                            ->relationship('author', 'name')
                            ->searchable()
                            ->default(auth()->id())
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail'),
                TextColumn::make('title')->label('Judul')->searchable()->limit(50),
                TextColumn::make('author.name')->label('Penulis')->sortable(),
                TextColumn::make('status')->badge()->color(fn(string $state) => match ($state) {
                    'draft' => 'gray',
                    'published' => 'success',
                }),
                TextColumn::make('published_at')->label('Dipublikasikan pada')->date()->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
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
            ])
            ->defaultSort('published_at', 'desc');
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }    
}