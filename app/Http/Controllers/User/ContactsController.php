<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/7/2017
 * Time: 6:02 PM
 */

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Validator, Mail;

class ContactsController extends AppUserController
{
    protected $rootView = 'UserView.Contacts.';

    public function index(Request $request)
    {
        $news1 = News::findByIdActive(1);
        $news2 = News::findByIdActive(2);
        return view($this->rootView . 'index')
            ->with('news1', $news1)
            ->with('news2', $news2);
    }

    public function send(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'mobile' => 'required|max:11',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.contacts.index')
                ->withErrors($validator)
                ->withInput();
        }
        $datasend = [
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'info' => $data['info'],
        ];
        Mail::send('UserView.AppLayouts.mail', $datasend, function ($msg) {
            $msg->from('noreply@aodongluc.vn', 'Áo động lực');
            $msg->to('nguyenxuanluan93@gmail.com', 'Luân Nguyễn')->subject('Contact from customer');
        });
        return redirect()->route('user.contacts.index');
    }
}