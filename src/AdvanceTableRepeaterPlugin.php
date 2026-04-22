<?php

namespace Webkul\AdvanceTableRepeater;

use Filament\Contracts\Plugin;
use Filament\Panel;

class AdvanceTableRepeaterPlugin implements Plugin
{
    public function getId(): string
    {
        return 'advance-table-repeater';
    }

    public function register(Panel $panel): void
    {
        //
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        try {
            /** @var static $plugin */
            $plugin = filament(app(static::class)->getId());

            return $plugin;
        } catch (\Throwable) {
            return app(static::class);
        }
    }
}
