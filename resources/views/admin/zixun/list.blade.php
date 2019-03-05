
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
<script type="text/javascript">
    layui.use(['layer', 'form'], function(){
      var layer = layui.layer
      ,form = layui.form;

    });
</script>

<div  id="right_ctn">
    <div class="right_m">
         <div class="hy_list">
            <div class="box_t">
                <span class="name">资讯<button onClick="document.location.reload()" class="btn btn-warning">刷新</button></span>
                    <div class="position">
                        <a href=""><img src="/admin_assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="/admin_assets/images/icon3.png" alt=""/></span>
                        <a href="">资讯列表</a>
                    </div>
            </div>
            <script>
                layui.use(['layer', 'form'], function(){
                  var layer = layui.layer
                  ,form = layui.form;
                });
            </script>
            <form  action="/admin/zixun" method="get">
                <div class="search">
                    <span >按照标题查询</span>
                    <div class="s_text"><input name="search" type="text"></div>
                    <input class="btn btn-primary" type="submit"  value="搜索">
                    <span style="float:right; font:18px/1.2 '微软雅黑';margin-right: 100px;margin-top: 20px;" >总共<b style="color:red;" >{{ $num }}</b>条资讯</span>
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
            <table style=" table-layout: fixed;width:150px"  class="search"  cellpadding="0" cellspacing="0" class="list_hy">
                <tr>
                    <th class="xz" scope="col">选择</th>
                    <th scope="col">游戏名</th>
                    <th scope="col">标题</th>
                    <th scope="col">作者</th>
                    <th scope="col">简介</th>
                    <th scope="col">热度</th>
                    <th scope="col">缩略图</th>
                    <th scope="col">创建时间</th>
                    <th scope="col">状态</th>
                    <th scope="col">操作</th>
                    <th scope="col">具体内容操作</th>
                </tr>

            @foreach($data as $val)
                <tr>
                    <td class="xz"><input name="id" type="checkbox" value="{{ $val->id }}"></td>
                    <td>{{$val->gname}}</td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">{{$val->title}}</td>
                    <td>{{$val->auth}}</td>
                    <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">{{$val->contact}}</td>
                    <td>{{$val->fire}}</td>

                    <td>
                        <img id="image" onclick="show({{ $val->id }})" src="/uploads/{{ $val->image }}" style="width:40px;height:40px;" alt="暂无图片">
                    </td>
                    <td>{{$val->created_at}}</td>
                    <td>
                        @if( $val->status == 1 )
                            <a href="/admin/zixun/status/{{ $val->id }}/0"><img style="width:20px" src="/admin_assets/images/links/dui.jpg"></a>
                        @else
                            <a href="/admin/zixun/status/{{ $val->id }}/1"><img style="width:20px" src="/admin_assets/images/links/cuo.jpg"></a>
                        @endif
                    </td>
                    <td>

                        <form style="float:left" action="/admin/zixun/{{ $val->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input  onclick="return confirm('确定要删除吗?')" class="btn btn-danger" type="submit" value="删除">

                            <a href="/admin/zixun/xiangqing/{{ $val->id }}" class="btn btn-info">查看详情</a>
                        </form>

                    </td>
                    @if(($val->addjilu)==0)
                    <td><a class="btn btn-info" onclick="tan({{ $val->id }})">添加具体内容</a></td>
                    @else
                    <td><a href="javascript:;" target="_top" class="btn btn-warning" onclick="etan({{ $val->id }})">修改具体内容</a></td>
                    @endif
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
                            <form method="post" id="qdel" action="/admin/zixun/del">
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

<script>
function tan(id){
layer.open({
  type: 2,
  title: '添加具体内容',
  shadeClose: true,
  shade: 0.8,
  area: ['680px', '100%'],
  content: '/admin/zixun/content/'+id //iframe的url
});
}
function etan(cz){
layer.open({
  type: 2,
  title: '修改具体内容',
  shadeClose: true,
  shade: 0.8,
  area: ['680px', '100%'],
  content: '/admin/zixun/contentedit/'+cz //iframe的url
});
}








</script>




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
          content: '/admin/zixun/'+id

        });
    }

</script>
@endsection