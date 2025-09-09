<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

// Import your custom dashboard widgets
use App\Filament\Widgets\DashboardOverview;
use App\Filament\Widgets\LatestContacts;
use App\Filament\Widgets\RecentBlogs;
use App\Filament\Widgets\LatestSubscribers;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin') // Admin panel URL
            ->login() // Default login page
            ->favicon('/images/small-logo.png')
            ->brandName('Admin Panel')
            ->colors([
                'primary' => Color::Blue, // Primary color theme
            ])
            // Auto-discover your resources in Filament
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            // Auto-discover your custom pages
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class, // The main dashboard page
            ])
            // Auto-discover widgets (optional)
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Default Filament widgets
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,

                // Our custom dashboard widgets
                DashboardOverview::class,     // Shows counts of Products, Blogs, Contacts, Subscribers
                LatestContacts::class,        // Shows latest 5 contacts
                RecentBlogs::class,           // Shows latest 5 blogs
                LatestSubscribers::class,     // Shows latest newsletter subscribers
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
