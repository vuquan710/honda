<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/24/2017
 * Time: 4:32 PM
 */

namespace App\Http\Controllers\Admin;


use App\Models\Setting;
use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;

class UsersController extends AdminAppController
{
    protected $dirView = 'AdminView.Users.';

    public function index(Request $request)
    {
        $limit = self::LIMIT_DEFAULT_1;
        $page = self::PAGE_DEFAULT;
        if (!empty($request['limit'])) {
            $limit = $request['limit'];
        }
        if (!empty($request['page'])) {
            $page = $request['page'];
        }
        $listUsers = User::getListUsers($limit, $page);
        return view($this->dirView . 'index')
            ->with('listUsers', $listUsers);
    }

    public function show($alias, Request $request)
    {
        $user = User::findByAlias($alias);
        if (empty($user)) {
            abort(404, 'Not found User');
        }
        return view($this->dirView . 'show')
            ->with('user', $user);
    }

    public function destroy($id)
    {
        $user = User::findByAlias($id);
        if (empty($user)) {
            return json_encode(['status' => false, 'message' => 'Not found id!']);
        }
        try {
            DB::beginTransaction();
            User::where('alias', $id)->delete();
            DB::commit();
            return json_encode(['status' => true, 'message' => 'Successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function create()
    {
        $listCities = City::getListCities();
        return view($this->dirView . 'create')->with('listCities',$listCities);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $lang = Setting::getLanguage();
        $messValidate = [
            'email.required' => 'Username is not empty!',
            'password.required' => 'Password is not empty!'
        ];
        if ($lang == 'vi') {
            $messValidate = [
                'email.required' => 'Tên đăng nhập không được để trống',
                'password.required' => 'Password không được để trống'
            ];
        }
        $validator = Validator::make($data, [
            'email' => 'required|max:255',
            'password' => 'required|max:255'

        ], $messValidate);
        if ($validator->fails()) {
            return redirect()->route('admin.users.create')
                ->withErrors($validator)
                ->withInput();
        }

        $isUsernameExist = User::IsUserNameExist($data['email']);

        if ($isUsernameExist) {
            $mess = 'email is already exist';
            if ($lang == 'vi') {
                $mess = 'Tên đăng nhập đã tồn tại';
            }
            return redirect()->route('admin.users.create')
                ->withErrors($mess)
                ->withInput();
        }
        $data['created_by'] = Auth::guard('admin')->user()->id;
        $data['updated_by'] = Auth::guard('admin')->user()->id;
        $data['password'] = Hash::make($data['password']);

        //Save data
        try {
            DB::beginTransaction();
            User::create($data);
            DB::commit();
            return redirect()->route('admin.users.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.users.create')
                ->withErrors([$e->getMessage()])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $user = User::findByAliasJoin($id);
        $listCities = City::getListCities();
        if (empty($user)) {
            abort(404);
        }
        return view($this->dirView . 'edit')
            ->with(['user'=> $user,'listCities'=>$listCities]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findByAlias($id);
        if (empty($user)) {
            abort(404, 'Not found User');
        }
        $data = $request->all();

        $data['created_by'] = Auth::guard('admin')->user()->id;
        $data['updated_by'] = Auth::guard('admin')->user()->id;

        try {
            DB::beginTransaction();
            $user->fill($data);
            $user->save();
            DB::commit();
            return redirect()->route('admin.users.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.users.edit', $id)
                ->withErrors([$e->getMessage()])
                ->withInput();
        };
    }
}