<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        // Check if table exists before querying
        $generalSetting = null;
        
        if (Schema::hasTable('general_settings')) {
            try {
                $generalSetting = GeneralSetting::first();
            } catch (\Exception $e) {
                // Handle any other database errors silently
            }
        }
        
        // Set Timezone default (with fallback)
        if ($generalSetting && $generalSetting->time_zone) {
            Config::set('app.timezone', $generalSetting->time_zone);
        }
        
        // Share variable at all views
        View::composer('*', function($view) use($generalSetting){
            $view->with('settings', $generalSetting);
        });
    }
}
