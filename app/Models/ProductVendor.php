<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/15/2017
 * Time: 9:42 PM
 */

namespace App\Models;


class ProductVendor extends AppModel
{
    protected $table = 'p_vendors';
    protected $fillable = [
        'name', 'phone_number', 'address', 'contact_email', 'description'
    ];

    public static function getListProductVendors()
    {
        $listRoot = self::whereNull('deleted_at')
            ->orderBy('name', 'ASC')
            ->get()
            ->toArray();
        return $listRoot;
    }
}