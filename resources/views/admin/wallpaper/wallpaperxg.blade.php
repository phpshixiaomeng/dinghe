@extends('admin/public/public')
@section('function')
    $(function() {
        //自适应屏幕宽度
        window.onresize = function() { location = location };

        var main_h = $(window).height();
        $('.hy_list').css('height', main_h - 45 + 'px');

        var main_w = $(window).width();
        $('.xjhy').css('width', main_w - 40 + 'px');


        $('.xial_m span').click(function() {
            $(this).parent('.xial_m').siblings('.xl_ctn').toggle();
        });
    });
@endsection
@section('content')
    <div id="right_ctn">
        <div class="right_m">
            <!--会议列表-->
            <div class="hy_list">
                <div class="box_t">
                    <span class="name">修改壁纸</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">添加壁纸</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">壁纸列表</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--终端列表-->
                <form action="/admin/wall/{{ $wall->id }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field("PUT") }} 
                    <div class="xjhy">
                        <!--基本配置-->
                        <ul class="hypz">
                            <li class="clearfix">
                                <span class="title">游戏名称：</span>
                                <div class="li_r">
                                    <input name="gname" type="text" value="{{ $wall->gname }}">
                                    <i>*</i>
                                </div>
                            </li>
                            
                            <li class="clearfix" style="height:90px">
                                <span class="title">游戏图片：</span>
                                <div class="li_r xial">
                                    <div class="xial_w xial_l" style="height:100">
                                        <input type="file" name="game_img" id="" >
                                        <img src="/uploads/{{ $wall->game_img }}" style="width:50px;height:50px;margin-left:60px;margin-top:10px;">
                                    </div>
                                </div>
                            </li>

                            
                            <li class="tj_btn">
                                <a href="" class="back">返回</a>
                                <input type="submit" value="保存" style="width:119px;height:30px;margin-top: 19px;background-color: #3D89CB;color:white">
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
    <!-- 配置文件 -->
@endsection