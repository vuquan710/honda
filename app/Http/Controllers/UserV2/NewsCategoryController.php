<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 5/22/2018
 * Time: 1:42 PM
 */

namespace App\Http\Controllers\UserV2;


use App\Models\News;
use App\Models\NewsCategory;

class NewsCategoryController extends UserAppController
{

    protected $dirView = 'UserViewV2.NewsCategories.';

    public function index()
    {
        dd(1);
    }

    public function show($id)
    {
        $newsCategory = NewsCategory::findByIdActive($id);
        if (empty($newsCategory)) {
            abort(404);
        }
        $page = 1;
        $limit = 10;
        $listNews = News::getListNewsByCategoryId($id, $page, $limit);
//        dd($listNews->toArray());
        return view($this->dirView . 'show')
            ->with('newsCategory', $newsCategory)
            ->with('listNews', $listNews);
    }
}