<?php

namespace App\Http\Middleware;

use App\Models\UserPage;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;



class Admin
{
    public function handle($request, Closure $next) {

        if(!Session::has('fb_longlive_token')&&!Session::has('fb_uid')  ) {
            return Redirect::to('login');
        }

        return $next($request);

    }
}
