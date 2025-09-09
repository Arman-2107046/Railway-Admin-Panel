<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use Filament\Resources\Pages\ListRecords;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;

    // No create/edit actions since submissions come from frontend
    protected function getHeaderActions(): array
    {
        return [];
    }
}
