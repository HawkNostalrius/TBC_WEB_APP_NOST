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
    }

    /**
     * Register the service provider. OVERRIDE
     *
     * @return void
     */
    public function register()
    {
        //Create ShaHasher instead of default hash class
        $this->app->singleton('hash', function () {
            Log::info("singleton hash method");
            return new ShaHasher();
        });
    }
}