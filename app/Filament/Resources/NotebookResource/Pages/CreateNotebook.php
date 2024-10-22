<?php

namespace App\Filament\Resources\NotebookResource\Pages;

use App\Filament\Resources\NotebookResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNotebook extends CreateRecord
{
    protected static string $resource = NotebookResource::class;
}
