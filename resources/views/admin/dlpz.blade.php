
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
                    <span class="name">代理配置</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">系统配置</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">代理配置</a>
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
                                <span class="title">RAS端口：</span>
                                <div class="li_r">
                                    <input name="" type="text">
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">CS端口：</span>
                                <div class="li_r">
                                    <input name="" type="text">
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">存活时间：</span>
                                <div class="li_r">
                                    <input name="" type="text">
                                    <i>s</i>
                                </div>
                            </li>
                            <div class="space_hx">&nbsp;</div>
                            <li class="clearfix" style="border-top:1px solid #dedede; padding-top:15px; margin-top:15px; width:100%; ">
                                <span class="title">代理终端范围：</span>
                                <div class="li_r">
                                    <span class="radio">
                                <input checked="checked" name="hjzd1" type="radio" value="">
                                <em>代理所有终端</em>
                            </span>
                                    <span class="radio">
                                <input name="hjzd1" type="radio" value="">
                                <em>只代理以下终端</em>
                            </span>
                                </div>
                            </li>
                            <div class="space_hx">&nbsp;</div>
                            <table cellpadding="0" cellspacing="0" class="list_hy dzlb dlpz">
                                <tr>
                                    <th width="65" scope="col">序号</th>
                                    <th scope="col">终端号码</th>
                                    <th width="65" scope="col">序号</th>
                                    <th scope="col">终端号码</th>
                                    <th width="65" scope="col">序号</th>
                                    <th scope="col">终端号码</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><input name="" type="text"></td>
                                    <td>5</td>
                                    <td><input name="" type="text"></td>
                                    <td>9</td>
                                    <td><input name="" type="text"></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><input name="" type="text"></td>
                                    <td>6</td>
                                    <td><input name="" type="text"></td>
                                    <td>10</td>
                                    <td><input name="" type="text"></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><input name="" type="text"></td>
                                    <td>7</td>
                                    <td><input name="" type="text"></td>
                                    <td>11</td>
                                    <td><input name="" type="text"></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><input name="" type="text"></td>
                                    <td>8</td>
                                    <td><input name="" type="text"></td>
                                    <td>12</td>
                                    <td><input name="" type="text"></td>
                                </tr>
                            </table>
                            <div class="space_hx">&nbsp;</div>
                            <li class="tj_btn">
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