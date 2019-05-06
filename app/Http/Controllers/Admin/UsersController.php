<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/24/2017
 * Time: 4:32 PM
 */

namespace App\Http\Controllers\Admin;


use App\Models\User;
use Illuminate\Http\Request;

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

    public function destroy(Request $request)
    {

    }

}