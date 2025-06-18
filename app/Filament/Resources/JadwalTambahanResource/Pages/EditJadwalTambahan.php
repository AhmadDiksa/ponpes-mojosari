<?php

namespace App\Filament\Resources\JadwalTambahanResource\Pages;

use App\Filament\Resources\JadwalTambahanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJadwalTambahan extends EditRecord
{
    protected static string $resource = JadwalTambahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
