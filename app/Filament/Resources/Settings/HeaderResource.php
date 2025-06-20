<?php

namespace App\Filament\Resources\Settings;

use App\Filament\Resources\Settings\HeaderResource\Pages;
use App\Filament\Resources\Settings\HeaderResource\RelationManagers;
use App\Models\Header;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeaderResource extends Resource
{
    protected static ?string $model = Header::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationGroup = 'Settings';
    
    protected static ?string $navigationLabel = 'Header';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->directory('header-logos')
                    ->nullable(),
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->required(),
                Forms\Components\Repeater::make('menus')
                    ->label('Menu Navigasi')
                    ->schema([
                        Forms\Components\TextInput::make('label')->label('Label')->required(),
                        Forms\Components\TextInput::make('url')->label('Link')->nullable()
                            ->placeholder('/profil atau https://google.com')
                            ->hint('Isi dengan endpoint (misal: /profil) atau link penuh (misal: https://google.com)'),
                        Forms\Components\Repeater::make('sub_menus')
                            ->label('Sub Menu (Dropdown)')
                            ->schema([
                                Forms\Components\TextInput::make('label')->label('Label')->required(),
                                Forms\Components\TextInput::make('url')->label('Link')->required()
                                    ->placeholder('/profil atau https://google.com')
                                    ->hint('Isi dengan endpoint (misal: /profil) atau link penuh (misal: https://google.com)'),
                            ])
                            ->default([])
                            ->columnSpanFull(),
                    ])
                    ->default([])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')->label('Logo'),
                Tables\Columns\TextColumn::make('title')->label('Judul'),
                Tables\Columns\TextColumn::make('menus')
                    ->label('Menu Navigasi')
                    ->formatStateUsing(fn($state) => collect($state)->pluck('label')->join(', ')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListHeaders::route('/'),
            'create' => Pages\CreateHeader::route('/create'),
            'view' => Pages\ViewHeader::route('/{record}'),
            'edit' => Pages\EditHeader::route('/{record}/edit'),
        ];
    }
}
