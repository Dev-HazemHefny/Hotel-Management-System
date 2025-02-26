<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->usertype == 'admin')
         {
            return $next($request);
         }
        // إذا لم يكن المستخدم أدمن، يتم إعادة توجيهه أو منع الوصول
        return redirect('/')->with('error', 'Access denied. You are not an admin.');
    }
    }

