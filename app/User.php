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
}
