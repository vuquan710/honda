<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/14/2017
 * Time: 10:43 PM
 */

namespace App\Models;

class Staff extends AppModel
{
    protected $table = 'staffs';
    protected $fillable = [
        'username', 'password', 'email', 'first_name', 'last_name', 'full_name', 'author_type', 'remember_token', 'reset_password_token', 'reset_password_token_expired'
    ];
    protected $hidden = [
        'password', 'remember_token', 'reset_password_token', 'reset_password_token_expired'
    ];
    const AUTHOR_ADMIN = 1;
    const AUTHOR_EMPLOYEE = 2;

    public static $authorType;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::$authorType = [
            self::AUTHOR_ADMIN => __('messages.Admin'),
            self::AUTHOR_EMPLOYEE => __('messages.Employee_Post_News')
        ];;
    }

    protected static function getListStaffs($limit = 10, $page = 1)
    {
        $listUser = self::paginate($limit, ['*'], 'page', $page);
        return $listUser;
    }

    public static function getAllStaffs()
    {
        $listRoot = self::whereNull('deleted_at')
            ->orderBy('username', 'ASC')
            ->get()
            ->toArray();
        return $listRoot;
    }

    public static function IsUserNameExist($username)
    {
        $staff = self::where('username', $username)
            ->first();
        if (empty($staff)) {
            return false;
        }
        return true;
    }
}