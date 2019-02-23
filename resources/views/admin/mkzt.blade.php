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
                    <span class="name">流媒体服务器控制</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">系统诊断</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">模块状态</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--列表-->
                <form action="" method="post">
                    <table cellpadding="0" cellspacing="0" class="list_hy">
                        <tr>
                            <th scope="col" colspan="2">模块名称</th>
                            <th scope="col">状态</th>
                            <th scope="col">版本号</th>
                        </tr>
                        <tr>
                            <td colspan="2">主控模块</td>
                            <td>正常</td>
                            <td>315_20080610</td>
                        </tr>
                        <tr>
                            <td colspan="2">协议栈</td>
                            <td>正常</td>
                            <td>315_20080610</td>
                        </tr>
                        <tr>
                            <td rowspan="2">网络处理模块</td>
                            <td>1</td>
                            <td>正常</td>
                            <td>315_20080610</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>正常</td>
                            <td>315_20080610</td>
                        </tr>
                        <tr>
                            <td width="150" rowspan="2">语音处理模块</td>
                            <td>1</td>
                            <td>正常</td>
                            <td>315_20080610</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>正常</td>
                            <td>315_20080610</td>
                        </tr>
                    </table>
                    <!--列表-->
                </form>
            </div>
            <!--会议列表-->
        </div>
    </div>
@endsection