<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 9/15/2018
 * Time: 12:26 PM
 */

namespace App\Http\Controllers\UserV3;


use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use App\Models\ProductCategory;

class UserAppController extends Controller
{
    protected $limit = 12;
    protected $page = 1;

    public function __construct()
    {
        $categories = ProductCategory::getListCategories();
//        dd($categories);
        $listNewsCategory = NewsCategory::getListNewCategory();
//        dd($listNewsCategory);
        $path = public_path('UserV3\images\brands');
        $allBrands = array_diff(scandir($path), ['.', '..']);

        \View::share(['categories' => $categories, 'listNewsCategory' => $listNewsCategory, 'allBrands' => $allBrands]);
    }
}