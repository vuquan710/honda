<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 5/26/2018
 * Time: 10:44 PM
 */

namespace App\Http\Controllers\UserV2;


use App\Models\News;

class NewsController extends UserAppController
{
    protected $dirView = 'UserViewV2.News.';

    public function show($id)
    {
        $news = News::findByIdActive($id);
        return view($this->dirView . 'show')
            ->with('news', $news);
    }

}