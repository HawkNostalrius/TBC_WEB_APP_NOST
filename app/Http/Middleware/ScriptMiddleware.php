<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use App\Models\Script;

class ScriptMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //$script = Script::find($request->id);
        Log::info("Foobar ScriptMiddleware");
        Log::info("Request route : ");
        Log::info($request->route()->parameters());
        Log::info("Request input : ");
        Log::info($request->all());
        return $next($request);
    }
}
