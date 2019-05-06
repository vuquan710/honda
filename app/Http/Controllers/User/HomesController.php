<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/7/2017
 * Time: 6:02 PM
 */

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use URL;

class HomesController extends AppUserController
{
    protected $rootView = 'UserView.Homes.';

    public function index(Request $request)
    {  
     
        return view($this->rootView . 'index');
    }
    public function changelang($lang='vi'){
	
		if(! in_array($lang, ['vi','en'])){
			$lang = 'vi';
		}
		Session::put('User.language',$lang);
		
	return  redirect(url(URL::previous()));}
}