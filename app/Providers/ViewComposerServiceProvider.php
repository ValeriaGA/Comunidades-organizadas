<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeAdministrationNavigation();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composeAdministrationNavigation()
    {
        view()->composer('administration.layouts.side_bar', 'App\Http\Composers\AdminNavigationComposer@compose');
    }
}
