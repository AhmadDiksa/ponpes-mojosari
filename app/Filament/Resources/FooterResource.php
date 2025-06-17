<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterResource\Pages;
use App\Filament\Resources\FooterResource\RelationManagers;
use App\Models\Footer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FooterResource extends Resource
{
    protected static ?string $model = Footer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('address')
                    ->label('Alamat')
                    ->rows(2),
                Forms\Components\TextInput::make('phone')
                    ->label('Telepon'),
                Forms\Components\Repeater::make('socials')
                    ->label('Sosial Media Tambahan')
                    ->schema([
                        Forms\Components\TextInput::make('name')->label('Nama')->required(),
                        Forms\Components\TextInput::make('url')->label('Link')->required(),
                        Forms\Components\Select::make('icon')->label('Icon')->options([
                            'instagram' => 'Instagram',
                            'twitter' => 'Twitter',
                            'youtube' => 'YouTube',
                            'tiktok' => 'TikTok',
                            'linkedin' => 'LinkedIn',
                        ])->searchable(),
                    ])
                    ->default([])
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('wa_label')
                    ->label('Label WhatsApp')
                    ->default(fn($record) => $record?->wa_label ?? 'WhatsApp'),
                Forms\Components\TextInput::make('wa_url')
                    ->label('Link WhatsApp')
                    ->default(fn($record) => $record?->wa_url ?? 'https://wa.me/6285855062194'),
                Forms\Components\TextInput::make('fb_label')
                    ->label('Label Facebook')
                    ->default(fn($record) => $record?->fb_label ?? 'Facebook'),
                Forms\Components\TextInput::make('fb_url')
                    ->label('Link Facebook')
                    ->default(fn($record) => $record?->fb_url ?? 'https://www.facebook.com/p/PP-Mojosari-Nganjuk-100064524231073/'),
                Forms\Components\TextInput::make('copyright')
                    ->label('Copyright'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('address')->label('Alamat')->limit(30),
                Tables\Columns\TextColumn::make('phone')->label('Telepon'),
                Tables\Columns\TextColumn::make('wa_label')->label('WA'),
                Tables\Columns\TextColumn::make('fb_label')->label('FB'),
                Tables\Columns\TextColumn::make('socials')
                    ->label('Sosial Media Tambahan')
                    ->formatStateUsing(fn($state) => collect($state)->pluck('name')->join(', ')),
                Tables\Columns\TextColumn::make('copyright')->label('Copyright'),
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
            'index' => Pages\ListFooters::route('/'),
            'create' => Pages\CreateFooter::route('/create'),
            'view' => Pages\ViewFooter::route('/{record}'),
            'edit' => Pages\EditFooter::route('/{record}/edit'),
        ];
    }
}
