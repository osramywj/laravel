@extends('layouts.main')
@section('content')
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <div style="display:inline-flex">
                    <h2 class="blog-post-title">{{ $post->title }}</h2>
                    @can('update',$post)
                    <a style="margin: auto"  href="/posts/{{$post->id}}/edit">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    @endcan

                    @can('delete',$post)
                    <a style="margin: auto"  href="/posts/{{$post->id}}/delete">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                    @endcan
                </div>

                <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by <a href="#">{{$post->user->name}}</a></p>

                <p>{{ $post->content }}<p><br></p></p>
                <div>
                    <a href="/posts/62/zan" type="button" class="btn btn-primary btn-lg">赞</a>

                </div>
            </div>

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">评论</div>

                <!-- List group -->
                <ul class="list-group">
                    @foreach($post->comment as $comment)
                    <li class="list-group-item">
                        <h5>{{$comment->created_at->toFormattedDateString()}} by {{$comment->post_id}}</h5>
                        <div>
                            {{$comment->content}}
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">发表评论</div>

                <!-- List group -->
                <ul class="list-group">
                    <form action="/posts/{{$post->id}}/comment" method="post">
                        {{csrf_field()}}
                        {{--<input type="hidden" name="post_id" value="62"/>--}}
                        <li class="list-group-item">
                            <textarea name="content" class="form-control" rows="10"></textarea>
                            <button class="btn btn-default" type="submit">提交</button>
                        </li>
                    </form>

                </ul>
            </div>

        </div><!-- /.blog-main -->
@endsection

