<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['_token'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at','desc');
    }
}
