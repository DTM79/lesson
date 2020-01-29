<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUser1
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//    public function handle($request, Closure $next)
//    {
//        $offer = $request->route()->parameter('offer');
//            if(Auth::user()->id == $offer['user_id']){
//            return $next($request);
//        }
//        return redirect()->back();
//    }
    public function handle($request, Closure $next)
    {
        $article = $request->route()->parameter('article');
        if(Auth::user()->id == $article['user_id']){
            return $next($request);
        }
        return redirect()->back();
    }
}
