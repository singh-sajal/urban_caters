<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $settings = null;

            if (Schema::hasTable('site_settings')) {
                $settings = SiteSetting::first();
            }

            $view->with('siteSettings', $settings);
        });
    }
}
