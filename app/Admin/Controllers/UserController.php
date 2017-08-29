<?php
namespace App\Admin\Controllers;

use App\AdminUser;

use App\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //管理员列表页面
    public function index()
    {
        $users = AdminUser::paginate(10);
        return view('admin.user.index',compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required',
            'password' =>'required|min:3|max:10',
        ]);
        $name = request('name');
        $password = bcrypt(request('password'));
        $res = AdminUser::firstOrCreate(compact('name'));
        $res && AdminUser::where('id',$res->id)->update(compact('password'));
        return redirect('admin/users');
    }

    //分配角色页面
    public function role(AdminUser $user)
    {
        $roles = Role::all();
        $myRoles = $user->role;
        return view('admin.user.role',compact('user','roles','myRoles'));
    }

    //分配角色操作
    public function assignRole(AdminUser $user)
    {
        $role = request('roles');
        $user->role()->sync($role);
//        $roles = Role::findMany(request('roles'));
//        $myRoles = $user->role;
//        //要删除的角色
//        $delRoles = $myRoles->diff($roles);
//        foreach ($delRoles as $role) {
//            $user->deleteRole($role);
//        }
//        //要增加的角色
//        $addRoles = $roles->diff($myRoles);
//        foreach ($addRoles as $role) {
//            $user->assignRole($role);
//        }
        return back();
    }

}