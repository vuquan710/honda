<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 5/16/2018
 * Time: 4:26 PM
 */

namespace App\Http\Controllers\UserV2;


use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoriesController extends UserAppController
{
    protected $dirView = 'UserViewV2.Categories.';

    public function index()
    {

    }

    public function show($id, Request $request)
    {
        $category = ProductCategory::findByIdActive($id);
        if (empty($category)) {
            abort(404);
        }
        $limit = !empty($request['limit']) ? $request['limit'] : $this->limit;
        $page = !empty($request['page']) ? $request['page'] : $this->page;
        $sortBy = !empty($request['sort']) ? $request['sort'] : null;
        $listProducts = Product::getListProductsByCategory($page, $limit, $id, $sortBy);
//        dd($listProducts->toArray());
        return view($this->dirView . 'show')
            ->with('category', $category)
            ->with('listProducts', $listProducts)
            ->with('sort', $sortBy);
    }
}