<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()){
            $dude = Auth::user()->id;
            $user = User::findOrFail($dude);
            $username = $user->username;
            if($username == 't'){
                return $next($request);
            }else{
                abort(403, 'No Access');
            }
        }else{
            abort(403, 'No Access');
        }
        //abort(403, 'No Access');
        //return $next($request);
    }
}
