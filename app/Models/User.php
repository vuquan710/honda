<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/15/2017
 * Time: 9:43 PM
 */

namespace App\Models;


class User extends AppModel
{
    protected $table = 'users';
    protected $fillable = [
        'alias', 'first_name', 'last_name', 'full_name', 'email', 'password', 'status', 'photo', 'phone_number', 'address', 'description', 'last_access_at', 'remember_token', 'reset_password_token', 'reset_password_token_expired'
    ];
    protected $hidden = [
        'password', 'remember_token', 'reset_password_token', 'reset_password_token_expired'
    ];

    const STATUS_USER_REGISTER = 1;
    const STATUS_USER_CONFIRM = 2;
    const STATUS_USER_UN_REGISTER = 3;
    
    public static $status = [
        self::STATUS_USER_REGISTER => 'Register',
        self::STATUS_USER_CONFIRM => 'Confirm',
        self::STATUS_USER_UN_REGISTER => 'UnRegister',
    ];

    protected static function getListUsers($limit = 10, $page = 1)
    {
        $listUser = self::paginate($limit, ['*'], 'page', $page);
        return $listUser;
    }
}