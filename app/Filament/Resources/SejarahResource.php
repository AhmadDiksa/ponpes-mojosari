<?php
namespace App\Filament\Resources;
use App\Filament\Resources\SejarahResource\Pages;
use App\Models\ProfilKonten; // <-- Gunakan model baru
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class SejarahResource extends Resource
{
    protected static ?string $model = ProfilKonten::class; // <-- Arahkan ke model baru
    protected static ?string $modelLabel = 'Paragraf Sejarah';
    protected static ?string $pluralModelLabel = 'Sejarah';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Profil';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('kategori', 'sejarah');
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Hidden::make('kategori')->default('sejarah'),
            Forms\Components\RichEditor::make('konten')
                ->label('Isi Paragraf/Bagian Sejarah')
                ->required()->columnSpanFull(),
            Forms\Components\TextInput::make('urutan')->numeric()->default(0),
        ]);
    }
    
    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('konten')->html()->limit(100),
            Tables\Columns\TextColumn::make('urutan')->sortable(),
        ])->defaultSort('urutan', 'asc')->reorderable('urutan')
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSejarahs::route('/'),
            'create' => Pages\CreateSejarah::route('/create'),
            'edit' => Pages\EditSejarah::route('/{record}/edit'),
        ];
    }
}