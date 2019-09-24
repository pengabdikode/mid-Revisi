<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Authurl
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
        $user = Auth::user();
        if($user->roles == 's_admin'){
            return '/s_admin';
        }elseif($user->roles == 'admin'){
            return $this->redirectTo;
        }else{
            return '/pembeli';
        }
    }
}
