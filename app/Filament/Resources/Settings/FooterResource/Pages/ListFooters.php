<?php

namespace App\Filament\Resources\Settings\FooterResource\Pages;

use App\Filament\Resources\Settings\FooterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFooters extends ListRecords
{
    protected static string $resource = FooterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
