<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 4/9/2018
 * Time: 8:58 PM
 */

namespace App\Http\Controllers\Admin;


use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends AdminAppController
{
    protected $dirView = 'AdminView.Settings.';

    public function index(Request $request)
    {
        $setting = Setting::getSettings();
        return view($this->dirView . 'index')
            ->with('setting', $setting);
    }

    public function update($id, Request $request)
    {
        $data = $request['setting'];
        if (empty($request['setting']['using_for_admin'])) {
            $data['using_for_admin'] = Setting::STATUS_FALSE;
        }
        try {
            Setting::where('id', $id)->update($data);
        } catch (\Exception $e) {
            return redirect()->route('admin.settings.index')
                ->withErrors(['message' => $e->getMessage()])
                ->withInput();
        }
        Session::flash('success', 'Update Successful!');
        return redirect()->route('admin.settings.index');
    }

}