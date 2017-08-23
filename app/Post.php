<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Post extends Model
{
    protected $guarded = ['_token'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('available', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->whereIn('status',[0,1]);
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at','desc');
    }

    public function zans()
    {
        return $this->hasMany('App\Zan');
    }

    public function zan($user_id)
    {
        return $this->hasOne('App\Zan')->where('user_id',$user_id);
    }




//    //当前登录用户的所有不属于某个专题的文章
//    public function scopePostOfUser(\Illuminate\Database\Eloquent\Builder $query,$topic_id)
//    {
//        return $query->where('user_id',\Auth::id())->doesntHave('PostTopic','and', function ($q) use($topic_id) {
//                $q->where('topic_id',$topic_id);
//        });
//    }
//
//    //文章对应的专题 一对一
//    public function PostTopic()
//    {
//        return $this->belongsTo('App\PostTopic','id','post_id');
//    }

    public function topic()
    {
        return $this->belongsToMany('App\Topic','post_topics','post_id','topic_id');
    }

    //当前登录用户的所有不属于某个专题的文章
    public function scopePostNotMine(\Illuminate\Database\Eloquent\Builder $query,$topic_id)
    {
        return $query->where('user_id',\Auth::id())->doesntHave('topic','and', function ($q) use($topic_id) {
            $q->where('topic_id',$topic_id);
        });
    }

}
