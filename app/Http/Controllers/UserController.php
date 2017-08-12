<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function setting()
    {
        return view('user/setting');
    }

    public function settingStore()
    {

    }
    //个人中心页面
    public function show(User $user)
    {
        //当前用户的关注数|粉丝数|文章数
        //当前用户的文章列表
//        $user = $user->withCount(['star','fan','post']);
        $user = User::withCount(['star','fan','post'])->find($user->id);

        //当前用户的关注列表，被关注者的关注数|粉丝数|文章数

        //当前用户的粉丝列表

        return view('user.show',compact('user'));
    }
    //关注
    public function fan()
    {
        return;
    }
    //取消关注
    public function unfan()
    {
        return ;
    }
}
