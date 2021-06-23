<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function register() {
        foreach (scandir(app_path('Modules')) as $module) {
            if ($module != '.' && $module != '..') {
                $this->app->register("EternalVoid\\$module\ServiceProvider");
            }
        }
    }
}
