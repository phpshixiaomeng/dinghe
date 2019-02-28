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
@section('content')
    <div id="right_ctn">
        <div class="right_m">
            <!--会议列表-->
            <div class="hy_list">
                <div class="box_t">
                    <span class="name">前台用户列表</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="../images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">前台用户管理</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">前台用户列表</a>
                    </div>
                    <!--当前位置-->
                </div>
                <!--查询-->
                <form action="/admin/website" method="get">
                <div class="search">
                    <span>按用户名查询</span>

                    <div class="s_text"><input name="search" type="text"></div>
                    <input type="submit" class="btn btn-info"  value="搜索">
                    <span style="float:right; font:18px/1.2 '微软雅黑';margin-right: 100px;margin-top: 20px;" >总共<b style="color:red;" >{{$num}}</b>个用户</span>
                </div>
                </form>
                <!--查询-->
                <div class="space_hx">&nbsp;</div>
                <!--列表-->
                <form action="" method="post">
                    <table class="table table-hover">
                         <tr>

                            <th scope="col">网站版本号</th>
                            <th scope="col">网站描述</th>
                            <th scope="col">网站信息</th>
                            <th scope="col">操作</th>
                        </tr>
                    @foreach($user as $v)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$v->title}}</td>
                            <td>{{$v->description}}</td>
                            <td>{{$v->information}}</td>
                            <td>
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                更改
                            </button>
                            </td>

                        </tr>
                    @endforeach

                    </table>
                </form>
                    <!--列表-->
                    <!--右边底部-->
<!-- Modal -->


                <!--右边底部-->
            </div>
            <!--会议列表-->
        </div>

    </div>




{{ $user->appends($request)->links()}}
@endsection