<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/7/2017
 * Time: 5:58 PM
 */

namespace App\Http\Middleware;


namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('users')->check()) {
            if (Session::has('User.language') && in_array(Session::get('User.language'),['vi','en'])) {
                $language = Session::get('User.language');
            } else {
                $language = Setting::getLanguage();
            }
            App::setLocale($language);
            return $next($request);
        } else {
            return redirect()->route('user.auth.login');
        }

    }

}