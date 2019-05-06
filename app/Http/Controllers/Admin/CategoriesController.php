<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/29/2017
 * Time: 3:33 PM
 */

namespace App\Http\Controllers\Admin;


use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;

class CategoriesController extends AdminAppController
{
    protected $dirView = 'AdminView.Categories.';
    protected static $glue = '|___';
    protected $dirImage;
    protected $dirImageThumb;

    public function __construct()
    {
        $this->dirImage = env('DIR_IMAGE_UPLOAD', 'uploads/');
        $this->dirImageThumb = env('DIR_THUMB_IMAGE_UPLOAD', 'uploads/thumbs/');
    }

    /**
     * View list Category
     * @return $this
     */
    public function index()
    {
        $listCategoriesTree = ProductCategory::getListCategories();
        $listCategories = self::getListOption($listCategoriesTree);
        return view($this->dirView . 'index')
            ->with('listCategories', $listCategories);
    }

    /**
     * View create Category
     * @return $this
     */
    public function create()
    {
        $listCategories = ProductCategory::getListCategories();
        $listOption = self::getListOption($listCategories);
        return view($this->dirView . 'create')
            ->with('listOption', $listOption)
            ->with('listCategories', $listCategories);
    }

    /**
     * Create new Category
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.categories.create')
                ->withErrors($validator)
                ->withInput();
        }
        if (!empty($request['parent_id'])) {
            $parent = ProductCategory::where('id', $request['parent_id'])
                ->whereNull('deleted_at')
                ->first();
            if (empty($parent)) {
                return redirect()->route('admin.categories.create')
                    ->withErrors(['Not found parent ID'])
                    ->withInput();
            }
            $data['level'] = $parent->level + 1;
            $data['parent_id'] = $parent->id;
            $data['created_by'] = Auth::guard('admin')->user()->id;
            $data['updated_by'] = Auth::guard('admin')->user()->id;
        }

        //Save data
        try {
            //Save image banner
            $url = null;
            if (!empty($data['url_banner'])) {
                $image = $data['url_banner'];
                $name = time() . '_' . $image->getClientOriginalName();
                $image->move($this->dirImage, $name);
                $url = $this->dirImage . $name;
            }
            //Save data
            $data['url_banner'] = $url;
            DB::beginTransaction();
            ProductCategory::create($data);
            DB::commit();
            return redirect()->route('admin.categories.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.categories.create')
                ->withErrors([$e->getMessage()])
                ->withInput();
        }
    }

    /**
     * View update Category
     * @param $id
     * @return $this
     */
    public function edit($id)
    {
        $category = ProductCategory::findByIdActive($id);
        if (empty($category)) {
            abort(404);
        }
        $listCategories = ProductCategory::getListCategories();
        $listOption = self::getListOption($listCategories);
        return view($this->dirView . 'edit')
            ->with('dirImage', $this->dirImage)
            ->with('category', $category->toArray())
            ->with('listOption', $listOption)
            ->with('listCategories', $listCategories);
    }

    /**
     * Update Category
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|void
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
        $category = ProductCategory::findByIdActive($id);
        if (empty($category)) {
            return abort(404);
        }
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.categories.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }
        $parent = ProductCategory::findByIdActive($data['parent_id']);
        $data['level'] = 1;
        if (!empty($parent)) {
            $data['level'] = $parent->level + 1;
        }
        try {
            //Update Image
            if (!empty($data['url_banner'])) {
                $image = $data['url_banner'];
                $name = time() . '_' . $image->getClientOriginalName();
                $image->move($this->dirImage, $name);
                $url = $this->dirImage . $name;
                $data['url_banner'] = $url;
                if (!empty($data['old_image'])) {
                    if (file_exists(public_path($data['old_image']))) {
                        unlink(public_path($data['old_image']));
                    }
                }
            }

            //Save Data
            DB::beginTransaction();
            $category->fill($data);
            $category->save();
            DB::commit();
            return redirect()->route('admin.categories.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.categories.edit', $id)
                ->withErrors([$e->getMessage()])
                ->withInput();
        };

    }

    /**
     * Function delete category
     * @param $id
     * @return string
     */
    public function destroy($id)
    {
        $category = ProductCategory::findByIdActive($id);
        if (empty($category)) {
            return json_encode(['status' => false, 'message' => 'Not found id!']);
        }
        try {
            DB::beginTransaction();
            $listChildren = ProductCategory::getListIdChildren($id);
            $listCategory = array_merge([$id], $listChildren);
            ProductCategory::whereIn('id', $listCategory)->delete();
            Product::whereIn('p_category_id', $listCategory)->delete();
            DB::commit();
            return json_encode(['status' => true, 'message' => 'Successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Function returns the list of options
     * @param $lists
     * @param array $data
     * @return array
     */
    public static function getListOption($lists, $data = [])
    {
        if (empty($lists)) {
            return $data;
        }
        foreach ($lists as $list) {
            $disableStatus = false;
            if ($list['level'] >= ProductCategory::MAX_LEVEL_CHILDREN) {
                $disableStatus = true;
            }
            $textName = $list['name'];
            $enTextName = $list['en_name'];
            if ($list['level'] > 1) {
                $textName = str_repeat(self::$glue, $list['level'] - 1) . $list['name'];
                $enTextName = str_repeat(self::$glue, $list['level'] - 1) . $list['en_name'];
            }
            $data[] = [
                'id' => $list['id'],
                'text_name' => $textName,
                'en_text_name' => $enTextName,
                'description' => $list['description'],
                'en_description' => $list['en_description'],
                'url_banner' => $list['url_banner'],
                'disable_status' => $disableStatus
            ];
            $data = self::getListOption($list['children'], $data);
        }
        return $data;
    }
}