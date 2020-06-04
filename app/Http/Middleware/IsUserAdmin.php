<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsUserAdmin
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
        if (Auth::user()->role == 'admin')
            return $next($request); //process request normally if admin
        elseif (Auth::user()->role == 'RManager')
            return redirect('restaurant'); //go to restaurant index page if restaurant manager trying to open user page
        elseif (Auth::user()->role == 'user')
            return redirect('home'); //go to user index page if he is user trying to open admin page 
        else
            return redirect('/'); //home page if not admin
    }
}