
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
                <form action="/admin/userlist" method="get">
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

                            <th scope="col">用户列</th>
                            <th scope="col">用户ID</th>
                            <th scope="col">用户名</th>
                            <th scope="col">用户手机号</th>
                            <th scope="col">用户状态</th>
                            <th scope="col">VIP等级</th>
                            <th scope="col">操作</th>
                        </tr>
                    @foreach($user as $v)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$v->id}}</td>
                            <td>{{$v->name}}</td>
                            <td>{{$v->phone}}</td>
                            @if(($v->status)==0)
                            <td><font color="green">未冻结</font></td>
                            @else
                            <td><font color="red">已冻结</font></td>
                            @endif
                            <td>{{$v->user_vip}}</td>
                            <td><a href="/admin/userlist/{{$v->id}}" class="btn btn-info"><font color="white">查看详情</font></a>
                            @if(($v->status)==0)

                            <a href="/admin/userlist/{{$v->status}}/edit?id={{$v->id}}" onclick="return confirm('确定要冻结吗?')" class="btn btn-danger">
                            <font color="white">
                            冻结
                            </font>
                            </a>

                             @else

                             <a href="/admin/userlist/{{$v->status}}/edit?id={{$v->id}}" onclick="return confirm('确定要解冻吗?')" class="btn btn-warning">
                            <font color="white">
                             解除冻结
                            </font>
                            </a>

                            @endif
                            </a></td>
                        </tr>
                    @endforeach

                    </table>
                </form>
                    <!--列表-->
                    <!--右边底部-->


                <!--右边底部-->
            </div>
            <!--会议列表-->
        </div>

    </div>
{{ $user->appends($request)->links()}}
@endsection