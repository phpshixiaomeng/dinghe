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
                    <span class="name">分类列表</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="../images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">分类管理</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">分类列表</a>
                    </div>
                    <!--当前位置-->
                </div>
                <!--查询-->
                <form action="/admin/tjfl" method="get">
                    <div class="search">
                        <span>按分类名称查询：</span>
                        <div class="s_text">
                            <input name="search" type="text" value="{{ $request['search'] or '' }}" placeholder="请输入搜索的关键字">
                        </div>
                            <button type="submit" class="btn btn-info">搜索</button>
                    </div>
                </form>
                <!--查询-->
                <div class="space_hx">&nbsp;</div>
                <!--列表-->
                <form action="" method="post">
                    <table cellpadding="0" cellspacing="0" class="list_hy">
                        <tr>
                            <th class="xz" scope="col">选择</th>
                            <th scope="col" style="text-align: center">ID</th>
                            <th scope="col" style="text-align: center">分类名称</th>
                            <th scope="col" style="text-align: center">分类所属ID</th>
                            <th scope="col" style="text-align: center">分类路径</th>
                            <th scope="col" style="text-align: center">状态</th>
                            <th scope="col" style="text-align: center">操作</th>
                        </tr>

                        @foreach($cates_data as $k=>$v)
                        <tr>
                            <td class="xz"><input name="" type="checkbox" value=""></td>
                            <td style="text-align: center">{{ $v->id }}</td>
                            <td style="text-align: center">{{ $v->name }}</td>
                            <td style="text-align: center">{{ $v->pid }}</td>
                            <td style="text-align: center">{{ $v->path }}</td>
                            <td style="text-align: center">
                                @if($v->display == 0)
                                <button class="btn btn-info"><a href="/admin/tjfl/display/{{ $v->id }}" style="color:white">显示</a></button>
                                @else
                                <button class="btn btn-warning"><a href="/admin/tjfl/display/{{ $v->id }}" style="color:white">隐藏</a></button>
                                @endif
                            </td>
                            <td style="text-align: center"><a href="/admin/tjfl/create/{{ $v->id }}" class="btn btn-info btn-default btn-sm">添加子分类</a>
                               <a href="/admin/tjfl/{{ $v->id }}" class="btn btn-danger" onclick="return confirm('确定要删除吗?')">删除</a>
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
                               {{ $cates_data->appends($request)->links() }}
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