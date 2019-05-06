<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 5/22/2018
 * Time: 1:42 PM
 */

namespace App\Http\Controllers\UserV3;


use App\Models\News;
use App\Models\NewsCategory;

class NewsCategoryController extends UserAppController
{

    protected $dirView = 'UserViewV3.NewsCategories.';

    public function index()
    {
        dd(1);
    }

    public function show($slug)
    {
        $newsCategory = NewsCategory::findBySlug($slug);
        if (empty($newsCategory)) {
            abort(404);
        }
        $page = 1;
        $limit = 10;
        $listNews = News::getListNewsByCategoryId($newsCategory->id, $page, $limit);
//        dd($listNews->toArray());
        return view($this->dirView . 'show')
            ->with('newsCategory', $newsCategory)
            ->with('listNews', $listNews);
    }
}