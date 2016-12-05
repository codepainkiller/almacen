<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['purchases.modals.register'],
            'App\Http\ViewComposers\ProductComposer'
        );

        View::composer(
            ['products.modals.create', 'products.modals.edit'],
            'App\Http\ViewComposers\CategoryComposer'
        );
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
