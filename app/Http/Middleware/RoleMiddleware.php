<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if($request->user()->role!==$role){
            switch($request->user()->role){
                case 'admin':return redirect()->route('admin.dashboard'); break;
                case 'vendor':return redirect()->route('vendor.dashboard'); break;
                case 'user':return redirect()->route('user.dashboard'); break;
                default:return redirect()->route('home');
            }
        }
        return $next($request);
    }
}
