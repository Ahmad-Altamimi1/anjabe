<?php

namespace App\Providers;

use App\Models\groups;
use Illuminate\Support\ServiceProvider;
use App\Models\Poststags;

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
        // Share alltags with all views
        $allgroups = groups::all();
        
        view()->share('allgroups', $allgroups);

        \URL::forceRootUrl(\Config::get('app.url'));

        // And this if you wanna handle the HTTPS URL scheme
        if (\Str::contains(\Config::get('app.url'), 'https://')) {
            \URL::forceScheme('https');
            // Use \URL:forceSchema('https') if you use Laravel < 5.4
        }
    }
}
