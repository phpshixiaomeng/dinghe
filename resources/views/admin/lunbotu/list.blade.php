
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
                <span class="name">轮播图</span>
                    <div class="position">
                        <a href=""><img src="/admin_assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="/admin_assets/images/icon3.png" alt=""/></span>
                        <a href="">轮播图列表</a>
                    </div>
            </div>
            <script>
                layui.use(['layer', 'form'], function(){
                  var layer = layui.layer
                  ,form = layui.form;
                });
            </script>
            <form  action="/admin/lunbo" method="get">
                <div class="search">
                    <span >按照名字查询</span>
                    <div class="s_text"><input name="search" type="text"></div>
                    <input class="btn btn-primary" type="submit"  value="搜索">
                    <span style="float:right; font:18px/1.2 '微软雅黑';margin-right: 100px;margin-top: 20px;" >总共<b style="color:red;" >{{ $num }}</b>张轮播图</span>
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
            <table  class="search" cellpadding="0" cellspacing="0" class="list_hy">
                <tr>
                    <th class="xz" scope="col">选择</th>
                    <th scope="col">游戏名</th>
                    <th scope="col">轮播缩略图</th>
                    <th scope="col">状态</th>
                    <th scope="col">操作</th>
                </tr>

            @foreach($data as $val)
                <tr>
                    <td class="xz"><input name="id" type="checkbox" value="{{ $val->id }}"></td>
                    <td>{{$val->gname}}</td>

                    <td>
                        <img id="image" onclick="show({{ $val->id }})" src="/uploads/{{ $val->image }}" style="width:40px;height:40px;" alt="">
                    </td>
                    <td>
                        @if( $val->status == 1 )
                            <a href="/admin/lunbo/status/{{ $val->id }}/0"><img style="width:20px" src="/admin_assets/images/links/dui.jpg"></a>
                        @else
                            <a href="/admin/lunbo/status/{{ $val->id }}/1"><img style="width:20px" src="/admin_assets/images/links/cuo.jpg"></a>
                        @endif
                    </td>
                    <td>

                        <form style="float:left" action="/admin/lunbo/{{ $val->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input  onclick="return confirm('确定要删除吗?')" class="btn btn-danger" type="submit" value="删除">
                        </form>

                    </td>
                </tr>
            @endforeach
                </table>
                    <div style="text-align: right;">

                    </div>
                <div class="r_foot" style="margin-bottom: 30px">
                    <div class="r_foot_m">
                         <span style="float:left;">
                            <input id="qx" name="" type="checkbox" value="">
                            <em>全部选中</em>
                        </span>
                         <span style="width:100px;float:left;margin-top:5px;">
                            <form method="post" id="qdel" action="/admin/lunbo/del">
                                {{ csrf_field() }}
                                <input  class="btn btn-danger" onclick="return confirm('确定要删除吗?')"  style="width:100px;height:30px;color:grey;"  type="submit" value="批量删除">
                            </form>
                        </span>
                    </div>
                </div>
                {{ $data->appends($request)->links() }}
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
          area: ['420px','420px'],
          skin: 'layui-layer-nobg',
          shadeClose: true,
          content: '/admin/lunbo/'+id

        });
    }

</script>
@endsection