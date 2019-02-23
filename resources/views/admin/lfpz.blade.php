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
                    <span class="name">新增/更新流媒体服务器</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">流服务器</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">新增/更新流媒体服务器</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--终端列表-->
                <form action="" method="post">
                    <div class="xjhy">
                        <!--基本配置-->
                        <ul class="hypz">
                            <li class="clearfix">
                                <span class="title">流媒体服务器：</span>
                                <div class="li_r">
                                    <input name="" type="text">
                                    <i>*</i>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">IP地址：</span>
                                <div class="li_r">
                                    <input name="" type="text">
                                    <i>*</i>
                                </div>
                            </li>
                            <li class="tj_btn">
                                <a href="" class="back">返回</a>
                                <a href="">保存</a>
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
@endsection