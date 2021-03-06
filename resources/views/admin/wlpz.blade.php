
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
                    <span class="name">网络配置</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">系统配置</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">网络配置</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--网络配置-->
                <form action="" method="post">
                    <div class="xjhy" style="padding:0px;">
                        <div class="tabBox_t">
                            <div class="tabBox">
                                <ul class="tabNav">
                                    <li class="now" style="width:150px;"><span style="width:150px;">网口地址配置</span></li>
                                    <li style="width:150px;"><span style="width:150px;">本地地址列表</span></li>
                                </ul>
                                <div class="tabCont" style="display:block;">
                                    <!--网口地址配置-->
                                    <ul class="hypz gjpz clearfix">
                                        <table cellpadding="0" cellspacing="0" class="wlpz">
                                            <tr>
                                                <td>
                                                    <li class="clearfix">
                                                        <span class="title">IP地址：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <span class="title">子网掩码：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <span class="title">网关：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <span class="title">NAT地址：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                </td>
                                                <td>
                                                    <li class="clearfix">
                                                        <span class="title">IP地址3：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <span class="title">子网掩码：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <span class="title">网关：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <span class="title">NAT地址：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <li class="clearfix">
                                                        <span class="title">IP地址2：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <span class="title">子网掩码：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <span class="title">网关：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <span class="title">NAT地址：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                </td>
                                                <td>
                                                    <li class="clearfix">
                                                        <span class="title">公网IP地址：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <span class="title">子网掩码：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <span class="title">网关：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                    <li>&nbsp;</li>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <li class="clearfix">
                                                        <span class="title">LAN MAC地址：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                </td>
                                                <td>
                                                    <li class="clearfix">
                                                        <span class="title">WAN MAC地址：</span>
                                                        <div class="li_r">
                                                            <input name="" type="text">
                                                        </div>
                                                    </li>
                                                </td>
                                            </tr>
                                        </table>
                                        <li class="tj_btn">
                                            <a href="">保存</a>
                                        </li>
                                    </ul>
                                    <!--网口地址配置-->
                                </div>
                                <div class="tabCont">
                                    <!--本地地址列表-->
                                    <table cellpadding="0" cellspacing="0" class="list_hy dzlb">
                                        <tr>
                                            <th width="65" scope="col">序号</th>
                                            <th scope="col">IP地址</th>
                                            <th scope="col">子网掩码</th>
                                            <th width="65" scope="col">序号</th>
                                            <th scope="col">IP地址</th>
                                            <th scope="col">子网掩码</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                            <td>11</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                            <td>12</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                            <td>13</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                            <td>14</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                            <td>15</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                            <td>16</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                            <td>17</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                            <td>18</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                            <td>19</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                            <td>20</td>
                                            <td><input name="" type="text"></td>
                                            <td><input name="" type="text"></td>
                                        </tr>
                                    </table>
                                    <ul class="hypz gjpz clearfix">
                                        <li class="tj_btn">
                                            <a href="">保存</a>
                                        </li>
                                    </ul>
                                    <!--本地地址列表-->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--网络配置-->
            </div>
            <!--会议列表-->
        </div>
    </div>
@endsection