<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/7/2017
 * Time: 6:20 PM
 */

namespace App\Http\Controllers\User;


use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use App\Models\ProductImage;
use App\Models\ProductOption;
use App\Models\ProductReview;
use App\Models\ProductVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Session;

class ProductsController extends AppUserController
{
    protected $rootView = 'UserView.Products.';

    public function index(Request $request)
    {
// return view($this->rootView . 'index');
    }

    public function show($alias)
    {
        $product = Product::getDetailProductByAlias($alias);
        if (empty($product)) {
            abort(400);
        }
        if (!empty($product['images'])) {
            foreach ($product['images'] as $image) {
                if ($image['is_main'] == 1) {
                    $product['imageMain'] = $image;
                    break;
                }
            }
            if (empty($product['imageMain'])) {
                $product['imageMain'] = $product['images'][0];
            }
        } else {
            $noImage = ["id" => 1,
                "p_product_id" => 1,
                "url_thumb" => "img/noimage.png",
                "description" => null,
                "is_show" => 1,
                "is_main" => 1
            ];
            $product['imageMain'] = $noImage;
            $product['images'][] = $noImage;
        }


        return view($this->rootView . 'show')
            ->with('product', $product);

    }

    public function exporters(Request $request)
    {
        $id = 1;//ao vnxk
        $page = !empty($request['page']) ? $request['page'] : 1;

        $limit = !empty($request['limit']) ? $request['limit'] : 10;
$dataSearch=$request['keyword'];
$searchurl="";
        $listProducts = Product::select('id', 'alias', 'p_category_id', 'p_vendor_id', 'product_code', 'name', 'is_new', 'is_sale', 'is_show',
            'price', 'price_sale', 'unit', 'quantity', 'short_description', 'description', 'en_name', 'en_short_description', 'en_description')
            ->whereNull('deleted_at')
            ->where('p_category_id', $id)
            ->with(['Images' => function ($q) {
                $q->select('id', 'id as id_image', 'p_product_id', 'url_thumb', 'description', 'is_show', 'is_main')->where('is_main', '1');
            }]);
           	$count =0;
			 if (!empty($dataSearch)) {
            $listProducts = $listProducts->where(function ($query) use ($dataSearch) {
                $query->where('name', 'like', '%' . $dataSearch . '%');
                   
            });
			$lst= Product::select('id')->whereNull('deleted_at') ->where('p_category_id', $id)->where('name', 'like', '%' . $dataSearch . '%')->get()
 
            ->toArray();$count = count($lst);
			$searchurl="&keyword=".$dataSearch;
        }else{
			$lst= Product::select('id')->whereNull('deleted_at') ->where('p_category_id', $id)->get()
 
            ->toArray();
			$count = count($lst);
		}
		$listProducts  = $listProducts->orderBy('created_at', 'DESC')
            ->paginate($limit, ['*'], 'page', $page);
		
 
        return view($this->rootView . 'exporters')
            ->with('listProducts', $listProducts)->with('page',  $page)->with('count',  $count)->with('searchurl',  $searchurl);

    }

    public function motivation(Request $request)
    {
        $id = 2;//ao vnxk
        $page = !empty($request['page']) ? $request['page'] : 1;

        $limit = !empty($request['limit']) ? $request['limit'] : 10;

        $dataSearch=$request['keyword'];
$searchurl="";
        $listProducts = Product::select('id', 'alias', 'p_category_id', 'p_vendor_id', 'product_code', 'name', 'is_new', 'is_sale', 'is_show',
            'price', 'price_sale', 'unit', 'quantity', 'short_description', 'description', 'en_name', 'en_short_description', 'en_description')
            ->whereNull('deleted_at')
            ->where('p_category_id', $id)
            ->with(['Images' => function ($q) {
                $q->select('id', 'id as id_image', 'p_product_id', 'url_thumb', 'description', 'is_show', 'is_main')->where('is_main', '1');
            }]);
           	$count =0;
			 if (!empty($dataSearch)) {
            $listProducts = $listProducts->where(function ($query) use ($dataSearch) {
                $query->where('name', 'like', '%' . $dataSearch . '%');
                   
            });
			$lst= Product::select('id')->whereNull('deleted_at') ->where('p_category_id', $id)->where('name', 'like', '%' . $dataSearch . '%')->get()
 
            ->toArray();$count = count($lst);
			$searchurl="&keyword=".$dataSearch;
        }else{
			$lst= Product::select('id')->whereNull('deleted_at') ->where('p_category_id', $id)->get()
 
            ->toArray();
			$count = count($lst);
		}
		$listProducts  = $listProducts->orderBy('created_at', 'DESC')
            ->paginate($limit, ['*'], 'page', $page);
		
        return view($this->rootView . 'motivation')
            ->with('listProducts', $listProducts)->with('page',  $page)->with('count',  $count)->with('searchurl',  $searchurl);

    }

    public function printOnRequest(Request $request)
    {
        $id = 2;//ao vnxk
        $page = !empty($request['page']) ? $request['page'] : 1;
		 $curpage = $page;
       $limit = 2;
	            
	   $listCategories = ProductCategory::getListChildCategorys($page, $limit, 2);
	    
		 $listId=[];
		  if (!empty($listCategories)) {
            foreach ($listCategories as $key => $cat) {
				array_push($listId, $cat['id']);
			}
		  }
        $listProducts =Product::select('id', 'alias', 'p_category_id', 'p_vendor_id', 'product_code', 'name', 'is_new', 'is_sale', 'is_show',
            'price', 'price_sale', 'unit', 'quantity', 'short_description', 'description', 'en_name', 'en_short_description', 'en_description')
            ->whereNull('deleted_at')
			->whereIn('p_category_id', 	 $listId)
			  ->with(['Images' => function ($q) {
                $q->select('id', 'id as id_image', 'p_product_id', 'url_thumb', 'description', 'is_show', 'is_main');
            }])
			->orderBy('created_at', 'DESC') ->get()
            ->toArray();
            $total = ProductCategory::getListIdChildren(2);
           $count = count($total);
     return view($this->rootView . 'index')
		  ->with('listProducts', $listProducts)->with('listCategories', $listCategories)->with('count',  $count)->with('curpage',  $curpage);
    }
}