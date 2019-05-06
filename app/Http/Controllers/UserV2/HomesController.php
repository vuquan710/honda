<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 5/16/2018
 * Time: 5:10 PM
 */

namespace App\Http\Controllers\UserV2;


use App\Models\Product;
use Illuminate\Http\Request;
use Validator;
use Mail;

class HomesController extends UserAppController
{
    protected $dirView = 'UserViewV2.Homes.';

    public function index(Request $request)
    {
        $limit = 4;
        $page = 1;
        $listProducts = Product::getListHotProducts($page, $limit);
        return view($this->dirView . 'index')
            ->with('listProducts', $listProducts);
    }

    public function contact()
    {
        return view($this->dirView . 'contact');
    }

    public function postSaveContact(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone_number' => 'required|max:11',
            'subject' => 'required',
        ]);

        if ($validator->fails()) {
            return json_encode(['status' => false, 'messages' => __('messages.UserV2.cac_truong_bat_buoc_khong_duoc_de_trong') . '!']);
        }
        $dataSend = [
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['phone_number'],
            'info' => $data['subject'],
        ];
        Mail::send('UserView.AppLayouts.mail', $dataSend, function ($msg) {
            $msg->from('noreply@aodongluc.vn', 'Áo động lực');
            $msg->to('nguyenxuanluan93@gmail.com', 'Luân Nguyễn')->subject('Contact from customer');
        });
        return json_encode(['status'=>true, 'messages'=>__('messages.UserV2.cam_on_ban_da_phan_hoi').'!']);
    }
	public function search(Request $request)
    {
       
		$keyword=!empty($request['keyword']) ? $request['keyword'] : '';
       
        return redirect()->route('user.v2.homes.show',[ 'keyword' => $keyword ]);
           
    }
	public function show(Request $request)
    {
        $limit = 4;
        $page = 1;
		$limit = !empty($request['limit']) ? $request['limit'] : $this->limit;
        $page = !empty($request['page']) ? $request['page'] : $this->page;
        $sortBy = !empty($request['sort']) ? $request['sort'] : null;
		$dataSearch=!empty($request['keyword']) ? $request['keyword'] : '';
        $listProducts = Product::getListProducts($page, $limit,$dataSearch);
        return view($this->dirView . 'show')
           ->with('listProducts', $listProducts)
            ->with('sort', $sortBy);
    }
}