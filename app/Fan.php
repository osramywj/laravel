<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Think\App;

class Fan extends Model
{
    protected $guarded = [];

    //关注的人跟用户表的对应关系
    public function suser()
    {
        $this->hasOne('App\User','id','star_id');
    }

    //粉丝跟用户表的对应关系
    public function fuser()
    {
        $this->hasOne('App\User','id','fan_id');
    }
}
