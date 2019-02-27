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
                <div class="search">
                    <span>按用户信息查询：</span>
                    <div class="s_text"><input name="" type="text"></div>
                    <a href="" class="btn">查询</a>
                </div>
                <!--查询-->
                <div class="space_hx">&nbsp;</div>
                <!--列表-->
                <form action="" method="post">
                    <table cellpadding="0" cellspacing="0" class="list_hy">
                        <tr>

                            <th scope="col">用户列</th>
                            <th scope="col">用户ID</th>
                            <th scope="col">用户名</th>
                            <th scope="col">用户手机号</th>
                            <th scope="col">用户状态</th>
                            <th scope="col">操作</th>
                        </tr>
                    @foreach($data as $v)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$v->id}}</td>
                            <td>{{$v->name}}</td>
                            <td>{{$v->phone}}</td>
                            <td>{{$v->status}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </table>
                    <!--列表-->
                    <!--右边底部-->
                </form>
                <!--右边底部-->
            </div>
            <!--会议列表-->
        </div>
    </div>
@endsection