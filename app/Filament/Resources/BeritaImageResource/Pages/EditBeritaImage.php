<?php

namespace App\Filament\Resources\BeritaImageResource\Pages;

use App\Filament\Resources\BeritaImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBeritaImage extends EditRecord
{
    protected static string $resource = BeritaImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
