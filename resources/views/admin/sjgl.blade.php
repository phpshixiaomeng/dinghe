@extends('admin/public/public')
@section('function')


    $(function() {
        //自适应屏幕宽度
        window.onresize = function() { location = location };

        var main_h = $(window).height();
        $('.hy_list').css('height', main_h - 45 + 'px');

        var main_w = $(window).width();
        $('.sjbf').css('width', main_w - 40 + 'px');


    });
@endsection
@section('content')

    <div id="right_ctn">
        <div class="right_m">
            <!--会议列表-->
            <div class="hy_list">
                <div class="box_t">
                    <span class="name">数据库备份/还原</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">系统维护</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">数据库管理</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--终端列表-->
                <form action="" method="post">
                    <div class="sjbf">
                        <div class="sjbf_a" style=" height:100px;">
                            <div class=" space_hx">&nbsp;</div>
                            <div class=" space_hx">&nbsp;</div>
                            <a href="" class="btn_bg btn_l">导出</a>
                        </div>
                        <div class="sjbf_b">
                            <ul class="clearfix">
                                <li class="sjbf_b1">选择数据库备份文件：</li>
                                <li class="sjbf_b2">
                                    <input name="" value="请选择路径" type="text">
                                </li>
                                <li class="sjbf_b3">
                                    <a href="" class="btn_bg btn_h">浏览</a>
                                </li>
                            </ul>
                            <div class="space_hx">&nbsp;</div>
                            <a href="" class="btn_bg btn_l">导入</a>
                        </div>
                    </div>
                </form>
                <!--终端列表-->
            </div>
            <!--会议列表-->
        </div>
    </div>
@endsection