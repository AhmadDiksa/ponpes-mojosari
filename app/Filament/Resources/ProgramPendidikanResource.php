<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramPendidikanResource\Pages;
use App\Models\ProgramPendidikan;
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

class ProgramPendidikanResource extends Resource
{
    protected static ?string $model = ProgramPendidikan::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Program & Pendidikan';
    protected static ?string $modelLabel = 'Program & Pendidikan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('kategori')
                    ->options([
                        'program_pesantren' => 'Program Unggulan Pesantren',
                        'pendidikan_formal' => 'Pendidikan Formal',
                        'ekstrakulikuler' => 'Ekstrakurikuler',
                    ])
                    ->required(),
                TextInput::make('nama')
                    ->label('Nama Program/Pendidikan')
                    ->required(),
                Textarea::make('deskripsi')
                    ->label('Deskripsi Singkat (Opsional)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kategori')
                    ->badge(),
                TextColumn::make('nama')
                    ->label('Nama Program')
                    ->searchable(),
                TextColumn::make('deskripsi')
                    ->limit(50), // Batasi deskripsi agar tabel tidak terlalu lebar
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'program_pesantren' => 'Program Unggulan Pesantren',
                        'pendidikan_formal' => 'Pendidikan Formal',
                        'ekstrakulikuler' => 'Ekstrakurikuler',
                    ]),
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
            'index' => Pages\ListProgramPendidikans::route('/'),
            'create' => Pages\CreateProgramPendidikan::route('/create'),
            'edit' => Pages\EditProgramPendidikan::route('/{record}/edit'),
        ];
    }    
}