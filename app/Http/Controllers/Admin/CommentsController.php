<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 6/4/2018
 * Time: 4:54 PM
 */

namespace App\Http\Controllers\Admin;


class CommentsController extends AdminAppController
{
    protected $dirView = 'AdminView.Comments.';

    public function index()
    {
        return view($this->dirView . 'index');
    }

}