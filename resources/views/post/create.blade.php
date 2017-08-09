@extends('layouts.main')
@section('content')
        <div class="col-sm-8 blog-main">
            <form action="/posts" method="POST">
                {{csrf_field()}}
                {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                <div class="form-group">
                    <label>标题</label>
                    <input name="title" type="text" class="form-control" placeholder="这里是标题">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    {{--<textarea id="content"  style="height:400px;max-height:500px;" name="content" class="form-control" placeholder="这里是内容"></textarea>--}}
                <!-- 加载编辑器的容器 -->
                    <script id="container" name="content" type="text/plain">
        这里写你的初始化内容
    </script>
                    <!-- 配置文件 -->
                    <script type="text/javascript" src="/js/ueditor.config.js"></script>
                    <!-- 编辑器源码文件 -->
                    <script type="text/javascript" src="/js/ueditor.all.js"></script>
                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                        var ue = UE.getEditor('container');
                    </script>
                </div>

                <button type="submit" class="btn btn-default">提交</button>
            </form>
            <br>
            {{--@if($errors->all())--}}

            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
            {{--@endif--}}
        </div><!-- /.blog-main -->
@endsection
