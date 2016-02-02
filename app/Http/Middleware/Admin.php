<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Admin
{
    public function handle($request, Closure $next) {


//        Auth::logout();
        $user = $request->user();
        if(is_null($user)) {
            Auth::logout();
            return Redirect::to('login');
        }

//        if(!Session::has('user_id')) {

        Session::set('user_id', $user->id);
        Session::set('username', $user->name);
//        }

        // -- Language

        if(!Session::has('locale')) {
            Session::put('locale', $user->lang );
        }
        app()->setLocale(Session::get('locale'));

        // -- Permissions


        return $next($request);

    }
}
