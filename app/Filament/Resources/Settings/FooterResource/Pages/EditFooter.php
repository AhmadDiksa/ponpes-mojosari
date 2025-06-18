<?php

namespace App\Filament\Resources\Settings\FooterResource\Pages;

use App\Filament\Resources\Settings\FooterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFooter extends EditRecord
{
    protected static string $resource = FooterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
