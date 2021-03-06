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
                    <span class="name">会议列表</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="admin_assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="admin_assets/images/icon3.png" alt=""/></span>
                        <a href="">系统诊断</a>
                        <span><img src="admin_assets/images/icon3.png" alt=""/></span>
                        <a href="">网络统计</a>
                    </div>
                    <!--当前位置-->
                </div>
                <!--查询-->
                <div class="search">
                    <span>QOS网络阀值配置：</span>
                    <div class="sz_text">
                        <em>丢包率>=</em>
                        <input name="" type="text">
                        <em>%,抖动>=</em>
                        <input name="" type="text">
                        <em>ms上报</em>
                    </div>
                    <a href="" class="btn">设置</a>
                </div>
                <!--查询-->
                <div class="space_hx">&nbsp;</div>
                <!--列表-->
                <form action="" method="post">
                    <table cellpadding="0" cellspacing="0" class="list_hy">
                        <tr>
                            <th scope="col" width="270">
                                <div>会议名称/号码<a href="" class="up">&nbsp;</a><a href="" class="down">&nbsp;</a></div>
                            </th>
                            <th scope="col">开始时间</th>
                            <th scope="col">时长</th>
                            <th scope="col">与会终端</th>
                        </tr>
                        <tr>
                            <td>ip64/1</td>
                            <td>2012-10-11 13:28</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>ip64/1</td>
                            <td>2012-10-11 13:28</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>ip64/1</td>
                            <td>2012-10-11 13:28</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>ip64/1</td>
                            <td>2012-10-11 13:28</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>ip64/1</td>
                            <td>2012-10-11 13:28</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    </table>
                    <!--列表-->
                    <!--右边底部-->
                    <div class="r_foot">
                        <div class="r_foot_m">
                            <span>
                    <input name="" type="checkbox" value="">
                    <em>全部选中</em>
                </span>
                            <a href="" class="btn">删除</a>
                            <a href="" class="btn">刷新</a>
                            <!--分页-->
                            <div class="page">
                                <a href="" class="prev"><img src="admin_assets/images/icon7.png" alt=""/></a>
                                <a class="now">1</a>
                                <a href="">2</a>
                                <a href="">3</a>
                                <a href="">4</a>
                                <a href="">5</a>
                                <a href="">6</a>
                                <a href="" class="next"><img src="admin_assets/images/icon8.png" alt=""/></a>
                            </div>
                            <!--分页-->
                        </div>
                    </div>
                </form>
                <!--右边底部-->
            </div>
            <!--会议列表-->
        </div>
    </div>
@endsection