<?php

namespace Webkul\AdvanceTableRepeater;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AdvanceTableRepeaterServiceProvider extends PackageServiceProvider
{
    public static string $name = 'advance-table-repeater';

    public static string $viewNamespace = 'advance-table-repeater';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasViews(static::$viewNamespace);
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Css::make('advance-table-repeater', __DIR__.'/../resources/dist/advance-table-repeater.css'),
        ], 'aureuserp/advance-table-repeater');

        Blade::anonymousComponentPath(
            __DIR__.'/../resources/views/components',
            'advance-table-repeater'
        );
    }
}
