<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/15/2017
 * Time: 9:35 PM
 */

namespace App\Models;


class ProductImage extends AppModel
{
    const IS_MAIN = 1;
    protected $table = 'p_product_images';
    protected $fillable = [
        'p_product_id', 'description', 'url_thumb', 'url', 'is_show', 'is_main'
    ];
}