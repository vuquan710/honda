<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/23/2017
 * Time: 8:34 PM
 */

namespace App\Models;


class ProductOption extends AppModel
{
    protected $table = 'p_product_options';
    protected $fillable = [
        'p_product_id', 'display_type', 'display_name', 'value'
    ];

    const DISPLAY_TYPE_CHECK_BOX = 1;
    const DISPLAY_TYPE_SELECT_BOX = 2;
    const DISPLAY_TYPE_RADIO_BOX = 3;
	 const DISPLAY_TYPE_COLOR_BOX = 4;

    const MAX_OPTION = 10;

    public static $displayType = [
        self::DISPLAY_TYPE_CHECK_BOX => "Check box",
        self::DISPLAY_TYPE_SELECT_BOX => "Select box",
        self::DISPLAY_TYPE_RADIO_BOX => "Radio box",
		 self::DISPLAY_TYPE_COLOR_BOX =>'Color Box',
    ];
}