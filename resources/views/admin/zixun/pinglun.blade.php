@extends('admin/public/public')
@section('function')
    $(function() {
        //自适应屏幕宽度
        window.onresize = function() { location = location };

        var main_h = $(window).height();
        $('.hy_list').css('height', main_h - 45 + 'px');

        var main_w = $(window).width();
        $('.xjhy').css('width', main_w - 40 + 'px');


    });
@endsection
@section('content')
<script type="text/javascript">
    layui.use(['layer', 'form'], function(){
      var layer = layui.layer
      ,form = layui.form;

    });
</script>
<table class="table table-bordered">
  <tr>
    <th>序列号</th>
    <th>用户名</th>
    <th>评论时间</th>
    <th>评论内容</th>
    <th>被赞数</th>
    <th>被踩数</th>
    <th>操作</th>
  </tr>

  @foreach($data as $v)
  <tr>
    <td>{{$i++}}</td>
    <td>{{$v->pname}}</td>
    <td>{{$v->ptime}}</td>
    <td>{{$v->pcontent}}</td>
    <td>{{$v->pzan}}</td>
    <td>{{$v->pcai}}</td>
    <td><a href="javascript:;"  onclick="javascript:if (confirm('确定删除吗?')) {tan({{$v->id}});}else{return false;}" class="btn btn-danger">删除</td>
  </tr>
  @endforeach

</table>
<script type="text/javascript">
  function tan(id){


    $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });



    $.ajax({
    type:'get',
    url: "/admin/zixun/pinglunshanchu/"+id,

    dataType: 'html',
    processData: false,
    contentType: false,
    success: function(res) {
      // alert(res);

                if(res==1){
                  alert('删除成功');
                  window.parent.location.reload();

                  layer.closeAll();
                }else{
                  alert('删除失败');
                }
        }

    });

return false;

};




</script>
@endsection