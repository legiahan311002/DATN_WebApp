<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Models\User_Permission;

class BuyerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $username = session('username');
        if (session()->has('username')) {
            $id_permission = User_Permission::where('username', $username)->pluck('id_permission')->toArray();
            if ( in_array(3, $id_permission)) {               
                return $next($request);
            }else{
                return redirect()->route('buyer.login');
            }
        } else {
            return redirect()->route('buyer.login');
        }
        
    }
}
