<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/29/2017
 * Time: 1:37 PM
 */

namespace App\Http\Controllers\Admin;


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
use Validator;

class ProductsController extends AdminAppController
{
    protected $dirView = 'AdminView.Products.';
    protected $dirImage;
    protected $dirImageThumb;

    public function __construct()
    {
        $this->dirImage = env('DIR_IMAGE_UPLOAD', 'uploads/');
        $this->dirImageThumb = env('DIR_THUMB_IMAGE_UPLOAD', 'uploads/thumbs/');
    }

    public function index(Request $request)
    {
        $page = !empty($request['page']) ? $request['page'] : 1;
        $limit = !empty($request['limit']) ? $request['limit'] : self::LIMIT_DEFAULT_1;
        $dataSearch = $request['search'];
        $listProducts = Product::getListProducts($page, $limit, $dataSearch);
        return view($this->dirView . 'index')
            ->with('listProducts', $listProducts)
            ->with('dataSearch', $dataSearch);
    }

    public function create()
    {
        $listCategories = ProductCategory::getListCategories();
        $listOptionCategories = CategoriesController::getListOption($listCategories);

        $vendors = ProductVendor::getListProductVendors();
        return view($this->dirView . 'create')
            ->with('listOptionCategories', $listOptionCategories)
            ->with('vendors', $vendors);
    }

    public function store(Request $request)
    {
        $dataValidate = $request->all();

        $validator = Validator::make($dataValidate, [
            'name' => 'required|max:255',
            'product_code' => 'required|max:255',
            'p_category_id' => 'required',
            'price' => 'min:0',
//            'quantity' => 'min:0',
//            'price_sale' => 'min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.products.create')
                ->withErrors($validator)
                ->withInput();
        }

        $staff = Auth::guard('admin')->user();
        $dataProduct = [
            'p_category_id' => $request['p_category_id'],
            'p_vendor_id' => $request['p_vendor_id'],
            'product_code' => $request['product_code'],
            'product_code_fake' => $request['product_code_fake'],
            'name' => $request['name'],
            'name_checkout' => $request['name_checkout'],
//            'en_name' => $request['en_name'],
            'is_new' => !empty($request['is_new']) ? 1 : 0,
            'is_sale' => !empty($request['is_sale']) ? 1 : 0,
            'is_show' => !empty($request['is_show']) ? 1 : 0,
            'price' => $request['price'],
            'price_agency1' => $request['price_agency1'],
            'price_agency2' => $request['price_agency2'],
//            'price_sale' => $request['price_sale'],
            'unit' => $request['unit'],
//            'quantity' => $request['quantity'],
//            'short_description' => $request['short_description'],
//            'en_short_description' => $request['en_short_description'],
//            'en_description' => $request['en_description'],
//            'description' => $request['description'],

        ];
        try {
            DB::begintransaction();
            $images = $this->saveAndCreateImageThumb($request['images']);
            $product = Product::create($dataProduct);
            $urlMain = null;
            //Create image
            if (!empty($images)) {
                foreach ($images as $keyImg => $image) {
                    $dataImage = [
                        'p_product_id' => $product->id,
                        'description' => $image['description'],
                        'url_thumb' => $this->dirImageThumb . $image['name'],
                        'url' => $this->dirImage . $image['name'],
                        'is_show' => $image['is_show'],
                        'is_main' => $request['image_main'] == $keyImg ? true : false
                    ];
                    if ($request['image_main'] == $keyImg) {
                        $urlMain = $this->dirImage . $image['name'];
                    }
                    ProductImage::create($dataImage);
                }
            }
            //Create Options
            if (!empty($request['options'])) {
                foreach ($request['options'] as $option) {
                    if (!empty($option['display_type'])) {
                        $valueOption = $this->handleValueOption($option['value']);
                        $dataOption = [
                            'p_product_id' => $product->id,
                            'display_type' => $option['display_type'],
                            'display_name' => $option['display_name'],
                            'value' => json_encode($valueOption)
                        ];
                        ProductOption::create($dataOption);
                    }
                }
            }
            $product->fill(['image_main_url' => $urlMain]);
            $product->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.products.create')
                ->withErrors(['message' => $e->getMessage()])
                ->withInput();
        }
        return redirect()->route('admin.products.index');
    }

    public function destroy($alias)
    {
        $product = Product::findByAlias($alias);
        if (empty($product)) {
            return json_encode(['status' => false, 'message' => 'Not found id!']);
        }
        try {
            DB::beginTransaction();
            Product::where('id', $product->id)->delete();
            DB::commit();
            return json_encode(['status' => true, 'message' => 'Successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
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
            $noImage = [
                "p_product_id" => 1,
                "url_thumb" => "img/noimage.png",
                "description" => null,
                "is_show" => 1,
                "is_main" => 1
            ];
            $product['imageMain'] = $noImage;
            $product['images'][] = $noImage;
        }

        $comments = ProductComment::getListComment();
        $reviews = ProductReview::getListReview();

        return view($this->dirView . 'show')
            ->with('product', $product)
            ->with('reviews', $reviews)
            ->with('comments', $comments);
    }

    public function edit($alias)
    {
        $product = Product::getDetailProductByAlias($alias);
        $comments = ProductComment::getListComment();
        $reviews = ProductReview::getListReview();
        $vendors = ProductVendor::getListProductVendors();
        $listCategories = ProductCategory::getListCategories();
        $listOptionCategories = CategoriesController::getListOption($listCategories);
        return view($this->dirView . 'edit')
            ->with('product', $product)
            ->with('dirThumb', $this->dirImageThumb)
            ->with('vendors', $vendors)
            ->with('listOptionCategories', $listOptionCategories)
            ->with('reviews', $reviews)
            ->with('comments', $comments);
    }

    public function update(Request $request, $alias)
    {
        $staff = Auth::guard('admin')->user();
        $product = Product::findByAlias($alias);
        if (empty($product)) {
            abort(400);
        }

        $dataValidate = $request->all();
        $validator = Validator::make($dataValidate, [
            'name' => 'required|max:255',
//            'en_name' => 'required|max:255',
            'product_code' => 'required|max:255',
            'p_category_id' => 'required',
            'price' => 'min:0',
//            'quantity' => 'min:0',
//            'price_sale' => 'min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.products.edit', $alias)
                ->withErrors($validator)
                ->withInput();
        }

        $dataProduct = [
            'p_category_id' => $request['p_category_id'],
            'p_vendor_id' => $request['p_vendor_id'],
            'product_code' => $request['product_code'],
            'product_code_fake' => $request['product_code_fake'],
            'name' => $request['name'],
            'name_checkout' => $request['name_checkout'],
//            'en_name' => $request['en_name'],
            'is_new' => !empty($request['is_new']) ? 1 : 0,
            'is_sale' => !empty($request['is_sale']) ? 1 : 0,
            'is_show' => !empty($request['is_show']) ? 1 : 0,
            'price' => $request['price'],
            'price_agency1' => $request['price_agency1'],
            'price_agency2' => $request['price_agency2'],
//            'price_sale' => $request['price_sale'],
            'unit' => $request['unit'],
//            'quantity' => $request['quantity'],
//            'short_description' => $request['short_description'],
//            'en_short_description' => $request['en_short_description'],
//            'en_description' => $request['en_description'],
//            'description' => $request['description'],
        ];
        try {
            DB::begintransaction();
            $product->fill($dataProduct)->save();
            //Update image
            $images = $this->updateImagesProduct($request['images'], $request['image_main']);
            //delete old image
            $oldImagesDelete = ProductImage::select('id', 'url', 'url_thumb')->where('p_product_id', $product->id);
            if (!empty($images['idOld'])) {
                $oldImagesDelete = $oldImagesDelete->whereNotIn('id', $images['idOld']);
            }
            $oldImagesDelete = $oldImagesDelete->get()->toArray();
            foreach ($oldImagesDelete as $oldImageDelete) {
                if (file_exists(public_path($oldImageDelete['url']))) {
                    unlink(public_path($oldImageDelete['url']));
                }
                if (file_exists(public_path($oldImageDelete['url_thumb']))) {
                    unlink(public_path($oldImageDelete['url_thumb']));
                }
            }
            ProductImage::where('p_product_id', $product->id)->forceDelete();
            $urlMain = null;
            //insert new image
            if (!empty($images['linkImage'])) {
                foreach ($images['linkImage'] as $keyImg => $image) {
                    $dataImage = [
                        'p_product_id' => $product->id,
                        'description' => $image['description'],
                        'url_thumb' => $this->dirImageThumb . $image['name'],
                        'url' => $this->dirImage . $image['name'],
                        'is_show' => $image['is_show'],
                        'is_main' => $request['image_main'] == $keyImg ? true : false
                    ];
                    if ($request['image_main'] == $keyImg) {
                        $urlMain = $this->dirImage . $image['name'];
                    }
                    ProductImage::create($dataImage);
                }
            }

            //Update Options
            ProductOption::where('p_product_id', $product->id)->forceDelete();
            if (!empty($request['options'])) {
                foreach ($request['options'] as $option) {
                    if (!empty($option['display_type'])) {
                        $valueOption = $this->handleValueOption($option['value']);
                        $dataOption = [
                            'p_product_id' => $product->id,
                            'display_type' => $option['display_type'],
                            'display_name' => $option['display_name'],
                            'value' => json_encode($valueOption)
                        ];
                        ProductOption::create($dataOption);
                    }
                }
            }
            $product->fill(['image_main_url' => $urlMain])->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.products.edit', $alias)
                ->withErrors(['message' => $e->getMessage()])
                ->withInput();
        }
        return redirect()->route('admin.products.index', $alias);
    }

    private function saveAndCreateImageThumb($images = [])
    {
        $linkImage = [];
        if (!empty($images)) {
            foreach ($images as $image) {
                if (!empty($image['image'])) {
                    $isShow = isset($image['is_show']) ? true : false;
                    $description = empty($image['description']) ? null : $image['description'];
                    $image = $image['image'];
                    list($width, $height) = getimagesize($image->getPathName());
                    $name = time() . '_' . $image->getClientOriginalName();
                    $image->move($this->dirImage, $name);
                    $pathName = $this->dirImage . $name;
                    $img = Image::make($pathName);
                    $img->resize(320, 320 * $height / $width);
                    $img->save($this->dirImageThumb . $name);
                    $newImage = [
                        'name' => $name,
                        'is_show' => $isShow,
                        'description' => $description
                    ];
                    array_push($linkImage, $newImage);
                }
            }
        }
        return $linkImage;
    }

    private function handleValueOption($options = [])
    {
        $data = [];
        foreach ($options as $option) {
            if (!empty($option['val'])) {
                array_push($data, $option);
            }
        }
        return $data;
    }

    private function updateImagesProduct($images)
    {
        $linkImage = [];
        $idOld = [];
        if (!empty($images)) {
            foreach ($images as $key => $image) {
                $isShow = isset($image['is_show']) ? true : false;
                $description = empty($image['description']) ? null : $image['description'];
                $id = !empty($image['id_image']) ? $image['id_image'] : null;
                $name = !empty($image['old_image']) ? $image['old_image'] : null;
                if (!empty($image['image'])) {
                    $image = $image['image'];
                    list($width, $height) = getimagesize($image->getPathName());
                    $name = time() . '_' . $image->getClientOriginalName();
                    $image->move($this->dirImage, $name);
                    $pathName = $this->dirImage . $name;
                    $img = Image::make($pathName);
                    $img->resize(320, 320 * $height / $width);
                    $img->save($this->dirImageThumb . $name);
                } else {
                    if (!empty($id)) {
                        array_push($idOld, $id);
                    }
                }
                if (!empty($name)) {
                    $newImage = [
                        'name' => $name,
                        'is_show' => $isShow,
                        'description' => $description
                    ];
                    $linkImage[$key] = $newImage;
                }
            }
        }
        $data = [
            'idOld' => $idOld,
            'linkImage' => $linkImage
        ];
        return $data;
    }
}