<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 4/9/2018
 * Time: 9:12 PM
 */

namespace App\Models;


class Setting extends AppModel
{
    const LANG_EN = 'en';
    const LANG_VI = 'vi';

    public static $language = [
        self::LANG_EN => 'English',
        self::LANG_VI => 'Vietnamese'
    ];
    protected $table = 'settings';
    protected $fillable = ['language', 'using_for_admin'];

    public static function getSettings()
    {
        $settings = self::whereNull('deleted_at')->first();
        if (empty($settings)) {
            $settings = self::initSetting();
        }
        return $settings->toArray();
    }

    public static function getLanguage($type = 'user')
    {
        $language = self::LANG_VI;
        $settings = self::whereNull('deleted_at')->first();
        if (!empty($settings)) {
            $language = $settings->language;
            if ($type != 'user') {
                $language = $settings->using_for_admin ? $settings->language : self::LANG_VI;
            }
        }
        return $language;
    }

    private static function initSetting()
    {
        try {
            $dataSetting = [
                'language' => self::LANG_EN,
                'using_for_admin' => self::STATUS_FALSE
            ];
            $setting = self::create($dataSetting);
            return $setting;
        } catch (\Exception $e) {
            abort(500);
        }
    }

}