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
                    <span class="name">Ping</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">系统诊断</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">Ping</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--终端列表-->
                <form action="" method="post">
                    <div class="xjhy">
                        <!--基本配置-->
                        <ul class="hypz ping">
                            <li class="clearfix">
                                <span class="title">IP 地址：</span>
                                <div class="li_r">
                                    <input name="" type="text">
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">次数：</span>
                                <div class="li_r ping_c">
                                    <input class="duan" name="" type="text">
                                    <a href="" class="btn_bg btn_l">Ping</a>
                                </div>
                            </li>
                            <li class="ping_m">
                                <span>Ping信息展示区</span>
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