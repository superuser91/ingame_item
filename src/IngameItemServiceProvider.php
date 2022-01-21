<?php

namespace Vgplay\IngameItem;

use Illuminate\Support\ServiceProvider;

class IngameItemServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/vgp_ingame_item.php', 'vgp_ingame_item');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'vgp_ingame_item');
    }
}
