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
                    <span class="name">模块控制</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">系统诊断</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">模块控制</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--列表-->
                <form action="" method="post">
                    <table cellpadding="0" cellspacing="0" class="list_hy">
                        <tr>
                            <th scope="col" width="215">模块名称</th>
                            <th scope="col">控制</th>
                        </tr>
                        <tr>
                            <td>网络处理模块</td>
                            <td>
                                <div class="mkkz">
                                    <div class="mkkz_a">
                                        <span class="redio">
                                <input name="redio1" type="radio" checked="checked" value="">
                                <em>LAN1</em>
                            </span>
                                        <span class="redio">
                                <input name="redio1" type="radio" value="">
                                <em>LAN2</em>
                            </span>
                                    </div>
                                    <ul class="clearfix">
                                        <li><a href="">UDP环回</a></li>
                                        <li><a href="">RTP环回</a></li>
                                        <li><a href="">PCI环回</a></li>
                                        <li><a href="" class="hui">取消</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>语音处理模块</td>
                            <td>
                                <div class="mkkz">
                                    <div class="mkkz_a">
                                        <span class="redio">
                                <input name="redio2" type="radio" checked="checked" value="">
                                <em>APU1</em>
                            </span>
                                        <span class="redio">
                                <input name="redio2" type="radio" value="">
                                <em>APU2</em>
                            </span>
                                    </div>
                                    <ul class="clearfix">
                                        <li><a href="">音频PCI环回</a></li>
                                        <li><a href="">视频PCI环回</a></li>
                                        <li><a href="">媒体PCI环回</a></li>
                                        <li><a href="">音频编解码环回</a></li>
                                        <li><a href="">音频AHW环回</a></li>
                                        <li><a href="">视频VHW环回</a></li>
                                        <li><a href="">媒体总线环回</a></li>
                                        <li><a href="" class="hui">取消</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>网络处理模块</td>
                            <td>
                                <div class="mkkz">
                                    <div class="space_hx">&nbsp;</div>
                                    <ul class="clearfix">
                                        <li><a href="">音频BSP环回</a></li>
                                        <li><a href="">音频MHW环回</a></li>
                                        <li><a href="" class="hui">取消</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <!--列表-->
                </form>
            </div>
            <!--会议列表-->
        </div>
    </div>
@endsection