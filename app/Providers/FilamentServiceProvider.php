<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            // Filament::registerFooterView('filament.footer'); // points to resources/views/filament/footer.blade.php
        });
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
