<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/7/2017
 * Time: 6:42 PM
 */

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

class NewsCategory extends AppModel
{
    use Sluggable;
    protected $table = 'news_categories';
    protected $fillable = [
        'position', 'name', 'meta_title', 'meta_keywords', 'meta_description', 'description', 'title', 'content',
        'en_name', 'en_meta_title', 'en_meta_keywords', 'en_meta_description', 'en_description',
        'is_show', 'background_image', 'is_show_on_menu', 'slug'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public static function getListNewCategory()
    {
        $newCat = self::get()->toArray();
        return $newCat;
    }

    public static function getListNewCategoryIntro($page = 1, $limit = 10)
    {
        $newCat = self::orderBy('created_at', 'DESC')->whereNotIn('id', [1])
            ->paginate($limit, ['*'], 'page', $page);//->toArray();
        return $newCat;
    }

    public static function getDetailNewCategory($id)
    {
        $newCat = self::where('id', $id)->get();
        return $newCat;
    }

}