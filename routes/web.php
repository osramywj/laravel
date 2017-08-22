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

//注册页面
Route::get('register','RegisterController@index');
//注册行为
Route::post('register','RegisterController@register');
//登录页面
Route::get('login','LoginController@index');
//登录行为
Route::post('login','LoginController@login');
//登出行为
Route::get('logout','LoginController@logout');
//个人设置页面
Route::get('user/setting','UserController@setting');
//个人设置行为
Route::post('user/setting','UserController@settingStore');

Route::get('test','LoginController@test');


//文章列表页
Route::get('posts','PostController@index');


//文章详情页
Route::get('posts/{post}','PostController@show')->where(['post'=>'[0-9]+']);

//创建文章页面
Route::get('posts/create','PostController@create');
//创建文章
Route::post('posts','PostController@store');
//编辑文章页面
Route::get('posts/{post}/edit','PostController@edit');
//编辑文章
Route::put('posts/{post}','PostController@update')->middleware('can:update,post');

//删除文章
Route::get('posts/{post}/delete','PostController@delete');

//提交评论
Route::post('posts/{post}/comment','PostController@comment');
//点赞
Route::get('posts/{post}/zan','PostController@zan');
//取消赞
Route::get('posts/{post}/unzan','PostController@unzan');

//个人中心
Route::get('user/{user}','UserController@show');
//关注
Route::post('user/{user}/fan','UserController@fan');
//取消关注
Route::post('user/{user}/unfan','UserController@unfan');

//专题
Route::get('topic/{topic}','TopicController@show');
//投稿
Route::get('topic/{topic}/submit','TopicController@submit');

//后台
include_once 'admin.php';
