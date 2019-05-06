<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/15/2017
 * Time: 9:03 PM
 */

namespace App\Models;


class Notification extends AppModel
{
    protected $table = 'notifications';
    protected $fillable = [
        'type', 'is_new', 'id_data'
    ];

    const NOTIFY_COMMENTS = 1;
    const NOTIFY_REVIEWS = 2;
    const NOTIFY_ORDERS = 3;
    public static $notify = [
        self::NOTIFY_COMMENTS => 'Comments',
        self::NOTIFY_REVIEWS => 'Reviews',
        self::NOTIFY_ORDERS => 'Orders',
    ];
}