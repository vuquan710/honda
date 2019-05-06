<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 9/15/2018
 * Time: 12:25 PM
 */

namespace App\Http\Controllers\UserV3;


use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomesController extends UserAppController
{

    protected $dirView = 'UserViewV3.Homes.';

    public function index(Request $request)
    {
        $listRecommendCategories = ProductCategory::limit(3)->get();
        foreach ($listRecommendCategories as $listRecommendCategory) {
            $listRecommendCategory->load(['Product' => function ($q) {
                $q->select('id', 'alias', 'p_category_id', 'p_vendor_id', 'product_code', 'name', 'is_new', 'is_sale', 'is_show',
                    'price', 'price_sale', 'unit', 'quantity', 'short_description', 'description', 'en_name', 'en_short_description', 'en_description', 'image_main_url', 'slug')
                    ->with(['Images' => function ($q) {
                        $q->select('id as id_image', 'p_product_id', 'url_thumb', 'description', 'is_show', 'is_main');
                    }])
                    ->limit(5);
            }]);
        }
        $listNewProducts = Product::getListNewProducts(4);
        return view($this->dirView . 'index')
            ->with('listRecommendCategories', $listRecommendCategories->toArray())
            ->with('listNewProducts', $listNewProducts);
    }

    public function aboutUs()
    {
        return view($this->dirView . 'aboutUs');
    }

    public function contactUs()
    {
        return view($this->dirView . 'contactUs');
    }

}