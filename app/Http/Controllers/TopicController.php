<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostTopic;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function show(Topic $topic)
    {
        //该专题下的所有文章
        $topic = Topic::find($topic->id);
        $posts = $topic->post;

//        $post_topics = PostTopic::where('topic_id',$topic->id)->get();
//        foreach ($post_topics as $key=>$post_topic) {
//            $posts[$key] = $post_topic->post;
//        }
        //当前作者不在该专题内的所有文章
//        $postNotInTopic = Post::postOfUser($topic->id)->get();
        $postNotInTopic = Post::postNotMine($topic->id)->get();
        return view('topic.show',compact('topic','posts','postNotInTopic'));
    }

    public function submit(Request $request,Topic $topic)
    {
        $this->validate($request,[
            'post_ids'=>'required|array'
        ]);
        $topic_id = $topic->id;
        $post_ids = $request->input('post_ids');
        foreach ($post_ids as $post_id) {
            $data=compact('topic_id','post_id');
            PostTopic::create($data);
        }
        return back();
    }
}
