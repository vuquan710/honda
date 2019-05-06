<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/7/2017
 * Time: 6:20 PM
 */

namespace App\Http\Controllers\User;


use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends AppUserController
{  protected $rootView = 'UserView.News.';
    public function index(Request $request)
    {
// return view($this->rootView . 'index');
    }

    public function show($id)
    {
        $news = News::findByIdActive($id);
         return view($this->rootView . 'show')
  ->with('news', $news);
    }
  
}