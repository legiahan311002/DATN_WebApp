<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Models\User_Permission;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('username')) {
            $username = session('username');
            $user = User_Permission::where('username', $username)->first();
            if ( $user->id_permission == 1) {               
                return $next($request);
            }else{
                return redirect()->route('admin.login');
            }
        }
    
            return redirect()->route('admin.login');
            
    }
}
