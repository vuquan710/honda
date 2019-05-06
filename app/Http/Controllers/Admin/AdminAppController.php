<?php

/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 04/02/2017
 * Time: 4:49 CH
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdminAppController extends Controller
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

    public static $listLinkStaff = [
        'admin.vendors.index',
        'admin.vendors.show',
        'admin.vendors.edit',
        'admin.vendors.create',
        'admin.vendors.store',
        'admin.vendors.update',
        'admin.vendors.destroy',
        'admin.categories.index',
        'admin.categories.show',
        'admin.categories.edit',
        'admin.categories.create',
        'admin.categories.store',
        'admin.categories.update',
        'admin.categories.destroy',
        'admin.products.index',
        'admin.products.show',
        'admin.products.create',
        'admin.products.store',
        'admin.products.edit',
        'admin.products.update',
        'admin.products.destroy',
        'admin.news_categories.index',
        'admin.news_categories.show',
        'admin.news_categories.edit',
        'admin.news_categories.create',
        'admin.news_categories.store',
        'admin.news_categories.update',
        'admin.news_categories.destroy',
        'admin.news.index',
        'admin.news.show',
        'admin.news.edit',
        'admin.news.create',
        'admin.news.store',
        'admin.news.update',
        'admin.news.destroy',
        'admin.staffs.show',
        'admin.staffs.edit',
        'admin.staffs.update',
        'admin.staffs.change_password',
    ];

    public static function storeImage($images = [], $dir = null, $dirThumb = null)
    {
        $linkImage = [];
        if (empty($dir) || empty($dirThumb)) {
            return $linkImage;
        }
        if (!empty($images)) {
            if (!is_array($images)) {
                $images = [$images];
            }
            foreach ($images as $image) {
                if (!empty($image)) {
                    list($width, $height) = getimagesize($image->getPathName());
                    $name = time() . '_' . $image->getClientOriginalName();
                    $image->move($dir, $name);
                    $pathName = $dir . $name;
                    $img = Image::make($pathName);
                    $img->resize(320, 320 * $height / $width);
                    $img->save($dirThumb . $name);
                    array_push($linkImage, $name);
                }
            }
        }
        return $linkImage;
    }
}