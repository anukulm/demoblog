<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

       
        // if ($guard == "admin" && Auth::guard($guard)->check()) {
        //         return redirect('/adminff');
        //     }
        
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }

        // return $next($request);
       
     




        // if (Auth::guard($guard)->check()) {

      
          return redirect(RouteServiceProvider::HOME);
        
          // switch ($guard) {
          //     case 'customer':
          //          if(Auth::guard($guard)->check())
          //          {

          //             return redirect('/');

          //          }

          //         break;
              
          //     default:
          //        if(Auth::guard($guard)->check())
          //          {
          //             return redirect('/');
                      
          //          }
          //         break;
          // }


        // }

        // return $next($request);














    }
}
