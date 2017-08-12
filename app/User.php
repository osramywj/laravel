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
        return $this->hasMany('App\Fans','star_id','id');
    }

    //我关注的
    public function star()
    {
        return $this->hasMany('App\User','fan_id','id');
    }

    //关注行为
    public function doFan($uid)
    {
        $data = [
            'star_id'=>$uid
        ];
        //$thid->fans返回的是本人所有的粉丝集合
        return $this->fans->create($data);
    }
    //取消关注
    public function doUnFan($uid)
    {
        $star = new Fans();
        $star->star_id = $uid;
        return $this->fans->destroy($star);
    }

    //判断当前用户是否被uid关注了
    public function hasFan($uid)
    {
        return $this->fans->where('fan_id',$uid)->count();
    }
    //判断当前用户是否关注了uid
    public function hasStar($uid)
    {
        return $this->stars->where('star_id',$uid)->count();
    }
}
