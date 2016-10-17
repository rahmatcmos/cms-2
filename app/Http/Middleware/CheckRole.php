<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard= 'admin')
    {
        if(Auth::check()){
            if (!Auth::user()->user_type == 1){
              return redirect()->to('/')->withError('Permission Denied');
            } 
            elseif (!Auth::user()->user_type == 2){
              return redirect()->to('/')->withError('Permission Denied');
            }
            elseif (Auth::user()->user_type == 0){
              return redirect()->to('/')->withError('Permission Denied');
            }
        } else {
            return redirect()->to('/')->withError('Permission Denied');
        }
        
        return $next($request);
    }
}
