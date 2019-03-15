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
         <div class="hy_list">
            <div class="box_t">
                <span class="name">后台管理员</span>
                    <div class="position">
                        <span><img src="/admin_assets/images/icon3.png" alt=""/></span>
                        <a href="">后台管理员列表</a>
                    </div>
            </div>
            <script>
                layui.use(['layer', 'form'], function(){
                  var layer = layui.layer
                  ,form = layui.form;
                });
            </script>
            <form  action="/admin/user" method="get">
                <div class="search">
                    <span >用户名查询</span>
                    <div class="s_text"><input name="search" type="text"></div>
                    <input class="btn btn-primary" type="submit"  value="搜索">
                    <span style="float:right; font:18px/1.2 '微软雅黑';margin-right: 100px;margin-top: 20px;" >总共<b style="color:red;" >{{$num}}</b>个管理员</span>
                </div>
            </form>
            <div class="space_hx">&nbsp;</div>
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
            <table class="search list_hy">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">用户名</th>
                    <th scope="col">操作</th>
                </tr>
                @foreach($data as $v)
                <tr>
                    <th>{{ $v->id }}</th>
                    <th>{{ $v->user }}</th>
                    <th>
                    @if(session('level')>= $v->level)
                        <a style="float:left" class="btn-primary btn" href="/admin/user/{{ $v->id }}/edit">修改</a>
                    @endif
                    @if($v->level == 0)
                        <form style="float:left" action="/admin/user/{{ $v->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit"   value="删除">
                        </form>
                        <a  style="float:left" class="btn btn-warning" href="/admin/user/role/{{ $v->id }}">角色</a>
                    @endif
                    </th>
                </tr>
                @endforeach
            </table>
            <div style="text-align: right;">
                {{ $data->appends($request)->links() }}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#button').click(function(){
        $("#alert").hide();
    });
</script>
@endsection