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
</script>

    <div id="right_ctn">
        <div class="right_m">
            <!--会议列表-->
            <div class="hy_list">
                <div class="box_t">
                    <span class="name">图片列表</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="../images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">图片管理</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">图片列表</a>
                    </div>
                    <!--当前位置-->
                </div>
                <!--查询-->
                <form action="/admin/tjfl" method="get">
                    <div class="search">
                        <span>按游戏名称查询：</span>
                        <div class="s_text">
                            <input name="search" type="text" value="{{ $request['search'] or '' }}" placeholder="请输入搜索的关键字">
                        </div>
                            <button type="submit" class="btn btn-info">搜索</button>
                    </div>
                </form>
                <!--查询-->

                @if (session('success'))
                <div id="alert" class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
                    <strong>{{ session('success') }}</strong>
                </div>
                @endif
                @if (session('error'))
                    <div id="alert" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif

                <div class="space_hx">&nbsp;</div>
                <!--列表-->
                <form action="#" method="post">
                    <table class="search list_hy">
                        <tr>
                            <th class="xz" scope="col">选择</th>
                            <th scope="col" style="text-align: center">游戏名称</th>
                            <th scope="col" style="text-align: center">游戏轮播图片</th>
                            <th scope="col" style="text-align: center">操作</th>
                        </tr>
                        
                        @foreach($tupian as $key=>$value)
                        <tr>
                            <td class="xz"><input name="" type="checkbox" value=""></td>
                            <td style="text-align: center">{{ $value->gname }}</td>
                            <td style="text-align: center"><img src="/uploads/{{ $value->game_pic }}" style="width:50px;height:50px;"></td>
                            <td style="text-align: center">
                                <a href="/admin/gamepic/delete/{{ $value->id }}" class="btn btn-danger" onclick="return confirm('确定要删除吗?')">删除</a>
                                <a href="/admin/gamepic/{{ $value->id }}/edit" class="btn btn-warning">修改</a>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                    <!--列表-->
                    <!--右边底部-->
                    <div class="r_foot">
                        <div class="r_foot_m">
                            <span>
                    <input name="" type="checkbox" value="">
                    <em>全部选中</em>
                </span>
                            <input type="submit" value="删除" class="btn btn-danger">
                            <a href="" class="btn btn-info">刷新</a>
                            <!--分页-->
                            <div style="float:right;margin-right:100px;margin-top: -17px;">
                                <a href="" class="prev"><img src="../images/icon7.png" alt=""/></a>
                                {{ $tupian->appends($request)->links() }}
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