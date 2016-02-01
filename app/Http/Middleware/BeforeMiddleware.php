<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Session;
use VG;
use Auth;

class BeforeMiddleware
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

        DB::enableQueryLog();
        app()->setLocale(Session::get('locale'));



        return $next($request);
    }
}
