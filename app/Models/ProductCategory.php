<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/15/2017
 * Time: 9:33 PM
 */

namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;

class ProductCategory extends AppModel
{
    use Sluggable;
    const MAX_LEVEL_CHILDREN = 2;

    protected $table = 'p_categories';
    protected $fillable = [
        'name', 'description', 'level', 'parent_id', 'created_by', 'updated_by', 'deleted_by',
        'en_name', 'en_description', 'slug', 'url_banner'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public static function getListCategories()
    {
        $listRoot = self::whereNull('deleted_at')
            ->whereNull('parent_id')
            ->orderBy('level', 'ASC')
            ->get()
            ->toArray();
        if (empty($listRoot)) {
            return $listRoot;
        }
        $lists = [];
        foreach ($listRoot as $root) {
            $newData = $root;
            $newData['children'] = self::getListChildren($root);
            $lists[] = $newData;
        }
        return $lists;
    }

    protected static function getListChildren($root, $data = [])
    {
        $listChild = self::whereNull('deleted_at')
            ->where('parent_id', $root['id'])
            ->with(['Product' => function ($q) {
                $q->select('id', 'alias', 'p_category_id', 'name', 'image_main_url', 'price', 'unit')
                    ->limit(2)
                    ->orderBy('created_at', 'DESC')
                    ->get();
            }])
            ->orderBy('level', 'ASC')
            ->get()
            ->toArray();
        foreach ($listChild as $child) {
            $newData = $child;
            $newData['children'] = self::getListChildren($child);
            $data[] = $newData;
        }
        return $data;
    }

    public static function getListChildCategorys($page = 1, $limit = 10, $parentid)
    {
        $listChild = self::select('id', 'name', 'en_name', 'created_at')->whereNull('deleted_at')
            ->where('parent_id', $parentid)
            ->orderBy('level', 'ASC');

        if (empty($listChild)) {
            return $listChild;
        }

        $products = $listChild->orderBy('created_at', 'DESC')
            ->paginate($limit, ['*'], 'page', $page);
        return $products;

    }

    public static function getListIdChildren($parent)
    {
        $listChild = self::select('id')->whereNull('deleted_at')
            ->where('parent_id', $parent)
            ->orderBy('level', 'ASC')
            ->get()
            ->toArray();
        $listId = [];
        foreach ($listChild as $child) {
            $listId[] = $child['id'];
            $listId = array_merge($listId, self::getListIdChildren($child));
        }
        return $listId;
    }

    public function Product()
    {
        return $this->hasMany(Product::class, 'p_category_id', 'id');
    }


}