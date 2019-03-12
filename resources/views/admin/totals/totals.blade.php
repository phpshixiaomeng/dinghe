@extends('admin/public/public')
@section('function')
    $(function() {
        //自适应屏幕宽度
        window.onresize = function() { location = location };

        var main_h = $(window).height();
        $('.hy_list').css('height', main_h - 45 + 'px');

        var search_w = $(window).width() - 40;
        $('.search').css('width', search_w + 'px');
        //$('.list_hy').css('width',search_w+'px');
    });
@endsection
@section('content')
    <div id="right_ctn">
        <div class="right_m">
            <!--会议列表-->
            <div class="hy_list">
                <div class="box_t">
                    <span class="name">统计列表</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="../images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">统计管理</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">统计列表</a>
                    </div>
                    <!--当前位置-->
                </div>
                <!--查询-->
                <!-- <div class="search">
                    <span>按统计信息查询：</span>
                    <div class="s_text"><input name="search" type="text" value="{{ $request['search'] or '' }}" placeholder="请输入搜索的关键字"> </div>
                    <a href="" class="btn btn-info">查询</a>
                </div> -->
                <!--查询-->
                <div class="space_hx">&nbsp;</div>
                <!--列表-->
                <form action="" method="post">
                    <table class="search list_hy">
                        <tr>
                        <th class="xz" scope="col">选择</th>
                            <th scope="col" style="text-align: center">网站访问量</th>
                            <th scope="col" style="text-align: center">游戏数量</th>
                            <th scope="col" style="text-align: center">用户数量</th>
                            <th scope="col" style="text-align: center">vip数量</th>
                            <th scope="col" style="text-align: center">订单数量</th>
                            <th scope="col" style="text-align: center">总收入</th>
                            <th scope="col" style="text-align: center">操作</th>
                        </tr>
                        <tr>
                            <td class="xz"><input name="" type="checkbox" value=""></td>
                            <td style="text-align: center">{{ $res->web_volume }}</td>
                            <td style="text-align: center">{{ $a }}</td>
                            <td style="text-align: center">{{ $b }}</td>
                            <td style="text-align: center">{{ $d }}</td>
                            <td style="text-align: center">{{ $e }}</td>
                            <td style="text-align: center">{{ $g }}</td>
                            <td style="text-align: center"></td>
                        </tr>


                    </table>
                    <!--列表-->
                    <!--右边底部-->
                </form>
                <!--右边底部-->
            </div>
            <!--会议列表-->
        </div>
    </div>
@endsection