<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    public function index()
    {
        $posts =[
            ['title'=>1111,'content'=>11111111111111111111111],
            ['title'=>222,'content'=>11111111111111111111111],
            ['title'=>333,'content'=>11111111111111111111111],
            ['title'=>4444,'content'=>11111111111111111111111],
            ['title'=>5555,'content'=>11111111111111111111111],
            ['title'=>6666,'content'=>11111111111111111111111],
            ['title'=>777,'content'=>11111111111111111111111],
            ['title'=>8888,'content'=>11111111111111111111111],
            ['title'=>9999,'content'=>11111111111111111111111],
            ['title'=>456456,'content'=>11111111111111111111111],
        ];
        return view('post.index',compact('posts'));
    }

    public function show()
    {
        return view('post.show',['title'=>'this is a title','isShow'=>false]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {

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
