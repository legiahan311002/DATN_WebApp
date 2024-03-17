<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Models\User_Permission;

class SellerMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('username')) {
            $username = session('username');
            $id_permission = User_Permission::where('username', $username)->pluck('id_permission')->toArray();
            if ( in_array(2, $id_permission)) {               
                return $next($request);
            }else{
                return redirect()->route('seller.login');
            }
        }else{
            
            return redirect()->route('seller.login');
        }
    }
}
