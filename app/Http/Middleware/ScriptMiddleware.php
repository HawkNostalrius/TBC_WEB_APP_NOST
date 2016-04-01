<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use App\Models\Script;
use Auth;

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
        Log::info("Foobar ScriptMiddleware");
        /**
         * Redirect if user is not authorized OR script not exist
         */
        if ($request->route()->hasParameter('script'))
        {
            $scriptId = $request->route()->getParameter('script');
            $script = Script::find($scriptId);
            if (empty($script) ||
            (($script->user_id != Auth::user()->id) &&
                !Auth::user()->hasRole('admin')))
            {
                flash()->overlay('You are not authorized to access at this script', 'Sorry');
                return redirect()->action('Script\ScriptController@index');
            }
        }

        return $next($request);
    }
}
