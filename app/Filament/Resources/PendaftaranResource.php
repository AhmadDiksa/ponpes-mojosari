<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftaranResource\Pages;
use App\Models\Pendaftaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

// Import semua komponen yang dibutuhkan
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\Action; // Untuk aksi kustom (Download PDF)
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction; // Untuk ekspor item terpilih
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction; // Untuk tombol ekspor di header

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationLabel = 'Data Pendaftar';
    protected static ?string $modelLabel = 'Pendaftar';
    protected static ?string $navigationGroup = 'PPDB';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Pendaftaran')->schema([
                    TextInput::make('no_pendaftaran')->label('No. Pendaftaran')->disabled()->dehydrated(),
                    TextInput::make('tahun_pendaftaran')->label('Tahun')->disabled()->dehydrated(),
                    Select::make('status')->options(['pending' => 'Pending', 'verified' => 'Terverifikasi', 'rejected' => 'Ditolak',])->required(),
                ])->columns(3),

                Section::make('Data Calon Santri')->schema([
                    TextInput::make('nama_santri')->required(),
                    TextInput::make('tempat_lahir')->required(),
                    DatePicker::make('tgl_lahir')->label('Tanggal Lahir')->required(),
                    Textarea::make('alamat_rumah')->label('Alamat')->required()->columnSpanFull(),
                ])->columns(2),

                Section::make('Data Orang Tua / Wali')->schema([
                    TextInput::make('nama_ayah')->required(),
                    TextInput::make('pekerjaan_ayah')->required(),
                    TextInput::make('nama_ibu')->required(),
                    TextInput::make('pekerjaan_ibu')->required(),
                    TextInput::make('nomor_telepon')->label('No. Telepon')->required(),
                ])->columns(2),

                Section::make('Data Internal Pondok (Diisi Admin)')->schema([
                    TextInput::make('no_induk')->label('No. Induk Santri'),
                    DatePicker::make('tanggal_masuk_pondok')->label('Tanggal Masuk'),
                    TextInput::make('kelas'),
                    TextInput::make('kamar'),
                    Textarea::make('keterangan')->columnSpanFull(),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('no_pendaftaran')
                    ->label('No. Daftar')
                    ->formatStateUsing(fn (Pendaftaran $record): string => 
                        $record->tahun_pendaftaran . '-' . str_pad($record->no_pendaftaran, 4, '0', STR_PAD_LEFT)
                    )
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('no_pendaftaran', 'like', "%{$search}%")
                                     ->orWhere('tahun_pendaftaran', 'like', "%{$search}%");
                    })
                    ->sortable(),
                
                TextColumn::make('nama_santri')->label('Nama Santri')->searchable()->sortable(),
                TextColumn::make('status')->badge()->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning', 'verified' => 'success', 'rejected' => 'danger',
                }),
                TextColumn::make('nomor_telepon')->label('No. Telepon Wali')->searchable(),
                TextColumn::make('created_at')->label('Tanggal Mendaftar')->dateTime('d M Y, H:i')->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('tahun_pendaftaran')
                    ->label('Filter Tahun')
                    ->options(fn (): array => Pendaftaran::query()->select('tahun_pendaftaran')->distinct()->orderBy('tahun_pendaftaran', 'desc')->pluck('tahun_pendaftaran', 'tahun_pendaftaran')->toArray()),
                SelectFilter::make('status')->options(['pending' => 'Pending', 'verified' => 'Terverifikasi', 'rejected' => 'Ditolak']),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Action::make('download_pdf')
                    ->label('PDF')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('info')
                    ->url(fn (Pendaftaran $record): string => route('ppdb.download', $record))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                ExportBulkAction::make()->label('Ekspor ke Excel (Terpilih)'),
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->headerActions([
                Action::make('export')
                    ->label('Download Semua Data (Excel)')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(route('export-pendaftaran'))
                    ->openUrlInNewTab(),
            ])
            ->defaultSort('created_at', 'desc');
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPendaftarans::route('/'),
            'create' => Pages\CreatePendaftaran::route('/create'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
        ];
    }    
}