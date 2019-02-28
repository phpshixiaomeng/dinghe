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
@section('style')
<style type="text/css">
.list_hy{
    background:#FFF;
    margin-top:8px;
    font-size:12px;
    border-left:1px solid #DEDEDE;
    border-top:1px solid #DEDEDE;
    width:1000px;
    margin-left:20px;
}
.list_hy th , .list_hy td{
    height:48px;
    line-height:48px;
    font-size:14px;
    color:#434343;
    font-weight:bold;
    padding-left:10px;
    border-right:1px solid #DEDEDE;
    border-bottom:1px solid #DEDEDE;
}
.list_hy th{
    border-bottom:2px solid #DEDEDE;
}
.list_hy th div{
    width:100%;
    height:48px;
    position:relative;
}
.list_hy th div a{
    display:block;
    width:8px;
    height:6px;
    background:url(../images/icon6.png) no-repeat;
    position:absolute;
    right:10px;
    top:17px;
}
.list_hy th div a.down{
    background:url(../images/icon6_1.png) no-repeat;
    top:26px;
}
.list_hy td{
    font-weight:normal;
    color:#656565;
    height:40px;
    line-height:40px;
    font-size:12px;
}
.list_hy tr:hover td{
    background:#F5F5F5;
}
.list_hy .xz{
    width:50px;
    text-align:center;
    padding:0px;
}
.list_hy .xz input , .r_foot_m span input{
    width:16px;
    height:16px;
    border:1px solid #DEDEDE;
    background:none;
    vertical-align:middle;
}
.list_hy .zt{
    width:65px;
}
</style>
@endsection
@section('content')
    <div id="right_ctn">
        <div class="right_m">
            <!--会议列表-->
            <div class="hy_game">
                <div class="box_t">
                    <span class="name">游戏列表</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="../images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">游戏管理</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">游戏列表</a>
                    </div>
                    <!--当前位置-->
                </div>
                <!--查询-->
                <div class="search">
                    <span>按游戏名称查询：</span>
                    <div class="s_text"><input name="" type="text"></div>
                    <a href="" class="btn">查询</a>
                </div>
                <!--查询-->
                <div class="space_hx">&nbsp;</div>
                <!--列表-->
                <form action="" method="post">
                    <table class="table table-hover">
                        <tr>
                            <th class="xz" scope="col" >选择</th>
                            <th style="text-align: center;width:100px;">游戏名称</th>
                            <th scope="col" style="text-align: center;">游戏价格</th>
                            <th scope="col" style="text-align: center;">游戏详情</th>
                            <th scope="col" style="text-align: center">游戏配置</th>
                            <th scope="col" style="text-align: center">游戏销量</th>
                            <th scope="col" style="text-align: center">游戏库存</th>
                            <th scope="col" style="text-align: center">是否上架</th>
                            <th scope="col" style="text-align: center">游戏图片</th>
                            <th scope="col" style="text-align: center">操作</th>
                        </tr>
                        <tr>
                            <td class="xz"><input name="" type="checkbox" value=""></td>
                            <td style="text-align: center">ip64/1</td>
                            <td style="text-align: center">-</td>
                            <td style="text-align: center">2012-10-11 13:28</td>
                            <td style="text-align: center">永久会议</td>
                            <td style="text-align: center">-</td>
                            <td style="text-align: center">-</td>
                            <td style="text-align: center">-</td>
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