<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/7/2017
 * Time: 5:58 PM
 */

namespace App\Http\Middleware;


namespace App\Http\Middleware;

use App\Http\Controllers\Admin\AdminAppController;
use App\Models\Setting;
use App\Models\Staff;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::guard('admin')->check()) {
            $language = Setting::getLanguage('admin');
            App::setLocale($language);
            $authorType = Auth::guard('admin')->user()->author_type;
            if ($authorType == Staff::AUTHOR_EMPLOYEE && !in_array(\Route::current()->getName(), AdminAppController::$listLinkStaff)) {
                abort(403);
            }
            return $next($request);
        } else {
            return redirect()->route('admin.auth.login');
        }
    }

}