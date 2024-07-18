<?php

namespace App\Filament\Resources\UserpenggunaResource\Pages;

use App\Filament\Resources\UserpenggunaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserpenggunas extends ListRecords
{
    protected static string $resource = UserpenggunaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}