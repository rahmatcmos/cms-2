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
    public function handle($request, Closure $next)
    {
        if(Auth::guard($guard)->guest()){
          if($request->ajax()){
            return response('Unauthorized', 401);
          } else{
            return redirect()->guest('login');
          }
        } else if (!Auth::guard($guard)->user()->user_type == 'customer'){
          return redirect()->to('/')->withError('Permission Denied');
        } else if (!Auth::guard($guard)->user()->user_type == 'admin'){
          return redirect()->to('/')->withError('Permission Denied');
        }
        return $next($request);
    }
}
