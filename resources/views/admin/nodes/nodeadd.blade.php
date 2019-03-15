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
@section('content')
@if (count($errors) > 0)
<div id="alert" class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
    @foreach ($errors->all() as $error)
        <strong>{{ $error }}</strong><br>
    @endforeach
</div>
@endif
    <div id="right_ctn">
        <div class="right_m">
            <!--会议列表-->
            <div class="hy_list">
                <div class="box_t">
                    <span class="name">节点添加</span>
                </div>
                <div class="space_hx">&nbsp;</div>
                <form action="/admin/nodes/insert" method="post">
                    <div class="xjhy">
                        {{ csrf_field() }}
                        <ul class="hypz">
                            <li class="clearfix">
                                <span class="title">节点描述：</span>
                                <div class="li_r">
                                    <input type="text" name="name" value="">
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">控制器名称：</span>
                                <div class="li_r">
                                    <input type="text" name="cname" value="">
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">方法名称：</span>
                                <div class="li_r">
                                    <input type="text" name="aname" value="">
                                </div>
                            </li>
                            <li class="tj_btn">
                                <input class="btn btn-info" style="margin-left:200px;" type="submit" value="提交">
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
    $('#button').click(function(){
        $("#alert").hide();
    });
</script>

@endsection