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
                <span class="name">广告</span>
                    <div class="position">
                        <a href=""><img src="/admin_assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="/admin_assets/images/icon3.png" alt=""/></span>
                        <a href="">广告列表</a>
                    </div>
            </div>
            <script>
                layui.use(['layer', 'form'], function(){
                  var layer = layui.layer
                  ,form = layui.form;
                });
            </script>
            <form  action="/admin/ads" method="get">
                <div class="search">
                    <span >按照游戏名字查询</span>
                    <div class="s_text"><input name="search" type="text"></div>
                    <input class="btn btn-primary" type="submit"  value="搜索">
                    <span style="float:right; font:18px/1.2 '微软雅黑';margin-right: 100px;margin-top: 20px;" >总共<b style="color:red;" >{{ $num }}</b>条广告</span>
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
                    <th class="xz" scope="col">选择</th>
                    <th scope="col">游戏名</th>
                    <th scope="col">广告标题</th>
                    <th scope="col">广告缩略图</th>
                    <th scope="col">审核</th>
                    <th scope="col">操作</th>
                </tr>

                @foreach($data as $key=>$val)
                <tr>
                    <td class="xz"><input name="id" type="checkbox" value="{{ $val->id }}"></td>
                    <td>{{ $val->gname }}</td>
                    <td>{{ $val->title }}</td>
                    <td>
                    	<img onclick="show({{ $val->id }})" src="/uploads/{{ $val->image }}" style="width:40px;height:40px;" alt="">
                    </td>
                    <td style="width:300px">
                        @if( $val->put == 0 )
                        <a style="float:left" href="/admin/ads/put/{{ $val->id }}" class="btn btn-info">投放广告</a>
                        @elseif($val->put ==1)
                        <a style="float:left" href="/admin/ads/top/{{ $val->id }}" class="btn btn-success">置顶投放</a>
                        <a style="float:left margin-left" href="/admin/ads/put/{{ $val->id }}" class="btn btn-warning">取消投放</a>
                        <span style="font:20px/1.6 '微软雅黑'; float:right; font-weight: bold; color:red; margin-right:30px;">已投放</span>
                        @else
                        <a style="float:left" href="/admin/ads/top/{{ $val->id }}" class="btn btn-danger">取消置顶</a>
                        <a style="float:left margin-left" href="/admin/ads/put/{{ $val->id }}" class="btn btn-primary">取消投放</a>
                        <span style="font:20px/1.6 '微软雅黑'; float:right; font-weight: bold; color:red; margin-right:30px;" >已置顶</span>
                        @endif
                    </td>
                    <td>
                        <a style="float:left" href="/admin/ads/{{ $val->id }}/edit" class="btn btn-warning">修改</a>
                    	<form style="float:left" action="/admin/ads/{{ $val->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input  onclick="return confirm('确定要删除吗?')" class="btn btn-danger" type="submit" value="删除">
                        </form>
                    </td>
                </tr>
                @endforeach
                </table>
                    <div style="text-align: right;">
                        {{ $data->appends($request)->links() }}
                    </div>
                <div class="r_foot" style="margin-bottom: 30px">
                    <div class="r_foot_m" >
                        <span style="float:left;">
                            <input id="qx" name="" type="checkbox" value="">
                            <em>全部选中</em>
                        </span>
                        <span style="width:100px;float:left;margin-top:5px;">
                            <form method="post" id="qdel" action="/admin/ads/del">
                                {{ csrf_field() }}
                                <input class="btn btn-danger"  onclick="return confirm('确定要删除吗?')"  style="width:100px;height:30px;color:grey;" type="submit" value="批量删除">
                            </form>
                        </span>
                    </div>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#qx').click(function() {
        if(this.checked){
            $("input[name='id']").attr("checked", true);
        }else{
            $("input[name='id']").attr("checked", false);
        }
    });
    $('#qdel').mouseover(function() {
    var delid = [];
        $('input:checkbox:checked').each(function (){
            delid.push($(this).val());
         });
        $(this).append('<input type="hidden" name="delid" value="'+delid+'">');
    });
    $('#button').click(function(){
        $("#alert").hide();
    });
    function show(id)
    {
        layer.open({
          type: 2,
          title: false,
          closeBtn: 0,
          area: ['660px','560px'],
          skin: 'layui-layer-nobg',
          shadeClose: true,
          content: '/admin/ads/'+id
        });
    }
</script>
@endsection