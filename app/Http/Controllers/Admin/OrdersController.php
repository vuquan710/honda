<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/31/2017
 * Time: 2:43 PM
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

class OrdersController extends AdminAppController
{
    public function listRecentOrder(Request $request)
    {
        dd($request->all());
    }

}