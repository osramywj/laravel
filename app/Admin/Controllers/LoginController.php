<?php
namespace App\Admin\Controllers;

use Illuminate\Http\Request;

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
        //验证
        $this->validate($request,[
            'name' =>'required',
            'password' =>'required|min:3|max:10',
        ]);

        $userInfo = request(['name', 'password']);
        if (true == \Auth::guard('admin')->attempt($userInfo)) {
            return redirect('admin/home');
        }else{
            return back()->withErrors('登录失败')->withInput();
        }

    }

    public function logout()
    {
        \Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}