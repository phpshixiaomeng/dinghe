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
                    <span class="name">会议列表</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="../images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">会议管理</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">会议列表</a>
                    </div>
                    <!--当前位置-->
                </div>
                <!--查询-->
                <div class="search">
                    <span>按会议名称查询：</span>
                    <div class="s_text"><input name="" type="text"></div>
                    <a href="" class="btn">查询</a>
                </div>
                <!--查询-->
                <div class="space_hx">&nbsp;</div>
                <!--列表-->
                <form action="" method="post">
                    <table cellpadding="0" cellspacing="0" class="list_hy">
                        <tr>
                            <th class="xz" scope="col">选择</th>
                            <th scope="col">
                                <div>管理员名<a href="" class="up">&nbsp;</a><a href="" class="down">&nbsp;</a></div>
                            </th>
                            <th class="zt" scope="col">
                                <div>状态<a href="" class="up">&nbsp;</a><a href="" class="down">&nbsp;</a></div>
                            </th>
                            <th scope="col" style="text-align: center">增加时间</th>
                            <th scope="col" style="text-align: center">修改时间</th>
                            <th scope="col" style="text-align: center">管理员类型</th>
                            <th scope="col" style="text-align: center">操作</th>
                        </tr>
                        <tr>
                            <td class="xz"><input name="" type="checkbox" value=""></td>
                            <td style="text-align: center">ip64/1</td>
                            <td style="text-align: center">-</td>
                            <td style="text-align: center">2012-10-11 13:28</td>
                            <td style="text-align: center">永久会议</td>
                            <td style="text-align: center">-</td>
                            <td style="text-align: center"><a href="#" class="btn" style="color: red;">删除</a><a href="#" class="btn" style="color: #FFA500;">编辑</a></td>
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
                                <a href="" class="prev"><img src="../images/icon7.png" alt=""/></a>
                                <a class="now">1</a>
                                <a href="">2</a>
                                <a href="">3</a>
                                <a href="">4</a>
                                <a href="">5</a>
                                <a href="">6</a>
                                <a href="" class="next"><img src="../images/icon8.png" alt=""/></a>
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