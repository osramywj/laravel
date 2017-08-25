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
        $status = request('status');
        if ($status=='1') {
            $affected = $post->update(['status'=>'1']);
        }else{
            $affected = $post->update(['status'=>'-1']);
        }

        if ($affected>0) {
            $success = [
                'error'=>'0',
                'msg'=>'success'
            ];
            echo  json_encode($success);
        } else {
            $error = [
                'error'=>'1',
                'msg'=>'error'
            ];
            echo  json_encode($error);
        }

    }


}