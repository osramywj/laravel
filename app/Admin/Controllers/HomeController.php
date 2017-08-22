<?php
namespace App\Admin\Controllers;

use App\Http\Requests\Request;

class HomeController extends Controller
{
    //首页
    public function index()
    {
        return view('admin.home.index');
    }


}