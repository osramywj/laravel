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
        return $this->belongsToMany('\App\Role','admin_roles','admin_id','role_id')
            ->withPivot('admin_id','role_id');
    }

    //是否有某个/些角色,返回的是布尔值

    public function isInRoles($roles)
    {
        return !!$roles->intersect($this->role)->count();
    }

    //分配角色,参数是对象
    //会自动填充中间表
    public function assignRole($role)
    {
//        return $this->role()->save($role);
        return $this->role()->attach($role);
    }

    //删除角色
    public function deleteRole($role)
    {
        return $this->role()->detach($role);
    }

    //用户是否有权限
    //这个权限所属的角色跟用户拥有的角色是否有交集
    //因为$this->role是个二维数组，无法直接$this->role->permission,所以采用交集的方式判断
    public function hasPermission($permission)
    {
//        return $permission->permission->intersect($this->role);
        return $this->isInRoles($permission->role);
    }
}
