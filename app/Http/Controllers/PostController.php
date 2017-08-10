<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
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
        ]);
        //获取当前登录用户的id
        $user_id = Auth::id();
        $data = array_merge(Input::all(),compact('user_id'));
        Post::create($data);
        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    public function update(Request $request,Post $post)
    {
        $this->validate($request,[
            'title' =>'required|min:3|max:6',
            'content' =>'required|min:8',
        ]);
        //TODO:用户的模块验证
//        $post = Post::find($post->id);
        if ($post->update(\request()->all())) {
            return redirect('/posts/'.$post->id);
        } else {
            echo  '文章更新失败';
        }
    }

    public function delete(Post $post)
    {
        //TODO:用户的模块验证
        if ($post->delete()) {
            return redirect('posts');
        } else {
            echo '删除失败';
        }
    }
}
