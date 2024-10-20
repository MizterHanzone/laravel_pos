<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('auth')){

            if(session('position_name') != 'Admin') {
                session(['message'=>'You are Unauthorized to access the page! Please contact admin for more information.', 'type'=>'warning']);
    
                return redirect('/admin/cart');
            }
        }
        return $next($request);
    }
}
