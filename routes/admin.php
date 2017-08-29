<?php


Route::group(['prefix'=>'admin'], function () {
    Route::get('/login','\App\Admin\Controllers\LoginController@index');
    Route::post('/login','\App\Admin\Controllers\LoginController@login');
    Route::get('/logout','\App\Admin\Controllers\LoginController@logout');
    Route::get('/home','\App\Admin\Controllers\HomeController@index');

    Route::group(['middleware'=>'can:user_manage'], function () {
        //管理人员列表页面
        Route::get('users','\App\Admin\Controllers\UserController@index');
        //添加管理员页面
        Route::get('users/create','\App\Admin\Controllers\UserController@create');
        //添加管理员操作
        Route::post('users/store','\App\Admin\Controllers\UserController@store');
        //分配角色页面
        Route::get('users/{user}/role','\App\Admin\Controllers\UserController@role');
        //分配角色操作
        Route::post('users/{user}/role','\App\Admin\Controllers\UserController@assignRole');


        //角色列表页面
        Route::get('role','\App\Admin\Controllers\RoleController@index');
        //添加角色页面
        Route::get('role/create','\App\Admin\Controllers\RoleController@create');
        //添加角色操作
        Route::post('role/store','\App\Admin\Controllers\RoleController@store');
        //分配权限页面
        Route::get('role/{role}/permission','\App\Admin\Controllers\RoleController@permission');
        //分配权限操作
        Route::post('role/{role}/permission','\App\Admin\Controllers\RoleController@assignPermission');

        //权限列表页面
        Route::get('permission','\App\Admin\Controllers\PermissionController@index');
        //添加权限页面
        Route::get('permission/create','\App\Admin\Controllers\PermissionController@create');
        //添加权限操作
        Route::post('permission/store','\App\Admin\Controllers\PermissionController@store');
    });


     Route::group(['middleware'=>'can:article_manage'], function () {
         //审核页面
         Route::get('posts','\App\Admin\Controllers\PostController@index');
         //审核动作
         Route::post('posts/{post}/check','\App\Admin\Controllers\PostController@check');
     });

});