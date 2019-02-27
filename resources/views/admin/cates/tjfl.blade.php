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
                    <span class="name">添加游戏分类</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">添加分类</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">分类列表</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--终端列表-->
                <form action="/admin/tjfl" method="post">
                    {{ csrf_field() }} 
                    <div class="xjhy">
                        <!--基本配置-->
                        <ul class="hypz">

                            <li class="clearfix">
                                <span class="title">分类名称：</span>
                                <div class="li_r">
                                    <input name="name" type="text">
                                    <i>*</i>
                                </div>
                            </li>
                            
                            <li class="clearfix">
                                <span class="title">所属分类：</span>
                                <div class="li_r xial">
                                    <div class="xial_w xial_l">
                                        <select name="pid" style="width:190px;height:27px;">
                                            <option value="0">请选择</option>
                                            @foreach($cates_xinx as $k=>$v)
                                            <option value="{{ $v->id }}" @if($id == $v->id) selected @endif >{{ $v->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <span class="title">是否显示：</span>
                                <div class="li_r xial">
                                    <div class="xial_w xial_l">
                                        <select name="display" style="width:190px;height:27;">
                                            <option value="0">显示</option>
                                            <option value="1">隐藏</option>
                                        </select>
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
@endsection