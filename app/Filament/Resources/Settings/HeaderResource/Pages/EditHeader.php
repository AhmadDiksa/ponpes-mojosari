<?php

namespace App\Filament\Resources\Settings\HeaderResource\Pages;

use App\Filament\Resources\Settings\HeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeader extends EditRecord
{
    protected static string $resource = HeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
