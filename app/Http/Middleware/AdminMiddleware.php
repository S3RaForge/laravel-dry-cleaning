<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Проверяем, аутентифицирован ли пользователь и имеет ли он роль 'admin'
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            // Если пользователь не администратор, перенаправляем его на главную страницу
            return redirect('/');
        }
        // Если пользователь аутентифицирован и имеет роль 'admin', пропускаем запрос дальше
        return $next($request);
    }
}
