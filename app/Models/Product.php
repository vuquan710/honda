<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/15/2017
 * Time: 9:38 PM
 */

namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;

class Product extends AppModel
{
    use Sluggable;
    protected $table = 'p_products';
    protected $fieldEn = [
        'en_name', 'en_short_description', 'en_description'
    ];
    protected $fieldVi = [
        'name', 'short_description', 'description'
    ];
    protected $fillable = [
        'alias', 'p_category_id', 'p_vendor_id', 'product_code', 'product_code_fake', 'name', 'name_checkout', 'is_new', 'is_sale', 'is_show',
        'price', 'price_sale', 'price_agency1', 'price_agency2', 'unit', 'quantity', 'short_description', 'description', 'en_name', 'en_short_description', 'en_description', 'image_main_url',
        'slug'
    ];

    const UNIT_VND = 1;
    const UNIT_USD = 2;
    const UNIT_EURO = 3;
    public static $unit = [
        self::UNIT_VND => "VND",
        self::UNIT_USD => "USD",
        self::UNIT_EURO => "EURO"
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public static function getListProducts($page = 1, $limit = 10, $dataSearch)
    {
        $products = self::select('*')
            ->whereNull('deleted_at')
            ->with(['Images' => function ($q) {
                $q->select('id as id_image', 'p_product_id', 'url_thumb', 'description', 'is_show', 'is_main')
                    ->where('is_main', 1);
            }])
            ->with(['Options' => function ($q) {
                $q->select('id as id_option', 'p_product_id', 'display_type', 'display_name', 'value');
            }]);

        if (!empty($dataSearch)) {
            $products = $products->where(function ($query) use ($dataSearch) {
                $query->where('name', 'like', '%' . $dataSearch . '%')
                    ->orWhere('product_code', 'like', '%' . $dataSearch . '%');
            });
        }
        $products = $products->orderBy('created_at', 'DESC')
            ->paginate($limit, ['*'], 'page', $page);
        return $products;

    }

    public static function getListHotProducts($page = 1, $limit = 10)
    {
        $products = self::select('id', 'alias', 'p_category_id', 'p_vendor_id', 'product_code', 'name', 'is_new', 'is_sale', 'is_show',
            'price', 'price_sale', 'unit', 'quantity', 'short_description', 'description', 'en_name', 'en_short_description', 'en_description', 'image_main_url')
            ->whereNull('deleted_at')
            ->with(['Images' => function ($q) {
                $q->select('id as id_image', 'p_product_id', 'url_thumb', 'description', 'is_show', 'is_main')
                    ->where('is_main', 1);
            }])
            ->with(['Options' => function ($q) {
                $q->select('id as id_option', 'p_product_id', 'display_type', 'display_name', 'value');
            }]);

        if (!empty($dataSearch)) {
            $products = $products->where(function ($query) use ($dataSearch) {
                $query->where('name', 'like', '%' . $dataSearch . '%')
                    ->orWhere('product_code', 'like', '%' . $dataSearch . '%');
            });
        }
        $products = $products->orderBy('created_at', 'DESC')
            ->paginate($limit, ['*'], 'page', $page);
        return $products;

    }

    public static function getListNewProducts($limit = 10)
    {
        $products = self::select('id', 'alias', 'p_category_id', 'p_vendor_id', 'product_code', 'name', 'is_new', 'is_sale', 'is_show',
            'price', 'price_sale', 'unit', 'quantity', 'short_description', 'description', 'en_name', 'en_short_description', 'en_description', 'image_main_url')
            ->whereNull('deleted_at')
            ->where('is_new', self::STATUS_TRUE)
            ->with(['Images' => function ($q) {
                $q->select('id as id_image', 'p_product_id', 'url_thumb', 'description', 'is_show', 'is_main')
                    ->where('is_main', 1);
            }])
            ->with(['Options' => function ($q) {
                $q->select('id as id_option', 'p_product_id', 'display_type', 'display_name', 'value');
            }]);
        $products = $products->orderBy('created_at', 'DESC')
            ->take($limit)
            ->get();
        return $products;

    }

    public static function getListProductsByCategory($page = 1, $limit = 10, $categoryId, $sortBy = null)
    {
        $products = self::select('id', 'alias', 'p_category_id', 'p_vendor_id', 'product_code', 'name', 'is_new', 'is_sale', 'is_show',
            'price', 'price_sale', 'unit', 'quantity', 'short_description', 'description', 'en_name', 'en_short_description', 'en_description', 'image_main_url', 'slug')
            ->whereNull('deleted_at')
            ->where('p_category_id', $categoryId)
            ->with(['Images' => function ($q) {
                $q->select('id as id_image', 'p_product_id', 'url_thumb', 'description', 'is_show', 'is_main');
//                    ->where('is_main', ProductImage::IS_MAIN);
            }]);

        if (empty($sortBy)) {
            $sortBy = '';
        }
        switch ($sortBy) {
            case 'name':
                $products = $products->orderBy('name', 'ASC');
                break;
            case 'price':
                $products = $products->orderBy('price', 'ASC');
                break;
            case 'newest':
                $products = $products->orderBy('created_at', 'DESC');
                break;
            default:
                $products = $products->orderBy('created_at', 'DESC');
                break;
        }
        $products = $products->paginate($limit, ['*'], 'page', $page);
        return $products;

    }

    public static function getDetailProductByAlias($alias)
    {
        $product = self::select('*')
            ->where('alias', $alias)
            ->whereNull('deleted_at')
            ->with(['Images' => function ($q) {
                $q->select('id', 'id as id_image', 'p_product_id', 'url_thumb', 'url', 'description', 'is_show', 'is_main')
                    ->orderBy('is_main', 'DESC');
            }])
            ->with(['Options' => function ($q) {
                $q->select('id', 'id as id_option', 'p_product_id', 'display_type', 'display_name', 'value');
            }])
            ->with(['ProductCategory' => function ($q) {
                $q->select('id', 'id as id_category', 'name', 'description');
            }])
            ->with(['ProductVendor' => function ($q) {
                $q->select('id', 'id as id_vendor', 'name', 'phone_number', 'address', 'contact_email', 'description');
            }])
            ->with(['Options' => function ($q) {
                $q->select('id', 'id as id_option', 'p_product_id', 'display_type', 'display_name', 'value');
            }])
            ->first();
        if (empty($product)) {
            return [];
        }
        return $product->toArray();
    }

    public static function getDetailProductBySlug($slug)
    {
        $product = self::select('id', 'alias', 'p_category_id', 'p_vendor_id', 'product_code', 'name', 'is_new', 'is_sale', 'is_show',
            'price', 'price_sale', 'unit', 'quantity', 'short_description', 'description', 'en_name', 'en_short_description', 'en_description', 'image_main_url', 'slug')
            ->where('slug', $slug)
            ->whereNull('deleted_at')
            ->with(['Images' => function ($q) {
                $q->select('id', 'id as id_image', 'p_product_id', 'url_thumb', 'url', 'description', 'is_show', 'is_main')
                    ->orderBy('is_main', 'DESC');
            }])
            ->with(['Options' => function ($q) {
                $q->select('id', 'id as id_option', 'p_product_id', 'display_type', 'display_name', 'value');
            }])
            ->with(['ProductCategory' => function ($q) {
                $q->select('id', 'id as id_category', 'name', 'description', 'slug');
            }])
            ->with(['ProductVendor' => function ($q) {
                $q->select('id', 'id as id_vendor', 'name', 'phone_number', 'address', 'contact_email', 'description');
            }])
            ->with(['Options' => function ($q) {
                $q->select('id', 'id as id_option', 'p_product_id', 'display_type', 'display_name', 'value');
            }])
            ->first();
        if (empty($product)) {
            return [];
        }
        return $product->toArray();
    }

    public function Images()
    {
        return $this->hasMany('App\Models\ProductImage', 'p_product_id');
    }

    public function Options()
    {
        return $this->hasMany('App\Models\ProductOption', 'p_product_id');
    }

    public function ProductCategory()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'p_category_id');
    }

    public function ProductVendor()
    {
        return $this->belongsTo('App\Models\ProductVendor', 'p_vendor_id');
    }

    public static function IsCodeExist ($code) {
        return self::where('product_code',$code)->whereNull('deleted_at')->first();
    }
}