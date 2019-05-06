<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/15/2017
 * Time: 9:12 PM
 */

namespace App\Models;


class OrderDetail extends AppModel
{
    protected $table = 'order_details';
    protected $fillable = [
        'order_id', 'product_id', 'quantity'
    ];
}