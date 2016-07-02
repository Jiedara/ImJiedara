<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',"App\Http\ViewComposers\PagesViewComposer");
        view()->composer('*',"App\Http\ViewComposers\ActiveMenuComposer");
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
