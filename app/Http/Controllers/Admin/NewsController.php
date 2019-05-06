<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/29/2017
 * Time: 1:37 PM
 */

namespace App\Http\Controllers\Admin;


use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Validator;

class NewsController extends AdminAppController
{
    protected $dirView = 'AdminView.News.';
    protected $dirImageNew;

    public function __construct()
    {
        $this->dirImageNew = env('DIR_IMAGE_NEW_UPLOAD', 'img/news_images/');
    }

    public function index(Request $request)
    {
        $page = !empty($request['page']) ? $request['page'] : 1;
        $limit = self::LIMIT_DEFAULT_1;
        $dataSearch = $request['search'];
        $listNews = News::getListNews($page, $limit, $dataSearch);
        $listNewsCategories = NewsCategory::getListNewCategory();
        return view($this->dirView . 'index')
            ->with('listNews', $listNews)
            ->with('listNewsCategories', $listNewsCategories)
            ->with('dataSearch', $dataSearch);
    }

    public function create()
    {
        $listNewsCategories = NewsCategory::getListNewCategory();
        return view($this->dirView . 'create')
            ->with('listNewsCategories', $listNewsCategories);
    }

    public function store(Request $request)
    {
        $staff = Auth::guard('admin')->user();
        if ($request->hasFile('small_image')) {
            $file = $request->small_image;
            $nameUpload = $file->getClientOriginalName();
            $nameDB = $this->dirImageNew . $nameUpload;
            $file->move($this->dirImageNew, $nameUpload);
        } else {
            $nameDB = "";
        }
        $datanews = [
            'news_category_id' => $request['news_category_id'],
            'short_description' => $request['short_description'],
            'meta_keywords' => $request['meta_keywords'],
            'meta_title' => $request['meta_title'],
            'meta_description' => $request['product_code'],
            'title' => $request['title'],
            'is_show' => !empty($request['is_show']) ? 1 : 0,
            'content' => $request['content'],
            'small_image' => $nameDB,
            'en_short_description' => $request['en_short_description'],
            'en_meta_keywords' => $request['en_meta_keywords'],
            'en_meta_title' => $request['en_meta_title'],
            'en_meta_description' => $request['product_code'],
            'en_title' => $request['en_title'],
            'en_content' => $request['en_content'],
        ];
        //Upload image
        try {
            DB::begintransaction();
            $news = News::create($datanews);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.news.create')
                ->withErrors(['message' => $e->getMessage()])
                ->withInput();
        }
        return redirect()->route('admin.news.index');
    }

    public function destroy($id)
    {
        $new = News::findByIdActive($id);
        if (empty($new)) {
            return json_encode(['status' => false, 'message' => 'Not found id!']);
        }
        try {
            DB::beginTransaction();
            News::where('id', $new->id)->delete();
            DB::commit();
            return json_encode(['status' => true, 'message' => 'Successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {

        $news = News::findByIdActive($id);
        if (empty($news)) {
            abort(404);
        }
        $listNewsCategories = NewsCategory::getListNewCategory();
        return view($this->dirView . 'edit')
            ->with('news', $news->toArray())
            ->with('dirThumb', $this->dirImageNew)
            ->with('listNewsCategories', $listNewsCategories);
    }

    public function show($id)
    {
        $new = News::findByIdActive($id);
        $listNewsCategories = NewsCategory::getListNewCategory();
        if (empty($new)) {
            abort(400);
        }
        if (empty($new['small_image'])) {
            $new['small_image'] = 'img/noimage.png';
        }

        return view($this->dirView . 'show')
            ->with('new', $new)
            ->with('NewsCategory', $listNewsCategories);
    }

    /**
     * Update New
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|void
     */
    public function update(Request $request, $id)
    {
        $new = News::findByIdActive($id);
        if (empty($new)) {
            return abort(404);
        }
        $file = $request->small_image;
        if (empty($request->small_image)) {
            $data = [
                'news_category_id' => $request['news_category_id'],
                'short_description' => $request['short_description'],
                'meta_keywords' => $request['meta_keywords'],
                'meta_title' => $request['meta_title'],
                'meta_description' => $request['product_code'],
                'title' => $request['title'],
                'is_show' => !empty($request['is_show']) ? 1 : 0,
                'content' => $request['content'],
                'small_image' => $request['old_small_image'],
                'en_short_description' => $request['en_short_description'],
                'en_meta_keywords' => $request['en_meta_keywords'],
                'en_meta_title' => $request['en_meta_title'],
                'en_meta_description' => $request['product_code'],
                'en_title' => $request['en_title'],
                'en_content' => $request['en_content'],
            ];
        } else {
            $data = [
                'news_category_id' => $request['news_category_id'],
                'short_description' => $request['short_description'],
                'meta_keywords' => $request['meta_keywords'],
                'meta_title' => $request['meta_title'],
                'meta_description' => $request['product_code'],
                'title' => $request['title'],
                'is_show' => !empty($request['is_show']) ? 1 : 0,
                'content' => $request['content'],
                'small_image' => $this->dirImageNew . $file->getClientOriginalName(),
                'en_short_description' => $request['en_short_description'],
                'en_meta_keywords' => $request['en_meta_keywords'],
                'en_meta_title' => $request['en_meta_title'],
                'en_meta_description' => $request['product_code'],
                'en_title' => $request['en_title'],
                'en_content' => $request['en_content'],
            ];

        }

        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'en_content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.news.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }
        try {
            DB::beginTransaction();
            if ($request->hasFile('small_image')) {
                $file->move($this->dirImageNew, $file->getClientOriginalName());
            }
            $new->fill($data);
            $new->save();
            DB::commit();
            return redirect()->route('admin.news.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.news.edit', $id)
                ->withErrors([$e->getMessage()])
                ->withInput();
        };

    }
}