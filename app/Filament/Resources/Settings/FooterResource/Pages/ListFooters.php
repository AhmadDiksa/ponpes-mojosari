<?php

namespace App\Filament\Resources\Settings\FooterResource\Pages;

use App\Filament\Resources\Settings\FooterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\Footer;

class ListFooters extends ListRecords
{
    protected static string $resource = FooterResource::class;

    protected function getHeaderActions(): array
    {
        // Hide CreateAction if a Footer already exists
        if (Footer::count() > 0) {
            return [];
        }
        return [
            Actions\CreateAction::make(),
        ];
    }
}
