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
        $user = User::withCount(['star','fan','post'])->find($user->id);
        //当前用户的文章列表
        //获得的是个二维数组;相当于表里的n条数据的集合
        $posts = $user->post;
//        等同于$posts = $user->post()->get();

        //当前用户的关注列表，被关注者的关注数|粉丝数|文章数
        $stars = $user->star;
        $star_users = User::withCount(['star','fan','post'])->whereIn('id',$stars->pluck('star_id'))->get();

        //当前用户的粉丝列表
        $fans = $user->fan;
        $fan_users = User::withCount(['star', 'fan', 'post'])->whereIn('id',$fans->pluck('fan_id'))->get();
        return view('user.show',compact('user','star_users','fan_users','posts'));
    }
    //关注
    public function fan(User $user)
    {
        $me = \Auth::user();
        $me->doFan($user->id);
        return [
            'error'=>0,
            'msg'=>''
        ];
    }
    //取消关注
    public function unfan(User $user)
    {
        $me = \Auth::user();
        $me->doUnFan($user->id);
        return [
            'error'=>0,
            'msg'=>''
        ];
    }
}
