<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/7/2017
 * Time: 6:20 PM
 */

namespace App\Http\Controllers\User;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoriesController extends AppUserController
{  protected $rootView = 'UserView.NewsCategories.';
    public function index(Request $request)
    { $page = !empty($request['page']) ? $request['page'] : 1;
        $limit = 12;
		 $listCategory= NewsCategory::getListNewCategoryIntro($page, $limit);
		 $lst= NewsCategory::whereNotIn('id', [1])->get()
            ->toArray();
			$count = count($lst);
 return view($this->rootView . 'index')
  ->with('listCategory', $listCategory)->with('page',  $page)->with('count',  $count);
    }
     public function pages($id)
    {$page = !empty($request['page']) ? $request['page'] : 1;
        $limit =  12;
        $listnews = News::where('news_category_id', $id)->where('is_show', '1') ->orderBy('created_at', 'DESC')
            ->paginate($limit, ['*'], 'page', $page);
			$lst=News::where('news_category_id', $id)->where('is_show', '1') ->orderBy('created_at', 'DESC')->get()
            ->toArray();$count = count($lst);
     return view($this->rootView . 'pages')
->with('listnews', $listnews)->with('page',  $page)->with('count',  $count);
    }
    

}