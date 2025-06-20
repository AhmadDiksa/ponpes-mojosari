<?php

namespace App\Filament\Resources\Settings\HeaderResource\Pages;

use App\Filament\Resources\Settings\HeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\Header;

class ListHeaders extends ListRecords
{
    protected static string $resource = HeaderResource::class;

    protected function getHeaderActions(): array
    {
        // Hide CreateAction if a Header already exists
        if (Header::count() > 0) {
            return [];
        }
        return [
            Actions\CreateAction::make(),
        ];
    }
}
