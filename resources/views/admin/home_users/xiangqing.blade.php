
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
                    <span class="name">前台用户详情页</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="../images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">前台用户详情页</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">前台用户列表</a>
                    </div>
                    <!--当前位置-->
                </div>
                <!--查询-->
                <!--查询-->
                <div class="space_hx">&nbsp;</div>
                <!--列表-->
                <form action="" method="post">
                    <table class="table table-bordered  table-hover search">
                        <tr>

                            <th scope="col">用户昵称</th>
                            <th scope="col">用户性别</th>
                            <th scope="col">用户简介</th>
                            <th scope="col">用户头像</th>
                            <th scope="col">操作</th>


                        </tr>

                        <tr>
                            <td>{{$data->nickname}}</td>
                            @if(($data->sex)==1)
                            <td>男</td>
                            @elseif(($data->sex)==0)
                            <td>女</td>
                            @else
                            <td></td>
                            @endif
                            <td>{{$data->profile}}</td>
                            <td><img src="/uploads/public/{{$data->pic}}" alt="暂无头像请上传" width="60" height="60"></td>

                            <td><a href="/admin/userlist" class="btn btn-info"><font color="white">返回用户列表</font></a></td>

                        </tr>

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