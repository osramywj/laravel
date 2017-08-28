<?php
namespace App\Admin\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //权限列表页面
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permission.index',compact('permissions'));
    }

    //添加权限页面
    public function create()
    {
        return view('admin.permission.create');
    }

    //添加权限操作
    public function store()
    {

    }



}