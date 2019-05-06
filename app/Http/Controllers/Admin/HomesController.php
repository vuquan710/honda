<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 10/16/2017
 * Time: 1:24 PM
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

class HomesController extends AdminAppController
{
    protected $dirView = 'AdminView.Homes.';

    public function index(Request $request)
    {
        return view($this->dirView . 'index');
    }

    public function create(Request $request)
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Request $request)
    {

    }

    public function edit(Request $request)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }

}