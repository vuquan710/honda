<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/7/2017
 * Time: 5:48 PM
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class AppUserController extends Controller
{
 const LIMIT_DEFAULT_1 = 10;
    const LIMIT_DEFAULT_2 = 25;
    const LIMIT_DEFAULT_3 = 50;
    public static $listOptionPaginate = [
        self::LIMIT_DEFAULT_1,
        self::LIMIT_DEFAULT_2,
        self::LIMIT_DEFAULT_3
    ];

    const PAGE_DEFAULT = 1;
}