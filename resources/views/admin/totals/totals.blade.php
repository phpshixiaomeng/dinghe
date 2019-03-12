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
                        <a href="">日统计</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">月统计</a>
                        <span><img src="../images/icon3.png" alt=""/></span>
                        <a href="">年统计</a>
                    </div>
                    <!--当前位置-->
                </div>
                <!--查询-->
                <form action="/admin/totals" method="get">
                    <div class="search">
                        <span>按分类名称查询：</span>
                        <div class="s_text">
                            <input name="search" type="text" value="{{ $request['search'] or '' }}" placeholder="请按1970-01-01日期格式搜索">
                        </div>
                            <button type="submit" class="btn btn-info">搜索</button>
                    </div>
                </form>
                <!--查询-->
                <div class="space_hx">&nbsp;</div>
                <!--列表-->
                <form action="" method="post">
                    <table class="search list_hy">
                        <tr>
                            <th scope="col" style="text-align: center">编号</th>
                            <th scope="col" style="text-align: center">网站访问量</th>
                            <th scope="col" style="text-align: center">游戏数量</th>
                            <th scope="col" style="text-align: center">用户数量</th>
                            <th scope="col" style="text-align: center">vip数量</th>
                            <th scope="col" style="text-align: center">订单数量</th>
                            <th scope="col" style="text-align: center">总收入</th>
                            <th scope="col" style="text-align: center">统计日期</th>
                        </tr>
                        
                        @foreach($totals as $k=>$v)
                        @if(!empty($v))
                        <tr>
                            <td style="text-align: center">{{ ++$i }}</td>
                            <td style="text-align: center">{{ $v->web_volume }}</td>
                            <td style="text-align: center">{{ $v->game_num }}</td>
                            <td style="text-align: center">{{ $v->users_total }}</td>
                            <td style="text-align: center">{{ $v->vip_total }}</td>
                            <td style="text-align: center">{{ $v->order_total }}</td>
                            <td style="text-align: center">{{ $v->money }}</td>
                            <td style="text-align: center">{{ substr($v->web_time,0,10) }}</td>
                        
                        </tr>
                        @endif
                        @endforeach
                    </table>
                    <!--列表-->
                    <!--右边底部-->
                    <div class="r_foot">
                        <div class="r_foot_m">  
                            <!--分页-->
                            <div style="float:right;margin-right:100px;margin-top: -17px;">
                                <a href="" class="prev"><img src="../images/icon7.png" alt=""/></a>
                               {{ $totals->appends($request)->links() }}
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