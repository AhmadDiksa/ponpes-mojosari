<?php

namespace App\Filament\Resources\BeritaImageResource\Pages;

use App\Filament\Resources\BeritaImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBeritaImages extends ListRecords
{
    protected static string $resource = BeritaImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
