<?php

namespace App\Http\Middleware;

use Closure;
use VG;

class AfterMiddleware
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
        $response = $next($request);


        if(!$request->isMethod('get')) {
            $url = \Request::url();
            $seg = explode('/', $url);
            $base = $seg[6];
            if(isset($seg[7])) {
                $id = $seg[7];
            } else {
                $id = '';
            }
//		dd($seg);
            $last = $seg[count($seg) - 1];
            if($request->isMethod('post')) {
                //			VG::Log('create', $base);
                if(isset($response->original['message'])) {
                    if(isset($response->original['message']['action'])) {
                        $id = '';
                        if(isset($response->original['message']['id'])) $id = $response->original['message']['id'];
                        VG::Log($response->original['message']['action'], $base . ' id=' . $id);
                    }
                } else {
                    VG::Log('create', $base);
                }
            } else if($request->isMethod('patch')) {
                VG::Log('edit', $base.' id='.$id);
            } else if($request->isMethod('delete')) {
//				dd($response->original);
                if(isset($response->original['message'])) {
                    VG::Log($response->original['message']['action'], $base . ' id=' . $response->original['message']['id']);
                } else {
                    VG::Log('delete/restore', $base . ' id=' . $id);
                }
            }
        }


        return $response;
    }

    public function str_replace_first($needle, $replacement, $haystack) {
        $needle_start = strpos($haystack, $needle);
        $needle_end = $needle_start + strlen($needle);
        if($needle_start!==false) {
            $to_replace = substr($haystack, 0, $needle_end);
            return str_replace($needle, $replacement, $to_replace) . substr($haystack, $needle_end);
        }
        else
            return $haystack;
    }
}
