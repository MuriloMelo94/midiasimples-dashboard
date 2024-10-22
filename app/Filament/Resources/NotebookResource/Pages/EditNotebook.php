<?php

namespace App\Filament\Resources\NotebookResource\Pages;

use App\Filament\Resources\NotebookResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNotebook extends EditRecord
{
    protected static string $resource = NotebookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
