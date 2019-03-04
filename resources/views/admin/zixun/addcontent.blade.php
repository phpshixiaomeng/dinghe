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
<form action="/admin/zixun/adcon" method="post" id="gai">
{{csrf_field()}}
<input type="text" name="gid" value="{{$id}}" placeholder="" hidden>
  <div class="form-group">
    <label for="content">文章内容:</label>
    <textarea class="form-control" rows="3" id="content" name="content"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">游戏开始:</label>
    <textarea class="form-control" rows="3" id="gstart" name="gstart"></textarea>
  </div>
  <div class="form-group">
    <label for="inputEmail3">游戏创意团队:</label>
    <input type="text" class="form-control" id="inputEmail3" name="gteam" placeholder="团队">
 </div>
 <div class="form-group">
    <label for="inputEmail4">游戏运行平台:</label>
    <select class="form-control" id="inputEmail4" name="gpt">
    <option selected>Windows</option>
    <option>Osx</option>
    <option>Linux</option>
</select
 </div>

 <div class="form-group">
    <label for="inputEmail5">游戏价格:单位(元)</label>
    <input type="text" class="form-control" id="inputEmail5" name="price" placeholder="价格">
 </div>

  <button type="submit" class="btn btn-info">立即添加</button>

</form>
<script>
  $("#gai").submit(function(){

  var Data = new FormData($('#gai')[0]);
    $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });



    $.ajax({
    type:'post',
    url: "/admin/zixun/adcon",
    data: Data,
    dataType: 'html',
    processData: false,
    contentType: false,
    success: function(res) {
      // alert(res);

                if(res==1){
                  alert('修改成功');
                  window.parent.location.reload();
                  layer.closeAll();
                }else{
                  alert('修改失败');
                }
        }

    });

return false;

});




</script>
@endsection