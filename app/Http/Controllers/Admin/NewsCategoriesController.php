<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/29/2017
 * Time: 3:33 PM
 */

namespace App\Http\Controllers\Admin;


use App\Models\NewsCategory;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class NewsCategoriesController extends AdminAppController
{
    protected $dirView = 'AdminView.NewsCategories.';
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
        $listNewsCategories = NewsCategory::getListNewCategory();
        return view($this->dirView . 'index')
            ->with('listNewsCategories', $listNewsCategories);
    }

    /**
     * View create News Category
     * @return $this
     */
    public function create()
    {
        return view($this->dirView . 'create');
    }

    /**
     * Create new Category
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $staff = Auth::guard('admin')->user();
        $data = $request->all();
        $position = NewsCategory::select('position')->orderBy('position', 'DESC')->first();
        $data['is_show_on_menu'] = empty($request['is_show_on_menu']) ? false : true;
        $data['is_show'] = empty($request['is_show']) ? false : true;
        $data['position'] = 1;
        if (!empty($position)) {
            $data['position'] = $position->position + 1;
        }
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'en_name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.news_categories.create')
                ->withErrors($validator)
                ->withInput();
        }
        //Save data
        try {
            //Save Image
            $image = self::storeImage($request['background_image'], $this->dirImage, $this->dirImageThumb);
            $data['background_image'] = @$image[0];
            //Create data
            DB::beginTransaction();
            NewsCategory::create($data);
            DB::commit();
            return redirect()->route('admin.news_categories.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.news_categories.create')
                ->withErrors([$e->getMessage()])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $newscategory = NewsCategory::findByIdActive($id);
        if (empty($newscategory)) {
            abort(404);
        }
        return view($this->dirView . 'edit')
            ->with('newscategory', $newscategory->toArray());
    }

    /**
     * Update Category
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|void
     */
    public function update(Request $request, $id)
    {
        $newscategory = NewsCategory::findByIdActive($id);
        if (empty($newscategory)) {
            return abort(404);
        }
        $data = $request->all();
        $data['is_show_on_menu'] = empty($request['is_show_on_menu']) ? false : true;
        $data['is_show'] = empty($request['is_show']) ? false : true;
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'en_name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.news_categories.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }
        try {
            if (empty($request['background_image'])) {
                $data['background_image'] = $request['old_background_image'];
            } else {
                $image = self::storeImage($request['background_image'], $this->dirImage, $this->dirImageThumb);
                $data['background_image'] = @$image[0];
            }
            DB::beginTransaction();
            $newscategory->fill($data);
            $newscategory->save();
            DB::commit();
            return redirect()->route('admin.news_categories.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.news_categories.edit', $id)
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
        $newscategory = NewsCategory::findByIdActive($id);
        if (empty($newscategory)) {
            return json_encode(['status' => false, 'message' => 'Not found id!']);
        }
        try {
            DB::beginTransaction();
            NewsCategory::where('id', $newscategory->id)->delete();
            News::where('news_category_id', $newscategory->id)->delete();
            DB::commit();
            return json_encode(['status' => true, 'message' => 'Successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
    }


}