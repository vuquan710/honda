<?php

/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/15/2017
 * Time: 4:49 CH
 */

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;
use Mail;

class AuthController extends AdminAppController
{

    protected $dirView = 'AdminView.Auth.';

    /** Login
     * @param Request $request
     * @return view login
     */
    public function login(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.homes.index');
        }

        if ($request->isMethod('POST')) {
            $data['username'] = strtolower(trim($request['username']));
            $data['password'] = trim($request['password']);
            $validateDefault = [
                'username' => 'required',
                'password' => 'required'
            ];
            $messValidate = [
                'username.required' => 'Username is not empty!',
                'password.required' => 'Password is not empty!'
            ];
            $validator = Validator::make($data, $validateDefault, $messValidate);
            if ($validator->fails()) {
                return redirect()->route('admin.auth.login')->withErrors($validator->errors())
                    ->withInput();
            }
            $data['deleted_at'] = null;
            $remember = isset($request['remember']) && $request['remember'] == 1 ? true : false;
            $auth = Auth::guard('admin')->attempt($data, $remember);
            if (!empty($auth)) {
                if (Cache::has($request->ip())) {
                    Cache::forget($request->ip());
                }
                return redirect()->route('admin.homes.index');
            } else {
                return redirect()->route('admin.auth.login')->withErrors(['Login fails!'])
                    ->withInput();
            }

        }
        return view($this->dirView . 'login');
    }

    /**
     * Logout & redirect to login page
     * @return
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.login');
    }

    public function create()
    {
        $data = [
            'username' => 'admin',
            'password' => Hash::make('123456a'),
            'email' => 'lenhhoxung3193@gmail.com',
            'first_name'=>'Lenh Ho',
            'last_name'=>'Xung',
            'full_name'=>'Lenh Ho Xung',
            'author_type' => Staff::AUTHOR_ADMIN

        ];
        Staff::create($data);
    }

    /**
     * Send mail reset password for staff
     * @param Request $request
     * @return string
     */
    public function forgotPassword(Request $request)
    {
        $email = $request['email'];

        $response = [
            'result' => 1,
            'mess' => __('Successfully!')
        ];
        if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
            $response['result'] = 2;
            $response['mess'] = __('Email is invalid!');
            return json_encode($response);
        }
        $user = AdminUser::findByEmail($email);
        if (empty($user)) {
            $response['result'] = 2;
            $response['mess'] = __('Not found User!');
            return json_encode($response);
        }
        $user->fill([
            'reset_password_token' => str_random(64),
            'reset_password_token_expired' => date('Y-m-d H:i:s', strtotime('+1 days', time()))
        ]);
        $user->save();
        $user = $user->toArray();
        try {
            ini_set('max_execution_time', 300);
            Mail::send('email.BackEnd.forgotPassword', $user, function ($message) use ($user) {
                $message->from(env('MAIL_FROM', 'lenhhoxung3193@gmail.com'), '');
                $message->to($user['email'], $user['email'])->subject('Email for reset password.');
            });
            $response['mess'] = __('Successfully! Please check inbox email to reset password.');
        } catch (\Exception $e) {
            $response['result'] = 2;
            $response['mess'] = $e->getMessage();
        };
        return json_encode($response);

    }

    /**
     * Update new password of staff
     * @param Request $request
     * @param null $token
     * @return $this
     */
    public function resetPassword(Request $request, $token = null)
    {
        if (empty($token)) {
            return view($this->dirView . 'resetPasswordSuccess')->with('messErr', __('Reset password token is invalid.'));
        }
        $user = AdminUser::select('*')->where('reset_password_token', $token)
            ->where('reset_password_token_expired', '>=', date('Y-m-d H:i:s'))
            ->first();
        if (empty($user)) {
            return view($this->dirView . 'resetPasswordSuccess')->with('messErr', __('Not found user.'));
        }
        if ($request->isMethod('POST')) {
            $pass = trim($request['password']);
            $passConf = trim($request['password_confirm']);
            $token = $request['token'];
            if (strlen($pass) >= 6 && strlen($passConf) >= 6 && $pass === $passConf) {

                $user->fill(['password' => Hash::make($pass), 'reset_password_token' => null, 'reset_password_token_expired' => null]);
                $user->save();
                return view($this->dirView . 'resetPasswordSuccess')->with('mess', __('Reset password successful.'));
            } else {
                return redirect()->route('admin.auth.resetPassword', $token)
                    ->withErrors(['Password is invalid!'])
                    ->withInput();
            }
        }

        return view($this->dirView . 'resetPassword')
            ->with('token', $token);
    }
}