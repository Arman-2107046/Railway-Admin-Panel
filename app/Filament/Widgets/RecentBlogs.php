<?php

namespace App\Filament\Widgets;

use App\Models\News;
use Filament\Widgets\TableWidget;
use Filament\Tables;

class RecentBlogs extends TableWidget
{
    // Static heading
    protected static ?string $heading = 'Recent Blogs';

    // Full width widget
    protected int|string|array $columnSpan = 'full';

    // Query for the table
    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return News::query()->latest();
    }

    // Table columns
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('title')->label('Title')->limit(40),
            Tables\Columns\TextColumn::make('published_at')->label('Published At')->date(),
            Tables\Columns\TextColumn::make('type')->label('Status')->limit(15),
        ];
    }

    // Table filters
    protected function getTableFilters(): array
    {
        return [];
    }

    // Table row actions
    protected function getTableActions(): array
    {
        return [];
    }

    // Table bulk actions
    protected function getTableBulkActions(): array
    {
        return [];
    }
}
