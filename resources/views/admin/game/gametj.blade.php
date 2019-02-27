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
                    <span class="name">添加游戏</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">添加游戏</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">游戏列表</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--终端列表-->
                <form action="/tjfl" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }} 
                    <div class="xjhy">
                        <!--基本配置-->
                        <ul class="hypz">

                            <li class="clearfix">
                                <span class="title">游戏名称：</span>
                                <div class="li_r">
                                    <input name="name" type="text">
                                    <i>*</i>
                                </div>
                            </li>
                            
                             <li class="clearfix">
                                <span class="title">游戏价格：</span>
                                <div class="li_r">
                                    <input name="game_jg" type="text">
                                    <i>*</i>
                                </div>
                            </li>

                            <li class="clearfix">
                                <span class="title">游戏配置：</span>
                                <div class="li_r">
                                    <input name="game_pz" type="text">
                                    <i>*</i>
                                </div>
                            </li>

                            <li class="clearfix">
                                <span class="title">游戏销量：</span>
                                <div class="li_r">
                                    <input name="game_xl" type="text">
                                    <i>*</i>
                                </div>
                            </li>

                            <li class="clearfix">
                                <span class="title">游戏库存：</span>
                                <div class="li_r">
                                    <input name="game_kc" type="text">
                                    <i>*</i>
                                </div>
                            </li>

                            <li class="clearfix" style="height:100px">
                                <span class="title">游戏图片：</span>
                                <div class="li_r xial">
                                    <div class="xial_w xial_l">
                                        <input type="file" name="game_img" id="" style="height:100px">

                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <span class="title">是否上架：</span>
                                <div class="li_r xial">
                                    <div class="xial_w xial_l">
                                        <select name="game_zt" style="width:190px;height:27;">
                                            <option value="0">上架</option>
                                            <option value="0">下架</option>
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix" style="height:200px;">
                                <span class="title">游戏详情：</span>
                                <div class="li_r">
                                    <textarea name="game_xq" style="width:190px;height:200px;"></textarea>
                                    <i>*</i>
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