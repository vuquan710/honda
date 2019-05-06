<?php

namespace App\Widgets;

use App\Models\NewsCategory;
use Arrilot\Widgets\AbstractWidget;

class FashionNavbar extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        $newCategories = NewsCategory::getListNewCategory();
//        dd($newCategories);
        return view('widgets.fashion_navbar', [
            'config' => $this->config,
            'newCategories' => $newCategories
        ]);
    }
}
