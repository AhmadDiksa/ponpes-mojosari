<?php

namespace App\Filament\Resources\ProgramPendidikanResource\Pages;

use App\Filament\Resources\ProgramPendidikanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgramPendidikan extends EditRecord
{
    protected static string $resource = ProgramPendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
