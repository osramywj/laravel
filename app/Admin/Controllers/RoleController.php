<?php
namespace App\Admin\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //角色列表页面
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index',compact('roles'));
    }

    //添加角色页面
    public function create()
    {
        return view('admin.role.create');
    }

    //添加角色操作
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:roles',
            'description'=>'required',
        ]);
        Role::create(request('name','description'));
    }

    //分配权限页面
    public function permission()
    {
        $permissions = Permission::all();
        return view('admin.role.permission',compact('permissions'));
    }

    //分配权限操作
    public function assignPermission()
    {

    }
}