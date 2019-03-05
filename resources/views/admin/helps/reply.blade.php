@extends('admin/public/public')
@section('function')
    $(function() {
        //自适应屏幕宽度
        window.onresize = function() { location = location };

        var main_h = $(window).height();
        $('.hy_list').css('height', main_h - 45 + 'px');

        var main_w = $(window).width();
        $('.xjhy').css('width', main_w - 40 + 'px');


    });
@endsection
@section('style')
<style type="text/css">
.help_update li h3{
    width:40%;
    margin-bottom:20px;
}
</style>
@endsection
@section('content')

    <div id="right_ctn">
        <div class="right_m">
            <!--会议列表-->
            <div class="hy_list">
                <div class="box_t">
                    <span class="name">回复</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="/admin_assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="/admin_assets/images/icon3.png" alt=""/></span>
                        <a href="">回复</a>
                    </div>
                    <!--当前位置-->
                </div>

                <div class="space_hx">&nbsp;</div>
                <!--终端列表-->

                <form action="/admin/help/add/{{ $helps->id }}" method="post" >
                    <div class="xjhy">
                        @if (count($errors) > 0)
                            <div id="alert" class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
                                @foreach ($errors->all() as $error)
                                    <strong>{{ $error }}</strong><br>
                                @endforeach
                            </div>
                        @endif
                        @if (session('error'))
                            <div id="alert" class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
                                {{ session('error') }}
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <ul class="help_update" style="text-align: left; margin-left: 150px;">
                            <li>
                                <h3><small>用户名</small></h3>
                                <h3>{{ $helps->uname }}</h3>
                            </li>
                            <li>
                                <h3><small>反馈事件</small></h3>
                                <h3>{{ $helps->name }}</h3>
                            </li>
                            <li>
                                <h3><small>问题描述</small></h3>
                                <h3><div style=" width:500px;word-wrap:break-word ;">
                                    {!! $helps->description !!}
                                </div></h3>
                            </li>
                            <li >
                                <h3><small>回复内容</small></h3>
                                <script id="reply" name="reply" type="text/plain" style="width:50%;height:20%;">
                                </script>
                            </li>
                            <li class="clearfix">
                               <input class="btn btn-info"  type="submit" value="回复">
                            </li>

                        </ul>
                        <!--基本配置-->
                    </div>
                </form>
                <!--终端列表-->
            </div>
            <!--会议列表-->
        </div>
    </div>
<script type="text/javascript">
    var ue = UE.getEditor('reply',{
    autoHeightEnabled:false,
    toolbars: [
    ['indent','emotion', 'undo', 'redo', 'bold','italic', 'underline']
    ]
    });

    $('#button').click(function(){
        $("#alert").hide();
    });
</script>
@endsection