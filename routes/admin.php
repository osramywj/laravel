<?php


Route::group(['prefix'=>'admin'], function () {
    Route::get('/login','\App\Admin\Controllers\LoginController@index');
    Route::post('/login','\App\Admin\Controllers\LoginController@login');
    Route::get('/logout','\App\Admin\Controllers\LoginController@logout');
    Route::get('/home','\App\Admin\Controllers\HomeController@index');
});