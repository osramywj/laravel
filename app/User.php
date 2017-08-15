<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    protected $guarded = [];

    public function post()
    {
        return $this->hasMany('App\Post','user_id','id');
    }

    //我的粉丝
    public function fan()
    {
        return $this->hasMany('App\Fan','star_id','id');
    }

    //我关注的
    public function star()
    {
        return $this->hasMany('App\Fan','fan_id','id');
    }

    //关注行为
    public function doFan($uid)
    {

        $star =  new Fan();
        $star ->star_id = $uid;
        $star->fan_id = \Auth::id();
        return $star->save();
    }
    //取消关注
    public function doUnFan($uid)
    {
        return Fan::where('star_id',$uid)->delete();
    }

    //判断当前用户是否被uid关注了
    public function hasFan($uid)
    {
        return $this->fan()->where('fan_id',$uid)->count();
    }
    //判断当前用户是否关注了uid
    public function hasStar($uid)
    {
        return $this->star()->where('star_id',$uid)->count();
    }
}
