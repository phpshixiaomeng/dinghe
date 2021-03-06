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
                <span class="name">发帖管理</span>
                    <div class="position">
                        <a href=""><img src="/admin_assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="/admin_assets/images/icon3.png" alt=""/></span>
                        <a href="">发帖列表</a>
                    </div>
            </div>
            <script>
            </script>
            <form  action="/admin/luntan" method="get">
                <div class="search">
                    <span >按照帖子名字查询</span>
                    <div class="s_text"><input name="search" type="text"></div>
                    <input class="btn btn-primary" type="submit"  value="搜索">
                    <span style="float:right; font:18px/1.2 '微软雅黑';margin-right: 100px;margin-top: 20px;" >总共<b style="color:red;" >{{ $num }}</b>条帖子</span>
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
            <table  class="search list_hy">
                <tr>
                    <th scope="col">用户名</th>
                    <th scope="col">帖子标题</th>
                    <th scope="col">帖子详情</th>
                    <th scope="col">操作</th>
                </tr>
                @foreach($data as $key=>$val)
                <tr>
                    <th>{{ $val->uname}}</th>
                    <th>{{ $val->title}}</th>
                    <th><a  class="btn-primary btn" onclick="show({{ $val->id }})" >查看帖子详情</a></th>
                    <th>
                        <a class="btn-primary btn" href="/admin/luntan/reply/{{$val->id}}" >查看子帖</a>
                        <a class="btn btn-danger"  onclick="return confirm('确定要删除吗?')" href="/admin/luntan/delete/{{$val->id}}" >删除</a>
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
          content: '/admin/luntan/'+id
        });
    }
$('#button').click(function(){
    $("#alert").hide();
});
</script>
@endsection