<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 5/26/2018
 * Time: 10:44 PM
 */

namespace App\Http\Controllers\UserV3;


use App\Models\News;

class NewsController extends UserAppController
{
    protected $dirView = 'UserViewV3.News.';

    public function show($slug)
    {
        $news = News::findBySlug($slug);
        return view($this->dirView . 'show')
            ->with('news', $news);
    }

}