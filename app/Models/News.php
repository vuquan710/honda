<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/7/2017
 * Time: 6:42 PM
 */

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

class News extends AppModel
{
    use Sluggable;
    protected $table = 'news';
    protected $fillable = [
        'news_category_id', 'small_image', 'short_description', 'meta_keywords', 'meta_title', 'meta_description',
        'title', 'content', 'is_show', 'en_short_description', 'en_meta_keywords', 'en_meta_title', 'en_meta_description',
        'en_title', 'en_content', 'slug'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['title']
            ]
        ];
    }

    /**
     * Relation with table new_categories
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function newsCategory()
    {
        return $this->belongsTo('App\Models\NewsCategory', 'news_category_id', 'id');
    }

    /**
     * Get Detail News with id
     * @param null $id
     * @return array
     */

    public static function getListNews($page = 1, $limit = 10, $dataSearch)
    {
        $news = self::select('id', 'news_category_id', 'small_image', 'short_description', 'meta_keywords', 'meta_title', 'meta_description', 'title', 'content', 'en_short_description', 'en_meta_keywords', 'en_meta_title', 'en_meta_description',
            'en_title', 'en_content', 'is_show', 'created_at', 'updated_at', 'created_by', 'updated_by')
            ->whereNull('deleted_at');
        if (!empty($dataSearch)) {
            $news = $news->where(function ($query) use ($dataSearch) {
                $query->where('title', 'like', '%' . $dataSearch . '%')->orWhere('en_title', 'like', '%' . $dataSearch . '%')
                    ->orWhere('short_description', 'like', '%' . $dataSearch . '%')->orWhere('en_short_description', 'like', '%' . $dataSearch . '%');
            });
        }
        $news = $news->paginate($limit, ['*'], 'page', $page);
        return $news;

    }

    public static function getListNewsByCategoryId($id, $page = 1, $limit = 10, $dataSearch = null)
    {
        $news = self::select('id', 'news_category_id', 'small_image', 'short_description', 'meta_keywords', 'meta_title', 'meta_description', 'title', 'content', 'en_short_description', 'en_meta_keywords', 'en_meta_title', 'en_meta_description',
            'en_title', 'en_content', 'is_show', 'slug', 'created_at', 'updated_at', 'created_by', 'updated_by')
            ->whereNull('deleted_at')
            ->where('news_category_id', $id)
            ->with(['Staff' => function ($q) {
                $q->select('id', 'first_name', 'last_name');
            }])
            ->orderBy('created_at', 'DESC');
        if (!empty($dataSearch)) {
            $news = $news->where(function ($query) use ($dataSearch) {
                $query->where('title', 'like', '%' . $dataSearch . '%')->orWhere('en_title', 'like', '%' . $dataSearch . '%')
                    ->orWhere('short_description', 'like', '%' . $dataSearch . '%')->orWhere('en_short_description', 'like', '%' . $dataSearch . '%');
            });
        }
        $news = $news->paginate($limit, ['*'], 'page', $page);
        return $news;

    }

    public static function getDetailNews($id)
    {
        $new = self::select('id', 'news_category_id', 'small_image', 'short_description', 'meta_keywords', 'meta_title', 'meta_description', 'title', 'content', 'is_show', 'en_short_description', 'en_meta_keywords', 'en_meta_title', 'en_meta_description',
            'en_title', 'en_content')
            ->where('id', $id)
            ->whereNull('deleted_at')
            ->with(['NewsCategory' => function ($q) {
                $q->select('id', 'name', 'description', 'name_en', 'description_en');
            }]);
        if (empty($new)) {
            return [];
        }
        return $new;
    }

    public function Staff()
    {
        return $this->belongsTo('App\Models\Staff', 'updated_by', 'id');
    }
}