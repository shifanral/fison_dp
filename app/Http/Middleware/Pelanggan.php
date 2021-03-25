<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Pelanggan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role == 2){ // role 2 adalah pelanggan
            return $next($request);
        }else if(Auth::user()->role == 1){ //role 1 adalah admin
            return redirect()->route('admin.index')->with('error', "You dont have pelanggan access");
        }
    }
}
