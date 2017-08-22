<?php


Route::group(['prefix'=>'admin'], function () {
    Route::get('/login','\App\Admin\Controllers\LoginController@index');
});