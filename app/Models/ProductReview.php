<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/15/2017
 * Time: 9:40 PM
 */

namespace App\Models;


class ProductReview extends AppModel
{
    protected $table = 'p_reviews';
    protected $fillable = [
        'p_product_id', 'name', 'content', 'rating_number'
    ];

    public static function getListReview()
    {
        $reviews = self::paginate(10);
        return $reviews;
    }

}