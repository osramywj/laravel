<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['_token'];

    //当前角色的所有权限
    public function permission()
    {
        return $this->belongsToMany('\App\Permission','permission_roles','role_id','perm_id')
            ->withPivot('role_id','perm_id');
    }

    //给角色赋予权限
    public function grantPermission($permission)
    {
        return $this->permission()->save($permission);
    }

    //删除权限
    public function deletePermission($permission)
    {
        return $this->permission()->detach($permission);
    }

    //判断角色是否有权限
    public function hasPermission($permission)
    {
        return $this->permission()->contains($permission);
    }
}
