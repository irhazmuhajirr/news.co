<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPrice
{
    public function handle(Request $request, Closure $next)
    {   

        // if ($request->price > 100) {
        //     return redirect('/');
        // }

        echo 'This is a middleware <br>';
        return $next($request);
    }
}
