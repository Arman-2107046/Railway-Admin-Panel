<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\News;
use App\Models\Contact;
use App\Models\Newsletter;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardOverview extends BaseWidget
{
    // Make this non-static to avoid PHP 8.2 redeclaration error
    protected ?string $heading = 'Overview';

    protected function getStats(): array
    {
        return [
            Stat::make('Total Products', Product::count()),
            Stat::make('Total Blogs', News::count()),
            Stat::make('Contacts', Contact::count()),
            Stat::make('Newsletter Subscribers', Newsletter::count()),
        ];
    }
}
