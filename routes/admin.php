<?php


Route::group(['prefix'=>'admin'], function () {
    Route::get('/login','\App\Admin\Controllers\LoginController@index');
    Route::post('/login','\App\Admin\Controllers\LoginController@login');
    Route::get('/logout','\App\Admin\Controllers\LoginController@logout');
    Route::get('/home','\App\Admin\Controllers\HomeController@index');

    //管理人员列表页面
    Route::get('users','\App\Admin\Controllers\UserController@index');
    //添加管理员页面
    Route::get('users/create','\App\Admin\Controllers\UserController@create');
    //添加管理员操作
    Route::post('users/store','\App\Admin\Controllers\UserController@store');

    //审核页面
    Route::get('posts','\App\Admin\Controllers\PostController@index');
    //审核动作
    Route::post('posts/{$post}/check','\App\Admin\Controllers\PostController@check');

});