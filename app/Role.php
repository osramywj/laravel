<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['_token'];

    public function permission()
    {
        return $this->belongsToMany('\App\Permission','permission_roles','role_id','permission_id')
            ->withPivot('role_id','permission_id');
    }


}
