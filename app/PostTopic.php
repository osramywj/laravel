<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTopic extends Model
{
    protected $guarded = [];

    public function post()
    {
        return $this->hasOne('App\Post','id','post_id');
    }

}
