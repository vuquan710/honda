<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 5/16/2018
 * Time: 3:39 PM
 */

namespace App\Http\Controllers\UserV2;


use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use App\Models\ProductCategory;

class UserAppController extends Controller
{
    protected $page = 1;
    protected $limit = 12;

    public function __construct()
    {
        $categories = ProductCategory::getListCategories();
//        dd($categories);
        $listNewsCategory = NewsCategory::getListNewCategory();
//        dd($listNewsCategory);
        $listNewsCat = [
            'show_menu_on' => [],
            'show_menu_off' => []
        ];
        foreach ($listNewsCategory as $item) {
            if ($item['is_show_on_menu']) {
                $listNewsCat['show_menu_on'][] = $item;
            } else {
                $listNewsCat['show_menu_off'][] = $item;
            }
        }
        \View::share(['categories' => $categories, 'listNewsCat' => $listNewsCat]);
    }
}