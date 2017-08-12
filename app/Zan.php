<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zan extends Model
{
    protected $guarded = [];

    public function post()
    {
        $this->belongsTo('\App\Post');
    }

}
