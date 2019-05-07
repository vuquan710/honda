<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 9/15/2018
 * Time: 12:25 PM
 */

namespace App\Http\Controllers\Honda;


use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomesController extends UserAppController
{

    protected $dirView = 'HondaView.Homes.';

    public function index(Request $request)
    {
        return view($this->dirView . 'index');
    }

    public function aboutUs()
    {
        return view($this->dirView . 'aboutUs');
    }

    public function contactUs()
    {
        return view($this->dirView . 'contactUs');
    }

}