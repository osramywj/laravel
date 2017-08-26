<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    protected $tables = 'admin_users';
    protected $guarded = ['_token'];
    //管理员有哪些角色
    public function role()
    {
        return $this->belongsToMany('\App\Role','admin_roles','user_id','role_id')
            ->withPivot('user_id','role_id');
    }

    //是否有某个/些角色,返回的是布尔值

    public function isInRoles($roles)
    {
        return !!$roles->intersect($this->role)->count();
    }

    //分配角色,参数是对象
    public function assignRole($role)
    {
        return $this->role()->save($role);
    }

    //删除角色
    public function deleteRole($role)
    {
        return $this->role()->detach($role);
    }

    //用户是否有权限
    public function hasPermission($permission)
    {

    }
}
