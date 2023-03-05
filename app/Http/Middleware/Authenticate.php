<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
      if(Auth::check()){
        if(Auth::user()->status==1){
            return route('register');
        }else if(Auth::user()->status==2){
            return"belle fille";

        }else if(Auth::user()->status==3){
            return route('register');

        }
      }
        if (! $request->expectsJson()) {
            return route('user.create');
        }
    }
}
