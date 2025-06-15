<?php

namespace App\Filament\Resources\ProgramPendidikanResource\Pages;

use App\Filament\Resources\ProgramPendidikanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProgramPendidikans extends ListRecords
{
    protected static string $resource = ProgramPendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
