<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('admin')) {
            return redirect('/sesi')->with('error', 'Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}
