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

<form>
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
    <input type="text" class="form-control" id="inputEmail4"  name="gpt" placeholder="平台">
 </div>

 <div class="form-group">
    <label for="inputEmail5">游戏价格:</label>
    <input type="text" class="form-control" id="inputEmail5" name="gprice" placeholder="价格">
 </div>

  <button type="submit" class="btn btn-info">立即添加</button>
</form>

@endsection