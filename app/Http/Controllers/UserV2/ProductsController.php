<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 5/16/2018
 * Time: 3:38 PM
 */

namespace App\Http\Controllers\UserV2;


use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends UserAppController
{
    protected $dirView = 'UserViewV2.Products.';

    public function index()
    {
        return view($this->dirView . 'index');
    }

    public function show($slug)
    {
        $product = Product::getDetailProductBySlug($slug);
        $listProductRelate = Product::getListProductsByCategory(1, 10, $product['p_category_id']);
        return view($this->dirView . 'show')
            ->with('product', $product)
            ->with('listProductRelate', $listProductRelate);
    }

}