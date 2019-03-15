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
    <div id="right_ctn">
        <div class="right_m">
            <!--会议列表-->
            <div class="hy_list">
                <div class="box_t">
                    <span class="name">权限添加</span>
                </div>
                <div class="space_hx">&nbsp;</div>
                <form action="/admin/user/updaterole/{{$user->id}}" method="post">
                    <div class="xjhy">
                        {{ csrf_field() }}
                        <ul class="hypz">
                            <li class="clearfix">
                                <span class="title">角色名称：</span>
                                <div class="li_r">
                                    {{ $user->user }}
                                </div>
                            </li>
                        <li class="clearfix" style="width:410px;padding-left:50px;">
                            @foreach($roles_data as $k=>$v)
                            <span><input name="rids[]" value="{{$v->id}}" @if(in_array($v->id,$users_roles_rid)) checked @endif type="checkbox"> <label>{{$v->name}}</label></span>
                            @endforeach
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