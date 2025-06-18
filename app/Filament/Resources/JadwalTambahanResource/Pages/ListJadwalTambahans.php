<?php

namespace App\Filament\Resources\JadwalTambahanResource\Pages;

use App\Filament\Resources\JadwalTambahanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJadwalTambahans extends ListRecords
{
    protected static string $resource = JadwalTambahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
