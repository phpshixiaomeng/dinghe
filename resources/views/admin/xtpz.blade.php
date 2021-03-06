@extends('admin/public/public')
@section('function')

    $(function() {
        //自适应屏幕宽度
        window.onresize = function() { location = location };

        var main_h = $(window).height();
        $('.hy_list').css('height', main_h - 45 + 'px');

        var main_w = $(window).width();
        $('.xjhy').css('width', main_w - 40 + 'px');


        $(".tabBox .tabCont:first").css("display", "block");
        $(".tabBox .tabNav li").click(function() {
            $(this).siblings("li").removeClass("now");
            $(this).addClass("now");
            $(this).parents(".tabBox").find(".tabCont").css("display", "none");
            var i = $(this).index();
            $(this).parents(".tabBox").find(".tabCont:eq(" + i + ")").css("display", "block");
        });

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
                    <span class="name">MCU配置</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">系统配置</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">MCU配置</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--MCU配置-->
                <form action="" method="post">
                    <div class="xjhy" style="padding:0px;">
                        <div class="tabBox_t">
                            <div class="tabBox">
                                <ul class="tabNav">
                                    <li class="now"><span>基本配置</span></li>
                                    <li><span>高级配置</span></li>
                                    <li><span>安全配置</span></li>
                                    <li><span>SIP配置</span></li>
                                </ul>
                                <div class="tabCont" style="display:block;">
                                    <!--基本配置-->
                                    <ul class="hypz">
                                        <li class="clearfix">
                                            <span class="title">名称：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>*</i>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">号码：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>*</i>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">会议特服号：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>*</i>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">终端召集会议特服号：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>*</i>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">GK：</span>
                                            <div class="li_r xial">
                                                <div class="xial_w xial_l">
                                                    <div class="xial_m" style="width:188px;">
                                                        <input name="" type="text">
                                                        <span>&nbsp;</span>
                                                    </div>
                                                    <ul class="xl_ctn">
                                                        <li>内置</li>
                                                        <li>内置</li>
                                                        <li>内置</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">GK  IP地址：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>*</i>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">GK RAS端口：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>*</i>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">系统时间：</span>
                                            <div class="li_r xial">
                                                <input name="" class="duan" style="width:120px;" type="text">
                                                <div class="xial_w" style="margin:0px; margin-left:15px;">
                                                    <div class="xial_m">
                                                        <input class="duana" name="" type="text">
                                                        <span>&nbsp;</span>
                                                    </div>
                                                    <ul class="xl_ctn">
                                                        <li>14</li>
                                                        <li>2</li>
                                                        <li>3</li>
                                                    </ul>
                                                    <em>：</em>
                                                </div>
                                                <div class="xial_w" style="margin:0px;">
                                                    <div class="xial_m">
                                                        <input class="duana" name="" type="text">
                                                        <span>&nbsp;</span>
                                                    </div>
                                                    <ul class="xl_ctn">
                                                        <li>46</li>
                                                        <li>30</li>
                                                        <li>45</li>
                                                    </ul>
                                                    <em>：</em>
                                                </div>
                                                <div class="xial_w" style="margin:0px;">
                                                    <div class="xial_m">
                                                        <input class="duana" name="" type="text">
                                                        <span>&nbsp;</span>
                                                    </div>
                                                    <ul class="xl_ctn">
                                                        <li>39</li>
                                                        <li>30</li>
                                                        <li>45</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="tj_btn">
                                            <a href="">保存</a>
                                        </li>
                                    </ul>
                                    <!--基本配置-->
                                </div>
                                <div class="tabCont">
                                    <!--高级配置-->
                                    <ul class="hypz gjpz gjpz_a clearfix">
                                        <li class="clearfix">
                                            <span class="title">音频IP包优先级：</span>
                                            <div class="li_r xial">
                                                <div class="xial_w">
                                                    <div class="xial_m">
                                                        <input class="duan" name="" type="text">
                                                        <span>&nbsp;</span>
                                                    </div>
                                                    <ul class="xl_ctn">
                                                        <li>缺省</li>
                                                        <li>缺省</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">音频ITOS选项：</span>
                                            <div class="li_r xial">
                                                <div class="xial_w">
                                                    <div class="xial_m">
                                                        <input class="duan" name="" type="text">
                                                        <span>&nbsp;</span>
                                                    </div>
                                                    <ul class="xl_ctn">
                                                        <li>一般</li>
                                                        <li>一般</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">视频IP包优先级：</span>
                                            <div class="li_r xial">
                                                <div class="xial_w">
                                                    <div class="xial_m">
                                                        <input class="duan" name="" type="text">
                                                        <span>&nbsp;</span>
                                                    </div>
                                                    <ul class="xl_ctn">
                                                        <li>缺省</li>
                                                        <li>缺省</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">视频TOS选项：</span>
                                            <div class="li_r xial">
                                                <div class="xial_w">
                                                    <div class="xial_m">
                                                        <input class="duan" name="" type="text">
                                                        <span>&nbsp;</span>
                                                    </div>
                                                    <ul class="xl_ctn">
                                                        <li>一般</li>
                                                        <li>一般</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">IP网络MTU值：</span>
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
                                            <span class="title">RAS端口：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">H.245最大端口：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">H.245最小端口：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">终端断线自动重呼：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">唇音同步：</span>
                                            <div class="li_r xial">
                                                <div class="xial_w">
                                                    <div class="xial_m">
                                                        <input class="duan" name="" type="text">
                                                        <span>&nbsp;</span>
                                                    </div>
                                                    <ul class="xl_ctn">
                                                        <li>300ms</li>
                                                        <li>300ms</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">VCF(0~3000)：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>ms</i>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">VCU(0~3000)：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>ms</i>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title" style="line-height:15px;">VCU Interval (3000~30000)：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>ms</i>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">VCB Delay(0~3000)：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>ms</i>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">配置NAT：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">QOS网络阀值配置：</span>
                                            <div class="li_r">
                                                <i>丢包率>=</i>
                                                <input name="" class="duanb" type="text">
                                                <i>%，抖动>=</i>
                                                <input name="" class="duanb" type="text">
                                                <i>ms 上报</i>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title" style="line-height:15px;">H.460存活检查周期(300~1800)：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>ms</i>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">支持H.460：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">接受ZXMS80管理：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="tj_btn">
                                            <a href="">保存</a>
                                        </li>
                                    </ul>
                                    <!--高级配置-->
                                </div>
                                <div class="tabCont">
                                    <!--安全配置-->
                                    <ul class="hypz">
                                        <li class="clearfix">
                                            <span class="title">支持H.235：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">GX ID：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">共享密码：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">消息检查模式：</span>
                                            <div class="li_r" style="width:500px;">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd" type="radio" value="">
                                            <em>检查所有消息</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd" type="radio" value="">
                                            <em>只检查RAS消息</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd" type="radio" value="">
                                            <em>不检查消息（只有媒体加密）</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">进行完整性检查：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">进行时间检查：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title" style="line-height:15px;">允许的最大时间差(3000~30000)：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>ms</i>
                                            </div>
                                        </li>
                                        <li class="tj_btn">
                                            <a href="">保存</a>
                                        </li>
                                    </ul>
                                    <!--安全配置-->
                                </div>
                                <div class="tabCont">
                                    <!--SIP配置-->
                                    <ul class="hypz">
                                        <li class="clearfix">
                                            <span class="title">支持SIP：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">代理服务器：</span>
                                            <div class="li_r xial">
                                                <div class="xial_w">
                                                    <div class="xial_m" style="width:190px;">
                                                        <input name="" type="text" style="width:160px;">
                                                        <span>&nbsp;</span>
                                                    </div>
                                                    <ul class="xl_ctn">
                                                        <li>不启用</li>
                                                        <li>启用</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">代理服务器地址：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">代理服务器端口：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">注册服务器地址：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">注册服务器端口：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">信令检查模式：</span>
                                            <div class="li_r" style="width:500px;">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd" type="radio" value="">
                                            <em>关闭</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd" type="radio" value="">
                                            <em>主动发送</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd" type="radio" value="">
                                            <em>被动检测</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">主动检测时间间隔：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>秒</i>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">被动检测时间间隔：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>秒</i>
                                            </div>
                                        </li>
                                        <li class="tj_btn">
                                            <a href="">保存</a>
                                        </li>
                                    </ul>
                                    <!--SIP配置-->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--MCU配置-->
            </div>
            <!--会议列表-->
        </div>
    </div>
@endsection