<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    
    public function boot()
    {
        View::composer('*', 'App\Http\ViewComposers\HomeComposer');
        View::composer('publicate.publication', 'App\Http\ViewComposers\PublicationComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
