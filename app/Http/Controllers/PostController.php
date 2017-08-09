<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    public function index()
    {
        $posts =Post::orderBy('created_at','desc')->paginate(5);
        return view('post.index',compact('posts'));
    }

    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        //验证
        $this->validate($request,[
            'title' =>'required|min:3|max:6',
            'content' =>'required|min:8',
        ],
            [
                'required' =>':attribute 为必选项',
                'min' => ':attribute 至少:min个字符',
                'max' => ':attribute 最多:max个字符',
            ],
            [
                'title' =>'标题',
                'content' =>'内容'
            ]
            );






        Post::create(Input::all());
        return redirect('/posts');
    }

    public function edit()
    {
        return view('post.edit');
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
