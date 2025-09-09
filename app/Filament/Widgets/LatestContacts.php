<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Widgets\TableWidget;
use Filament\Tables;

class LatestContacts extends TableWidget
{
    // Must be static
    protected static ?string $heading = 'Latest Contacts';

    protected int|string|array $columnSpan = 'full';

    // Correct signature: returns a Builder
    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return Contact::query()->latest();
    }

    // Columns
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('user_name')->label('Name')->limit(20),
            Tables\Columns\TextColumn::make('user_email')->label('Email')->limit(30),
            Tables\Columns\TextColumn::make('subject')->label('Subject')->limit(30),
            Tables\Columns\TextColumn::make('created_at')->label('Date')->dateTime(),
        ];
    }

    // Filters (empty)
    protected function getTableFilters(): array
    {
        return [];
    }

    // Row actions (empty)
    protected function getTableActions(): array
    {
        return [];
    }

    // Bulk actions (empty)
    protected function getTableBulkActions(): array
    {
        return [];
    }
}
