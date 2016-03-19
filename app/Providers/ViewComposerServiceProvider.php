<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use Log;
use Illuminate\Support\Facades\Session;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
        //
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

    private function composeNavigation()
    {
        view()->composer('sidebar', function($view)
        {

            Log::info("ComposeNavigation : ");
            Log::info(Auth::user());
            $view->with('test', "foobar");
        });
    }
}
