@extends('admin/public/public')
@section('function')

    $(function() {
        //自适应屏幕宽度
        window.onresize = function() { location = location };

        var main_h = $(window).height();
        $('.hy_list').css('height', main_h - 45 + 'px');

        var search_w = $(window).width() - 40;
        $('.search').css('width', search_w + 'px');
        $('.list_hy').css('width', search_w + 'px');
    });
@endsection
@section('content')

    <div id="right_ctn">
        <div class="right_m">
            <!--会议列表-->
            <div class="hy_list">
                <div class="box_t">
                    <span class="name">GK注册信息</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">系统诊断</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">GK注册信息</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--列表-->
                <form action="" method="post">
                    <table cellpadding="0" cellspacing="0" class="list_hy">
                        <tr>
                            <th scope="col" width="270">
                                <div>端点别名<a href="" class="up">&nbsp;</a><a href="" class="down">&nbsp;</a></div>
                            </th>
                            <th scope="col">端点类型</th>
                            <th scope="col">IP地址</th>
                            <th scope="col">存活时间(s)</th>
                        </tr>
                        <tr>
                            <td>800:800</td>
                            <td>MCU</td>
                            <td>10.7.11.89</td>
                            <td>95</td>
                        </tr>
                    </table>
                    <!--列表-->
                    <!--右边底部-->
                    <div class="r_foot">
                        <div class="r_foot_m">
                            <a href="" class="btn">刷新</a>
                        </div>
                    </div>
                </form>
                <!--右边底部-->
            </div>
            <!--会议列表-->
        </div>
    </div>
@endsection