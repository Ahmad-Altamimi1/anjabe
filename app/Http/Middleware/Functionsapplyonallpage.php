<?php

namespace App\Http\Middleware;

use App\Models\poststags;
use Closure;
use Illuminate\Http\Request;
USE Illuminate\Support\Facades\App;
class Functionsapplyonallpage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $alltags = Poststags::all();
         
        App::bind('alltags', function () use ($alltags) {
            return $alltags;
        });

        return $next($request);
    }
}
