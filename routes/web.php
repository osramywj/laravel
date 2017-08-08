<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//文章列表页
Route::get('posts','PostController@index');
//文章详情页
Route::get('posts/{post}','PostController@show');
//创建文章页面
Route::get('posts/create','PostController@create');
//创建文章
Route::post('posts','PostController@store');
//编辑文章页面
Route::get('posts/{post}/edit','PostController@edit');
//编辑文章
Route::put('posts/edit','PostController@update');

//删除文章
Route::post('posts/delete','PostController@delete');
