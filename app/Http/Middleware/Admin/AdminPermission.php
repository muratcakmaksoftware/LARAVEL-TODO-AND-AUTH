<?php
namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminPermission
{
    public function handle($request, Closure $next)
    {
        //$user = app('auth')->guard('users')->user();
        $auth = Auth::guard('users');
        if ($auth->check()) { //Login olmuş mu ?

            $user = $auth->user();
            if($user->role == 0){ //Member

            }else if($user->role == 1){ //Admin

            }else{

            }

        }else{ //Login olmadıysa login sayfasına yönlendir.
            return redirect()->route('guest.login');
        }
        return $next($request);
    }
}
