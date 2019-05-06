<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/15/2017
 * Time: 9:34 PM
 */

namespace App\Models;


class ProductComment extends AppModel
{
    protected $table = 'p_comments';
    protected $fillable = [
        'p_product_id', 'name', 'content'
    ];

    public static function getListComment()
    {
        $comments = self::paginate(10);
        return $comments;
    }
}