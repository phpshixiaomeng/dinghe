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
                    <span class="name">最佳配置信息</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">高配置管理</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">高配置列表</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--终端列表-->
                <form action="/admin/highpei/{{ $hpeiz->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="xjhy">
                        <!--基本配置-->
                        <ul class="hypz">
                            <li class="clearfix">
                                <span class="title">操作系统：</span>
                                <div class="li_r">
                                    <input name="system" type="text" value="{{ $hpeiz->game_name }}" disabled>
                                    <i>*</i>
                                </div>
                            </li>

                            <li class="clearfix">
                                <span class="title">操作系统：</span>
                                <div class="li_r">
                                    <input name="system" type="text" value="{{ $hpeiz->system }}">
                                    <i>*</i>
                                </div>
                            </li>
                            
                            <li class="clearfix">
                                <span class="title">运行内存：</span>
                                <div class="li_r">
                                    <input name="ram" type="text" value="{{ $hpeiz->ram }}">
                                    <i>*</i>
                                </div>
                            </li>

                            <li class="clearfix">
                                <span class="title">处理器：</span>
                                <div class="li_r">
                                    <input name="cpu" type="text" value="{{ $hpeiz->cpu }}">
                                    <i>*</i>
                                </div>
                            </li>
                            
                            <li class="clearfix">
                                <span class="title">图形处理器：</span>
                                <div class="li_r">
                                    <input name="graphic" type="text" value="{{ $hpeiz->graphic }}">
                                    <i>*</i>
                                </div>
                            </li>
                            
                            <li class="clearfix">
                                <span class="title">声卡：</span>
                                <div class="li_r">
                                    <input name="audio" type="text" value="{{ $hpeiz->audio }}">
                                    <i>*</i>
                                </div>
                            </li>

                            <li class="clearfix">
                                <span class="title">其他事项：</span>
                                <div class="li_r">
                                    <input name="other" type="text" value="{{ $hpeiz->other }}">
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
@endsection