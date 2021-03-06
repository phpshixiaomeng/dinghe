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
                    <span class="name">终端召集会议模板</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">会议管理</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">终端召集会议模板</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--新建会议-->
                <form action="" method="post">
                    <div class="xjhy">
                        <!--高级配置-->
                        <ul class="hypz gjpz clearfix">
                            <li class="clearfix">
                                <span class="title">模板编号：</span>
                                <div class="li_r">
                                    <input class="chang" name="" type="text">
                                    <i>*</i>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">主动呼叫终端：</span>
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
                                <span class="title">会议码率：</span>
                                <div class="li_r xial">
                                    <div class="xial_w">
                                        <div class="xial_m">
                                            <input class="duan" name="" type="text">
                                            <span>&nbsp;</span>
                                        </div>
                                        <ul class="xl_ctn">
                                            <li>768K18</li>
                                            <li>768K18</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">终端上端参加混音：</span>
                                <div class="li_r">
                                    <span class="radio">
                                <input checked="checked" name="radio2" type="radio" value="">
                                <em>否</em>
                            </span>
                                    <span class="radio">
                                <input name="radio2" type="radio" value="">
                                <em>是</em>
                            </span>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">会议容量：</span>
                                <div class="li_r">
                                    <input name="" type="text">
                                    <i>*</i>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">辅视频码率：</span>
                                <div class="li_r xial">
                                    <div class="xial_w">
                                        <div class="xial_m">
                                            <input class="duan" name="" type="text">
                                            <span>&nbsp;</span>
                                        </div>
                                        <ul class="xl_ctn">
                                            <li>无</li>
                                            <li>768K18</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">多画面数：</span>
                                <div class="li_r xial">
                                    <div class="xial_w">
                                        <div class="xial_m">
                                            <input class="duan" name="" type="text">
                                            <span>&nbsp;</span>
                                        </div>
                                        <ul class="xl_ctn">
                                            <li>4</li>
                                            <li>5</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">辅视频类型：</span>
                                <div class="li_r xial">
                                    <div class="xial_w">
                                        <div class="xial_m">
                                            <input class="duan" name="" type="text">
                                            <span>&nbsp;</span>
                                        </div>
                                        <ul class="xl_ctn">
                                            <li>私有协议</li>
                                            <li>私有协议</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">多画面显示模式：</span>
                                <div class="li_r">
                                    <span class="radio">
                                <input checked="checked" name="radio3" type="radio" value="">
                                <em>指定</em>
                            </span>
                                    <span class="radio">
                                <input name="radio3" type="radio" value="">
                                <em>自动</em>
                            </span>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">辅视频能力：</span>
                                <div class="li_r xial">
                                    <div class="xial_w">
                                        <div class="xial_m">
                                            <input class="duan" name="" type="text">
                                            <span>&nbsp;</span>
                                        </div>
                                        <ul class="xl_ctn">
                                            <li>H.263_CIF</li>
                                            <li>H.263_CIF</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">WEB 监控画面数：</span>
                                <div class="li_r xial">
                                    <div class="xial_w">
                                        <div class="xial_m">
                                            <input class="duan" name="" type="text">
                                            <span>&nbsp;</span>
                                        </div>
                                        <ul class="xl_ctn">
                                            <li>不支持</li>
                                            <li>支持</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">是否启用IP自动降速：</span>
                                <div class="li_r">
                                    <span class="radio">
                                <input checked="checked" name="radio6" type="radio" value="">
                                <em>否</em>
                            </span>
                                    <span class="radio">
                                <input name="radio6" type="radio" value="">
                                <em>是</em>
                            </span>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">广播源自看：</span>
                                <div class="li_r">
                                    <span class="radio">
                                <input checked="checked" name="radio7" type="radio" value="">
                                <em>否</em>
                            </span>
                                    <span class="radio">
                                <input name="radio7" type="radio" value="">
                                <em>是</em>
                            </span>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">音频加密算法：</span>
                                <div class="li_r xial">
                                    <div class="xial_w">
                                        <div class="xial_m">
                                            <input class="duan" name="" type="text">
                                            <span>&nbsp;</span>
                                        </div>
                                        <ul class="xl_ctn">
                                            <li>不支持加密</li>
                                            <li>支持加密</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">视频能力：</span>
                                <div class="li_r xial">
                                    <div class="xial_w">
                                        <div class="xial_m">
                                            <input class="duan" name="" type="text">
                                            <span>&nbsp;</span>
                                        </div>
                                        <ul class="xl_ctn">
                                            <li>H.263_CIF</li>
                                            <li>H.263_CIF</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">主视频加密算法：</span>
                                <div class="li_r xial">
                                    <div class="xial_w">
                                        <div class="xial_m">
                                            <input class="duan" name="" type="text">
                                            <span>&nbsp;</span>
                                        </div>
                                        <ul class="xl_ctn">
                                            <li>不支持加密</li>
                                            <li>支持加密</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">音频能力：</span>
                                <div class="li_r xial">
                                    <div class="xial_w">
                                        <div class="xial_m">
                                            <input class="duan" name="" type="text">
                                            <span>&nbsp;</span>
                                        </div>
                                        <ul class="xl_ctn">
                                            <li>G.722</li>
                                            <li>G.722</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">辅视频加密算法：</span>
                                <div class="li_r xial">
                                    <div class="xial_w">
                                        <div class="xial_m">
                                            <input class="duan" name="" type="text">
                                            <span>&nbsp;</span>
                                        </div>
                                        <ul class="xl_ctn">
                                            <li>不支持加密</li>
                                            <li>支持加密</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="tj_btn">
                                <a href="" class="back">返回</a>
                                <a href="">保存</a>
                            </li>
                        </ul>
                        <!--高级配置-->
                    </div>
                </form>
                <!--新建会议-->
            </div>
            <!--会议列表-->
        </div>
    </div>
@endsection