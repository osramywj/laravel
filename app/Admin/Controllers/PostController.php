<?php
namespace App\Admin\Controllers;


use App\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //文章审核页面
    public function index()
    {
//        $posts = DB::table('posts')->where('status',0)->get();
        $posts = Post::withoutGlobalScope('available')->where('status',0)->get();
//        dd($posts);
        return view('admin.post.index',compact('posts'));
    }

    public function check(Post $post)
    {
        $post->status = request('status');
        dd($post);
        return ;
    }


}