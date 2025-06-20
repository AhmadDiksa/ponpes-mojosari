<?php

namespace App\Filament\Resources\LaranganResource\Pages;

use App\Filament\Resources\LaranganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLarangans extends ListRecords
{
    protected static string $resource = LaranganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
