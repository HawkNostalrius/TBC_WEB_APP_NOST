<?php
/**
 * Created by PhpStorm.
 * User: Hawk
 * Date: 01/03/16
 * Time: 15:45
 */

namespace App\Providers;

use App\Hashing\ShaHasher;
use Illuminate\Hashing\HashServiceProvider;
use Log;

class ShaHashServiceProvider extends HashServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->app->bind('hash', function()
        {
            Log::info("Create New ShaHasher object");
            return new ShaHasher();
        });
    }

    /**
     * Register the service provider. OVERRIDE
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('hash', function () {
            return new ShaHasher();
        });
    }
}