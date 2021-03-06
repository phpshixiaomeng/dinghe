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
                    <span class="name">GK配置</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">系统配置</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">GK配置</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--GK配置-->
                <form action="" method="post">
                    <div class="xjhy" style="padding:0px;">
                        <div class="tabBox_t">
                            <div class="tabBox">
                                <ul class="tabNav">
                                    <li class="now"><span>基本配置</span></li>
                                    <li><span>静态地址解析表</span></li>
                                    <li><span>子域配置</span></li>
                                    <li><span>邻域配置</span></li>
                                    <li><span>路由呼叫表</span></li>
                                    <li><span>H.235前缀</span></li>
                                    <li><span>子网限制表</span></li>
                                </ul>
                                <div class="tabCont" style="display:block;">
                                    <!--基本配置-->
                                    <ul class="hypz gjpz gjpz_a clearfix">
                                        <li class="clearfix">
                                            <span class="title">GK ID：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">向前转发LRQ：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd1" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd1" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">RAS端口：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">允许端点更新CS地址：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd2" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd2" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">CS端口：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">启用多播：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd3" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd3" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">呼叫状态报告间隔：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>秒</i>
                                            </div>
                                        </li>
                                        <li>&nbsp;</li>
                                        <li class="clearfix">
                                            <span class="title">存活注册间隔：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                                <i>秒</i>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">启用上级GK：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd4" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd4" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">GK级别：</span>
                                            <div class="li_r xial">
                                                <div class="xial_w">
                                                    <div class="xial_m">
                                                        <input class="duan" name="" type="text">
                                                        <span>&nbsp;</span>
                                                    </div>
                                                    <ul class="xl_ctn">
                                                        <li>顶级GK</li>
                                                        <li>低级GK</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">上级GK地址：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">启用NAT：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd5" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd5" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">上级GK端口号：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">启用H.235：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd6" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd6" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">上级GK ID：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">H.235密码：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="title">上级GK H.235密码：</span>
                                            <div class="li_r">
                                                <input name="" type="text">
                                            </div>
                                        </li>
                                        <li class="tj_btn">
                                            <a href="">保存</a>
                                        </li>
                                    </ul>
                                    <!--基本配置-->
                                </div>
                                <div class="tabCont">
                                    <!--静态地址解析表-->
                                    <ul class="hypz clearfix">
                                        <li class="clearfix">
                                            <span class="title">启用本地静态解析：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd1" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd1" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <div class="space_hx">&nbsp;</div>
                                        <table cellpadding="0" cellspacing="0" class="list_hy dzlb">
                                            <tr>
                                                <th width="65" scope="col">序号</th>
                                                <th scope="col">IP地址</th>
                                                <th width="75" scope="col">端口</th>
                                                <th width="85" scope="col">区号</th>
                                                <th width="65" scope="col">序号</th>
                                                <th scope="col">IP地址</th>
                                                <th width="75" scope="col">端口</th>
                                                <th width="85" scope="col">区号</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td>11</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td>12</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td>13</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td>14</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td>15</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td>16</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td>17</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td>18</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td>19</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td>20</td>
                                                <td><input name="" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                            </tr>
                                        </table>
                                        <div class="space_hx">&nbsp;</div>
                                        <li class="tj_btn">
                                            <a href="">保存</a>
                                        </li>
                                    </ul>
                                    <!--静态地址解析表-->
                                </div>
                                <div class="tabCont">
                                    <!--子域配置-->
                                    <ul class="hypz clearfix">
                                        <li class="clearfix">
                                            <span class="title">启用子域GK：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd1" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd1" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <div class="space_hx">&nbsp;</div>
                                        <table cellpadding="0" cellspacing="0" class="list_hy dzlb">
                                            <tr>
                                                <th width="65" scope="col">序号</th>
                                                <th width="90" scope="col">IP地址</th>
                                                <th width="70" scope="col">端口</th>
                                                <th width="70" scope="col">区号</th>
                                                <th width="80" scope="col">GK ID</th>
                                                <th width="105" scope="col">H.235密码</th>
                                                <th width="65" scope="col">序号</th>
                                                <th width="90" scope="col">IP地址</th>
                                                <th width="70" scope="col">端口</th>
                                                <th width="70" scope="col">区号</th>
                                                <th width="80" scope="col">GK ID</th>
                                                <th width="105" scope="col">H.235密码</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>11</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>12</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>13</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>14</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>15</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>16</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>17</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>18</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>19</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>20</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                        </table>
                                        <div class="space_hx">&nbsp;</div>
                                        <li class="tj_btn">
                                            <a href="">保存</a>
                                        </li>
                                    </ul>
                                    <!--子域配置-->
                                </div>
                                <div class="tabCont">
                                    <!--邻域配置-->
                                    <ul class="hypz clearfix">
                                        <li class="clearfix">
                                            <span class="title">启用邻域GK：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd1" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd1" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <div class="space_hx">&nbsp;</div>
                                        <table cellpadding="0" cellspacing="0" class="list_hy dzlb">
                                            <tr>
                                                <th width="65" scope="col">序号</th>
                                                <th width="90" scope="col">IP地址</th>
                                                <th width="70" scope="col">端口</th>
                                                <th width="70" scope="col">区号</th>
                                                <th width="80" scope="col">GK ID</th>
                                                <th width="105" scope="col">H.235密码</th>
                                                <th width="65" scope="col">序号</th>
                                                <th width="90" scope="col">IP地址</th>
                                                <th width="70" scope="col">端口</th>
                                                <th width="70" scope="col">区号</th>
                                                <th width="80" scope="col">GK ID</th>
                                                <th width="105" scope="col">H.235密码</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>11</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>12</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>13</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>14</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>15</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>16</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>17</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>18</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>19</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                                <td>20</td>
                                                <td><input name="" class="w70" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w50" type="text"></td>
                                                <td><input name="" class="w60" type="text"></td>
                                                <td><input name="" class="w80" type="text"></td>
                                            </tr>
                                        </table>
                                        <div class="space_hx">&nbsp;</div>
                                        <li class="tj_btn">
                                            <a href="">保存</a>
                                        </li>
                                    </ul>
                                    <!--邻域配置-->
                                </div>
                                <div class="tabCont">
                                    <!--路由呼叫表-->
                                    <ul class="hypz clearfix">
                                        <li class="clearfix">
                                            <span class="title">路由呼叫：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd1" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd1" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <div class="space_hx">&nbsp;</div>
                                        <table cellpadding="0" cellspacing="0" class="list_hy dzlb">
                                            <tr>
                                                <th width="65" scope="col">序号</th>
                                                <th scope="col">前缀号码</th>
                                                <th width="65" scope="col">序号</th>
                                                <th scope="col">前缀号码</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>11</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>12</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>13</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>14</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>15</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>16</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>17</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>18</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>19</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>20</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                        </table>
                                        <div class="space_hx">&nbsp;</div>
                                        <li class="tj_btn">
                                            <a href="">保存</a>
                                        </li>
                                    </ul>
                                    <!--路由呼叫表-->
                                </div>
                                <div class="tabCont">
                                    <!--H.235前缀-->
                                    <ul class="hypz clearfix">
                                        <div class="space_hx">&nbsp;</div>
                                        <table cellpadding="0" cellspacing="0" class="list_hy dzlb">
                                            <tr>
                                                <th width="65" scope="col">序号</th>
                                                <th scope="col">前缀号码</th>
                                                <th width="65" scope="col">序号</th>
                                                <th scope="col">前缀号码</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>11</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>12</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>13</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>14</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>15</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>16</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>17</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>18</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>19</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td><input name="" class="w240" type="text"></td>
                                                <td>20</td>
                                                <td><input name="" class="w240" type="text"></td>
                                            </tr>
                                        </table>
                                        <div class="space_hx">&nbsp;</div>
                                        <li class="tj_btn">
                                            <a href="">保存</a>
                                        </li>
                                    </ul>
                                    <!--H.235前缀-->
                                </div>
                                <div class="tabCont">
                                    <!--子网限制表-->
                                    <ul class="hypz clearfix">
                                        <li class="clearfix">
                                            <span class="title">启用子网限制：</span>
                                            <div class="li_r">
                                                <span class="radio">
                                            <input checked="checked" name="hjzd1" type="radio" value="">
                                            <em>否</em>
                                        </span>
                                                <span class="radio">
                                            <input name="hjzd1" type="radio" value="">
                                            <em>是</em>
                                        </span>
                                            </div>
                                        </li>
                                        <div class="space_hx">&nbsp;</div>
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
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td>11</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td>12</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td>13</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td>14</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td>15</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td>16</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td>17</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td>18</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td>19</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td>20</td>
                                                <td><input name="" class="w140" type="text"></td>
                                                <td><input name="" class="w140" type="text"></td>
                                            </tr>
                                        </table>
                                        <div class="space_hx">&nbsp;</div>
                                        <li class="tj_btn">
                                            <a href="">保存</a>
                                        </li>
                                    </ul>
                                    <!--子网限制表-->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--GK配置-->
            </div>
            <!--会议列表-->
        </div>
    </div>
@endsection