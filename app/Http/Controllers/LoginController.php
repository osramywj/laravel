<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login/index');
    }

    public function login(Request $request)
    {
        //验证
        $this->validate($request,[
            'email' =>'required|email',
            'password' =>'required|min:3|max:10',
        ]);
//
//        //逻辑
        $userInfo = request(['email','password']);
        $is_remember = boolval(\request('is_remember'));

        if (Auth::attempt($userInfo, $is_remember)) {
            $request->session()->put('user',['user_id'=>Auth::id(),'user_name'=>Auth::user()->name]);
            return redirect('posts');
        } else {
            return redirect()->back()->withErrors('登录失败')->withInput();
        }

//        $validator = Validator::make($request->input(),[
//            'email' =>'required|email',
//            'password' =>'required|min:3|max:10',
//            'is_remember' =>'integer'
//        ]);
//
//        if ($validator->fails()) {
////            return redirect()->back()->withErrors('登录失败');
//            return redirect()->back()->withErrors($validator)->withInput();
//        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function test(Request $request)
    {
        dd($request->session()->all());
    }
}
