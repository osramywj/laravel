@extends('layouts.main')
@section('content')
        <div class="col-sm-8">
            <blockquote>
                <p><img src="/storage/9f0b0809fd136c389c20f949baae3957/iBkvipBCiX6cHitZSdTaXydpen5PBiul7yYCc88O.jpeg" alt="" class="img-rounded" style="border-radius:500px; height: 40px"> {{$user->name}}
                </p>

                <footer>关注：{{$user->star_count}}｜粉丝：{{$user->fan_count}}｜文章：{{$user->post_count}}</footer>
                {{--@if($user->hasFan(\Auth::id()))--}}
                    {{--<div>--}}
                        {{--<button class="btn btn-default like-button" like-value="0" like-user="{{$user->id}}"  type="button">关注</button>--}}
                    {{--</div>--}}
                {{--@else--}}
                    {{--<div>--}}
                        {{--<button class="btn btn-default like-button" like-value="1" like-user="{{$user->id}}" type="button">取消关注</button>--}}
                    {{--</div>--}}
                {{--@endif--}}

                @include('layouts.like', ['target_user' => $user])
            </blockquote>
        </div>
        <div class="col-sm-8 blog-main">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">文章</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">关注</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">粉丝</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @foreach($posts as $post)
                        <div class="blog-post" style="margin-top: 30px">
                            <p class=""><a href="/user/{{$post->user->id}}">{{$post->user->name}}</a> {{$post->created_at->diffForHumans()}}</p>
                            <p class=""><a href="/posts/{{$post->id}}" >{{$post->title}}</a></p>
                            <p><p>{!!$post->content!!}</p>
                        </div>
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        @foreach($star_users as $star)
                        <div class="blog-post" style="margin-top: 30px">
                            <p class="">{{$star->name}}</p>
                            <p class="">关注：{{$star->star_count}} | 粉丝：{{$star->fan_count}}｜ 文章：{{$star->post_count}}</p>

                            <div>
                                <button class="btn btn-default like-button" like-value="1" like-user="6" _token="MESUY3topeHgvFqsy9EcM916UWQq6khiGHM91wHy" type="button">取消关注</button>
                            </div>

                        </div>
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        @foreach($fan_users as $fan)
                            <div class="blog-post" style="margin-top: 30px">
                                <p class="">{{$fan->name}}</p>
                                <p class="">关注：{{$star->star_count}} | 粉丝：{{$fan->fan_count}}｜ 文章：{{$fan->post_count}}</p>

                                <div>
                                    <button class="btn btn-default like-button" like-value="1" like-user="6" _token="MESUY3topeHgvFqsy9EcM916UWQq6khiGHM91wHy" type="button">取消关注</button>
                                </div>

                            </div>
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>


        </div><!-- /.blog-main -->
@endsection
