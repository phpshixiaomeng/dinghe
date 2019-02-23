
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
                    <span class="name">系统日志</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">日记管理</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">系统日志</a>
                    </div>
                    <!--当前位置-->
                </div>
                <!--查询-->
                <div class="search gzrj">
                    <div class="leix">
                        <span>类型：</span>
                        <div class="xial_w xial_l">
                            <div class="xial_m">
                                <input name="" type="text">
                                <span>&nbsp;</span>
                            </div>
                            <ul class="xl_ctn">
                                <li>未处理故障</li>
                                <li>已处理故障</li>
                                <li>未处理故障</li>
                            </ul>
                        </div>
                    </div>
                    <div class="riqi">
                        <span>日期：从</span>
                        <input name="" type="text">
                        <span>至</span>
                        <input name="" type="text">
                    </div>
                    <a href="" class="btn">查询</a>
                </div>
                <!--查询-->
                <div class="space_hx">&nbsp;</div>
                <!--列表-->
                <form action="" method="post">
                    <table cellpadding="0" cellspacing="0" class="list_hy">
                        <tr>
                            <th scope="col" width="270">事件来源</th>
                            <th scope="col">事件类型</th>
                            <th scope="col">发生时间</th>
                            <th scope="col">恢复时间</th>
                            <th scope="col">处理人</th>
                        </tr>
                        <tr>
                            <td colspan="5" style="text-align:center;">没有数据！</td>
                        </tr>
                    </table>
                    <!--列表-->
                    <!--右边底部-->
                    <div class="r_foot">
                        <div class="r_foot_m">
                            <a href="" class="btn">保存</a>
                            <!--分页-->
                            <div class="page">
                                <a href="" class="prev"><img src="Assets/images/icon7.png" alt=""/></a>
                                <a class="now">1</a>
                                <a href="">2</a>
                                <a href="">3</a>
                                <a href="">4</a>
                                <a href="">5</a>
                                <a href="">6</a>
                                <a href="" class="next"><img src="Assets/images/icon8.png" alt=""/></a>
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