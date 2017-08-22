<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $guarded = [];

    public function postTopic()
    {
        return $this->hasMany('App\PostTopic','topic_id','id');
    }

    public function post()
    {
        return $this->belongsToMany('App\Post','post_topics','topic_id','post_id');
    }
}
