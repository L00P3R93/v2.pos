<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Dashboard;
use App\Filament\Widgets\CustomersChart;
use App\Filament\Widgets\LatestOrdersTable;
use App\Filament\Widgets\OrdersChart;
use App\Filament\Widgets\OrderStatsOverview;
use App\Filament\Widgets\PaymentMethodsChart;
use App\Filament\Widgets\ProductStatsOverview;
use App\Filament\Widgets\RevenueStatsOverview;
use App\Filament\Widgets\TopSellingProductsTable;
use App\Http\Middleware\FilamentAuthenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use LaraZeus\SpatieTranslatable\SpatieTranslatablePlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(null)
            ->colors([
                'primary' => Color::Amber,
                'secondary' => Color::Gray,
                'success' => Color::Green,
                'warning' => Color::Orange,
                'danger' => Color::Red,
                'info' => Color::Blue,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->discoverClusters(in: app_path('Filament/Clusters'), for: 'App\Filament\Clusters')
            ->pages([
                Dashboard::class,
            ])
            // ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                RevenueStatsOverview::class,
                ProductStatsOverview::class,
                OrderStatsOverview::class,
                CustomersChart::class,
                OrdersChart::class,
                PaymentMethodsChart::class,
                LatestOrdersTable::class,
                TopSellingProductsTable::class,
            ])
            ->navigationGroups([
                'Dashboard',
                'Products',
                'Shop',
                'User Management',
                'System Management',
            ])
            ->navigationItems([
                NavigationItem::make('Back to POS')
                    ->url('/home')
                    ->icon(Heroicon::OutlinedShoppingCart)
                    ->sort(-1)
                    ->openUrlInNewTab(),
                NavigationItem::make('System Logs')
                    ->url('/log-viewer')
                    ->icon(Heroicon::OutlinedDocumentText)
                    ->group('System Management')
                    ->sort(50)
                    ->visible(fn () => auth()->user()?->isSuperAdmin()),
            ])
            ->unsavedChangesAlerts()
            ->databaseNotifications()
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
                FilamentAuthenticate::class,
            ])->plugin(
                SpatieTranslatablePlugin::make()->defaultLocales(['en', 'es', 'nl'])
            )->spa();
    }
}
