<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/15/2017
 * Time: 9:25 PM
 */

namespace App\Models;


class Order extends AppModel
{
    protected $table = 'orders';
    protected $fillable = [
        'alias', 'user_id', 'name_user', 'phone_number', 'email_user', 'status'
    ];
    const ORDER_STATUS_WAITING = 1;
    const ORDER_STATUS_CONFIRM = 2;
    const ORDER_STATUS_SUCCESS = 3;
    const ORDER_STATUS_CANCEL = 4;
    public static $orderStatus = [
        self::ORDER_STATUS_WAITING => 'Waiting',
        self::ORDER_STATUS_WAITING => 'Confirm',
        self::ORDER_STATUS_WAITING => 'Success',
        self::ORDER_STATUS_WAITING => 'Cancel'
    ];
}