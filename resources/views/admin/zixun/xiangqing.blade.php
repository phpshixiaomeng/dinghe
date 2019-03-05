
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
<div class="right_m">
         <div class="hy_list">
            <div class="box_t">
                <span class="name">详情<button onClick="document.location.reload()" class="btn btn-warning">刷新</button></span>
                    <div class="position">
                        <a href=""><img src="/admin_assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="/admin_assets/images/icon3.png" alt=""/></span>
                        <a href="">资讯详情</a>
                    </div>
            </div>





<div id="right_ctn">
    <table class="table table-bordered">
        <tr>
            <th>游戏ID</th>
            <th>内容</th>
            <th>游戏开始</th>
            <th>开发团队</th>
            <th>游戏平台</th>
            <th>价格</th>
            <th>评论数量(点击查看评论)</th>
        </tr>
        <tr class="info">
            <td>{{$data->gid}}</td>
            <td>{{$data->content}}</td>
            <td>{{$data->gstart}}</td>
            <td>{{$data->gteam}}</td>
            <td>{{$data->gpt}}</td>
            <td>{{$data->price}}元</td>
            @if($count!=0)
            <td><a href="javascript:;" onclick="tan({{$data->gid}})" class="btn btn-info">{{$count}}</a></td>
            @else
            <td><button class="btn btn-warning">暂无评论</button></td>
            @endif
        </tr>
    </table>
</div>


</div>
</div>
<script>
function tan(id){
layer.open({
  type: 2,
  title: '查看评论',
  shadeClose: true,
  shade: 0.8,
  area: ['680px', '100%'],
  content: '/admin/zixun/pinglun/'+id //iframe的url
});
}






</script>


@endsection