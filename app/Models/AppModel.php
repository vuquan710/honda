<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/7/2017
 * Time: 6:42 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AppModel extends Authenticatable
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    const STATUS_FALSE = 0;
    const STATUS_TRUE = 1;
    public static $status = [
        self::STATUS_FALSE => 'No',
        self::STATUS_TRUE => 'Yes'
    ];

    protected $lang;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->lang = App::getLocale();
    }

    public static function boot()
    {
        parent::boot();
        $request = Request();
        static::creating(function ($data) use ($request) {
            if (!empty($request->route())) {
                $action = $request->route()->getAction();
                if (isset($action['uses']) && is_string($action['uses']) && strpos($action['uses'],
                        'App\Http\Controllers\Admin') === false
                ) {
                    if (!empty(Auth::user())) {
                        $data->created_by = Auth::user()->id;
                        $data->updated_by = Auth::user()->id;
                    }
                } else {
                    if (!empty(Auth::guard('admin')->user())) {
                        $data->created_by = Auth::guard('admin')->user()->id;
                        $data->updated_by = Auth::guard('admin')->user()->id;
                    }
                }
            }
            $data->created_at = date('Y-m-d H:i:s');
            $data->updated_at = date('Y-m-d H:i:s');
        });

        static::updating(function ($data) use ($request) {
            if (!empty($request->route())) {
                $action = $request->route()->getAction();
                if (isset($action['uses']) && is_string($action['uses']) && strpos($action['uses'],
                        'App\Http\Controllers\Admin') === false
                ) {
                    if (!empty(Auth::user())) {
                        $data->updated_by = Auth::user()->id;
                    }
                } else {
                    if (!empty(Auth::guard('admin')->user())) {
                        $data->updated_by = Auth::guard('admin')->user()->id;
                    }
                }
            }
            $data->updated_at = date('Y-m-d H:i:s');
        });
    }

    public static function findByIdActive($id, $field = null)
    {
        $item = self::where('id', '=', $id)->first();

        if (!$item) {
            return null;
        }

        if (!$field) {
            return $item;
        }

        return @$item->{$field};

    }

    public static function findBySlug($slug, $field = null)
    {
        $item = self::where('slug', '=', $slug)->first();

        if (!$item) {
            return null;
        }

        if (!$field) {
            return $item;
        }

        return @$item->{$field};

    }

    public static function findByAlias($alias, $field = null)
    {
        $item = self::where('alias', '=', $alias)->first();

        if (!$item) {
            return null;
        }

        if (!$field) {
            return $item;
        }

        return @$item->{$field};

    }

}