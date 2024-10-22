<?php

namespace App\Filament\Resources\NotebookResource\Pages;

use App\Filament\Resources\NotebookResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNotebooks extends ListRecords
{
    protected static string $resource = NotebookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
