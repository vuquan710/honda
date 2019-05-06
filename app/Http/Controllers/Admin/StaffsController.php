<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/24/2017
 * Time: 4:32 PM
 */

namespace App\Http\Controllers\Admin;


use App\Models\Staff;
use App\Models\Setting;
use Illuminate\Http\Request;
use Validator;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffsController extends AdminAppController
{
    protected $dirView = 'AdminView.Staffs.';

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
        $listStaffs = Staff::getListStaffs($limit, $page);

        return view($this->dirView . 'index')
            ->with('listStaffs', $listStaffs);
    }

    public function show($alias, Request $request)
    {
        $user = Staff::findByAlias($alias);
        if (empty($user)) {
            abort(404, 'Not found User');
        }
        return view($this->dirView . 'show')
            ->with('user', $user);
    }

    public function create()
    {
        $listStaffs = Staff::getAllStaffs();

        return view($this->dirView . 'create')
            ->with('listStaffs', $listStaffs);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $lang = Setting::getLanguage();
        $messValidate = [
            'username.required' => 'Username is not empty!',
            'password.required' => 'Password is not empty!'
        ];
        if ($lang == 'vi') {
            $messValidate = [
                'username.required' => 'Tên đăng nhập không được để trống',
                'password.required' => 'Password không được để trống'
            ];
        }
        $validator = Validator::make($data, [
            'username' => 'required|max:255',
            'password' => 'required|max:255'

        ], $messValidate);

        if ($validator->fails()) {
            return redirect()->route('admin.staffs.create')
                ->withErrors($validator)
                ->withInput();
        }
        $isUsernameExist = Staff::IsUserNameExist($data['username']);
        if ($isUsernameExist) {

            $mess = 'username is already exist';
            if ($lang == 'vi') {
                $mess = 'Tên đăng nhập đã tồn tại';
            }
            return redirect()->route('admin.staffs.create')
                ->withErrors($mess)
                ->withInput();
        }

        $data['full_name'] = $data['first_name'] . ' ' . $data['last_name'];
        $data['author_type'] = 2;
        $data['created_by'] = Auth::guard('admin')->user()->id;
        $data['updated_by'] = Auth::guard('admin')->user()->id;
        $data['password'] = Hash::make($data['password']);

        //Save data
        try {
            DB::beginTransaction();
            Staff::create($data);
            DB::commit();
            return redirect()->route('admin.staffs.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.staffs.create')
                ->withErrors([$e->getMessage()])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $user = Staff::findByIdActive($id);
        if (empty($user)) {
            abort(404);
        }
        return view($this->dirView . 'edit')
            ->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $user = Staff::findByIdActive($id);
        if (empty($user)) {
            abort(404, 'Not found User');
        }
        $data = $request->all();
        // $lang=Setting::getLanguage();
        // $messValidate = [
        // 'username.required' => 'Username is not empty!',
        //  'password.required' => 'Password is not empty!'
        //    ];
        //	if($lang=='vi'){
        //	$messValidate = [
        // 'username.required' => 'Tên đăng nhập không được để trống',
        //   'password.required' => 'Password không được để trống'
        //  ];
        //	}
        //  $validator = Validator::make($data, [
        //    'username' => 'required|max:255',
        //   'password' => 'required|max:255'

        // ],$messValidate);

        // if ($validator->fails()) {
        //   return redirect()->route('admin.staffs.edit', $id)
        //     ->withErrors($validator)
        //     ->withInput();
        // }
        $data['full_name'] = $data['first_name'] . ' ' . $data['last_name'];
        $data['author_type'] = 2;
        $data['created_by'] = Auth::guard('admin')->user()->id;
        $data['updated_by'] = Auth::guard('admin')->user()->id;
        //   $data['password'] =  Hash::make($data['password']);

        try {
            DB::beginTransaction();
            $user->fill($data);
            $user->save();
            DB::commit();
            return redirect()->route('admin.staffs.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.staffs.edit', $id)
                ->withErrors([$e->getMessage()])
                ->withInput();
        };

    }

    public function destroy($id)
    {
        $user = Staff::findByIdActive($id);
        if (empty($user)) {
            return json_encode(['status' => false, 'message' => 'Not found id!']);
        }
        try {
            DB::beginTransaction();
            Staff::where('id', $id)->delete();

            DB::commit();
            return json_encode(['status' => true, 'message' => 'Successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Change password for staffs
     * @param Request $request
     * @return string
     */
    public function postChangePassword(Request $request)
    {
        $result = [
            'status' => false,
            'message' => 'Error!'
        ];
        $staff = Staff::findByAlias($request['alias']);
        if (empty($staff)) {
            $result['message'] = 'Not found Staff!';
            return json_encode($result);
        }
        if (empty($request['old_password']) || empty($request['new_password']) || empty($request['confirm_new_password'])) {
            $result['message'] = __('messages.Old/New/Confirm_Password_can_not_empty').'!';
            return json_encode($result);
        }
        if ($request['new_password'] !== $request['confirm_new_password']) {
            $result['message'] = __('messages.New_password_&_Confirm_new_password_not_match').'!';
            return json_encode($result);
        }
        if (!Hash::check($request['old_password'], $staff->password)) {
            $result['message'] = __('messages.Old_password_wrong').'!';
            return json_encode($result);
        }
        $staff->fill(['password' => Hash::make($request['new_password'])]);
        $staff->save();
        $result['status'] = true;
        $result['message'] = 'Successfully';
        return json_encode($result);
    }

}