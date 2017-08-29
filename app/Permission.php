<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = ['_token'];

    public function role()
    {
        return $this->belongsToMany('\App\Role','permission_roles','perm_id','role_id')->withPivot(['perm_id', 'role_id']);
    }
}
