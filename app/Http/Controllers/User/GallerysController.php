<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/7/2017
 * Time: 6:02 PM
 */

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Validator;
class GallerysController extends AppUserController
{
    protected $rootView = 'UserView.Gallerys.';

    public function index(Request $request)
    {
		
        return view($this->rootView . 'index');
		
    }

}