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
<script>
    layui.use(['layer', 'form'], function(){
      var layer = layui.layer
      ,form = layui.form;
    });
</script>
<div id="right_ctn">
    <div class="right_m">
         <div class="hy_list">
            <div class="box_t">
                <span class="name">反馈管理</span>
                    <div class="position">
                        <a href=""><img src="/admin_assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="/admin_assets/images/icon3.png" alt=""/></span>
                        <a href="">反馈列表</a>
                    </div>
            </div>
            <script>
                layui.use(['layer', 'form'], function(){
                  var layer = layui.layer
                  ,form = layui.form;
                });
            </script>
            <form  action="/admin/help" method="get">
                <div class="search">
                    <span >按照用户名查询</span>
                    <div class="s_text"><input name="search" type="text"></div>
                    <input class="btn btn-primary" type="submit"  value="搜索">
                    <span style="float:right; font:18px/1.2 '微软雅黑';margin-right: 100px;margin-top: 20px;" >总共<b style="color:red;" >{{$num}}</b>条反馈 </span>
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
                    <th style="width:20%">用户名</th>
                    <th style="width:20%">事件名</th>
                    <th style="width:20%">问题描述</th>
                    <th style="width:20%">用户读取</th>
                    <th style="width:20%">回复</th>
                </tr>
                @foreach($data as $k=>$v)
                <tr>
                    <th> {{ $v->uname }} </th>
                    <th> {{ $v->name }} </th>
                    <th><div style=" width:200px;overflow: hidden; text-overflow:ellipsis; white-space: nowrap;">
                       {!! $v->description !!}
                    </div></th>
                    @if($v->status == 0)
                    <th><span style="color:red;text-align:center;">未读</span></th>
                    @else
                    <th><span style="color:green;text-align:center;">已读</span></th>
                    @endif
                    <th>
                    @if($v->reply)
                    <a class="btn btn-warning" onclick="show({{ $v->id }})">已回复请查看</a>|
                    @else
                    <a class="btn btn-primary" href="/admin/help/reply/{{ $v->id }}">点击回复</a>|
                    @endif
                    <a href="/admin/help/del/{{ $v->id }}" class="btn btn-danger">添加回收站</a></th>
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
    function show(id)
    {
        layer.open({
          type: 2,
          area: ['1000px', '600px'],
          fixed: false,
          maxmin: true,
          content: '/admin/help/'+id+'/edit'
        });
    }
    $('#button').click(function(){
        $("#alert").hide();
    });
</script>
@endsection