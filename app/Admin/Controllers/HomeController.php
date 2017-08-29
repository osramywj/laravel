<?php
namespace App\Admin\Controllers;

use App\Http\Requests\Request;
use App\Permission;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //首页
    public function index()
    {
//                    dd(Auth::guard('admin')->user());

//        $permissions = Permission::all();
//        foreach ($permissions as $permission) {
////            dd(->hasPermission($permission));
//        }
        return view('admin.home.index');
    }


}