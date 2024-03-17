<?php

namespace App\Http\Middleware;

use App\Models\ShopProfile;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ShopProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        
        if ($user) {
            $shopProfile = ShopProfile::where('username', $user->username)->first();
            if ($shopProfile) {
                $idShop = $shopProfile->id;
                $nameShop = $shopProfile->name_shop;
                $request->merge(compact('user', 'shopProfile', 'nameShop', 'idShop'));
            }
        }

        return $next($request);
    }
}
