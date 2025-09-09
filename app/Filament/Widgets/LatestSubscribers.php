<?php

namespace App\Filament\Widgets;

use App\Models\Newsletter;
use Filament\Widgets\TableWidget;
use Filament\Tables;

class LatestSubscribers extends TableWidget
{
    // Must be static
    protected static ?string $heading = 'Latest Subscribers';

    // Full width widget
    protected int|string|array $columnSpan = 'full';

    // Correct signature: returns a Builder
    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return Newsletter::query()->latest();
    }

    // Columns
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('email')->label('Email')->limit(40),
            Tables\Columns\TextColumn::make('created_at')->label('Subscribed At')->dateTime(),
        ];
    }

    // Filters
    protected function getTableFilters(): array
    {
        return [];
    }

    // Row actions
    protected function getTableActions(): array
    {
        return [];
    }

    // Bulk actions
    protected function getTableBulkActions(): array
    {
        return [];
    }
}
