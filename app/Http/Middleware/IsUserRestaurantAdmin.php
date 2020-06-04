<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsUserRestaurantAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      //process request normally if restaurant manager
      if (Auth::user()->role == 'RManager')
        return $next($request); 
      //go to admin index page if he is admin trying to open restaurant page
      elseif (Auth::user()->role == 'admin')
        return redirect('adminpanel'); 
      //go to user index page if he is user trying to open restaurant user page
      elseif (Auth::user()->role == 'user')
        return redirect('home');
        //home page if neither user nor admin 
      else
        return redirect('/'); 
    }



}
