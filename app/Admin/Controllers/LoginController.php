<?php
namespace App\Admin\Controllers;

use App\Http\Requests\Request;

class LoginController extends Controller
{
    //登录页面
    public function index()
    {
        return view('admin.login.index');
    }

    //登录操作
    public function login(Request $request)
    {
        $this->validate($request,[
            'email' =>'required|email',
            'password' =>'required|min:3|max:10',
            'is_remember' =>'integer'
        ]);
        return ;
    }

    public function logout()
    {
        return;
    }
}