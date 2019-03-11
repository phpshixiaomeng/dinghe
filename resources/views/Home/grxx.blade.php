@extends('Home/show/head')
@section('content')
<script type="text/javascript">
    layui.use(['layer', 'form'], function(){
      var layer = layui.layer
      ,form = layui.form;

    });
</script>
<div style="text-align:center;clear:both;">
<script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>
<script src="/follow.js" type="text/javascript"></script>
</div>
    <!--Contact Section Start-->
    <div class="contact-section section pt-10 pt-lg-10 pt-md-10 pt-sm-10 pt-xs-20 pb-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="contact-address-wrap">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="contact-form mt-90 mt-lg-70 mt-md-60 mt-sm-50 mt-xs-20">








<ul class="nav nav-pills">
  <li id="li1" role="presentation" class="btn btn-info">个人信息</li>
  <li id="li2" role="presentation" class="btn btn-warning">我的收藏</li>
  <li id="li3" role="presentation" class="btn btn-info">我的订单</li>
</ul>
<div class="jumbotron" id="grxx" hidden>
  @if(!empty($data2->nickname))
  <h1>欢迎回来！亲爱的{{$data2->nickname}}</h1>
  @else
  <h1>暂无个人信息</h1>
  @endif
  @if(!empty($data2->pic))
  <p><span class="glyphicon glyphicon-camera"></span><img class="img-circle" src="/uploads/public/{{$data2->pic}}" alt="暂无头像请上传" width="80" height="80"></p>
  @else
  <p>暂无头像</p>
  @endif
  @if(!empty($data2->nickname))
  <p><div class="alert alert-info" role="alert">用户昵称:{{$data2->nickname}}</div></p>
  @else
  <p>暂无昵称</p>
  @endif
  @if(!empty($data2->profile))
  <p><div class="alert alert-info" role="alert">个人简介:<textarea class="form-control" rows="3" disabled>{{$data2->profile}}</textarea></div></p>
  @else
  <p>暂无个人简介</p>
  @endif
  @if(!empty($data2))
  @if($data2->sex==1 || $data2->sex==0)
  <p><div class="alert alert-info" role="alert">性别:@if($data2->sex==1)
    {{'男'}}
    @elseif($data2->sex==0)
    {{'女'}}
    @else
    {{'未知'}}
    @endif
  </div>
  </p>
  @else
  <p>暂未选择性别</p>
  @endif
  @endif
  <p><div class="alert alert-info" role="alert">VIP等级:{{$vip}}</div></p>
  <p><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  修改个人信息
  </button>
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Modal">
    修改密码
  </button><button class="btn btn-warning" onclick="shouadd()">查看我的收藏</button></p>



</div>



<div class="jumbotron" id="soucang">

  <h1>这是你最近收藏的商品</h1>
@if(!empty($game))
<table class="table table-hover">
@foreach($game as $v)
  <tr id="{{$v->gid}}">

  <td>{{$v->gname}}</td>
  <td><img src="{{$v->gimg}}" alt="暂无图片"></td>
  <td>￥{{$v->price}}</td>
  <td><a href="/home/zhifu/{{ $v->gid }}" class="btn btn-info">立即购买</a></td>
  <td><button  onclick="shan({{$v->gid}})" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td></tr>
@endforeach
</table>
{{$game->links()}}

@else
  <p>暂无收藏的游戏</p>
@endif



</div>

<div class="jumbotron" id="dingdan" hidden>
  <h1>你好！亲爱的会员</h1>
  <p>...</p>
  <p>这是订单页</p>
  <p></p>
  <p></p>
</div>





    <!--  -->



                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">修改个人信息</h4>
      </div>
      <div class="modal-body">
    <!-- form表单 -->

<form id="edit">
@if(!empty($data2))
  <div class="form-group">
    <label for="exampleInputEmail1">用户昵称</label>
    <input type="text" class="form-control" value="{{$data2->nickname}}" name="nickname" id="exampleInputEmail1" placeholder="用户昵称">
  </div>
<!--   <div class="form-group">
    <label for="exampleInputEmail1">生日</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="出生日期">
  </div> -->
  <div class="form-group">
    <label for="exampleInputPassword1">个人简介</label>
    <input type="text" class="form-control" value="{{$data2->profile}}" name="profile" placeholder="个人简介">
    <input type="text" class="form-control" name="user_id" value="{{$id}}" hidden>
    <input type="text" class="form-control" name="pic" value="{{$data2->pic}}" hidden>

  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">性别:</label>

  <label>
    <input type="radio" value="1" name="sex" checked>
    男
  </label>


     <label>
     <input type="radio" value="0" name="sex">
    女
    </label>


  </div>
  <div class="form-group">
    <label for="exampleInputFile">上传头像
    <img src="/uploads/public/{{$data2->pic}}"  alt="暂无头像请上传" width="120" height="120">
    </label>
    <input type="file" id="exampleInputFile" name="file" hidden>

    <!-- <p class="help-block">Example block-level help text here.</p> -->
  </div>

  <input type="submit" class="btn btn-info" value="保存修改">
@else
  <div class="form-group">
    <label for="exampleInputEmail1">用户昵称</label>
    <input type="text" class="form-control" value="" name="nickname" id="exampleInputEmail1" placeholder="用户昵称">
  </div>
<!--   <div class="form-group">
    <label for="exampleInputEmail1">生日</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="出生日期">
  </div> -->
  <div class="form-group">
    <label for="exampleInputPassword1">个人简介</label>
    <input type="text" class="form-control" value="" name="profile" placeholder="个人简介">
    <input type="text" class="form-control" name="user_id" value="{{$id}}" hidden>
    <input type="text" class="form-control" name="pic" value="" hidden>

  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">性别:</label>

  <label>
    <input type="radio" value="1" name="sex" checked>
    男
  </label>


     <label>
     <input type="radio" value="0" name="sex">
    女
    </label>


  </div>
  <div class="form-group">
    <label for="exampleInputFile">上传头像
    <img src="/uploads/public/"  alt="暂无头像请上传" width="120" height="120">
    </label>
    <input type="file" id="exampleInputFile" name="file" hidden>

    <!-- <p class="help-block">Example block-level help text here.</p> -->
  </div>

  <input type="submit" class="btn btn-info" value="保存修改">




















@endif
</form>
    <!-- endform表单 -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <!-- <button type="button" class="btn btn-primary">保存修改</button> -->
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">修改密码</h4>
      </div>
      <div class="modal-body">
    <!-- form表单 -->

<form id="gai">
{{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">原密码:</label>
    <input type="text" class="form-control" value="" name="password" id="" placeholder="原密码">
  </div>
<!--   <div class="form-group">
    <label for="exampleInputEmail1">生日</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="出生日期">
  </div> -->
  <div class="form-group">
    <label for="exampleInputPassword1">新的密码:</label>
    <input type="text" class="form-control" value="" name="npassword" placeholder="新密码">

  </div>
  <input type="submit" class="btn btn-info" value="保存修改">
</form>
    <!-- endform表单 -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <!-- <button type="button" class="btn btn-primary">保存修改</button> -->
      </div>
    </div>
  </div>
</div>




























<script type="text/javascript" >
$('#li1').click(function(){
$('#li1').attr('class','btn btn-warning');
$('#li2').attr('class','btn btn-info');
$('#li3').attr('class','btn btn-info');

$('#grxx').attr('hidden',false);
$('#soucang').attr('hidden',true);
$('#dingdan').attr('hidden',true);


});

$('#li2').click(function(){
$('#li2').attr('class','btn btn-warning');
$('#li1').attr('class','btn btn-info');
$('#li3').attr('class','btn btn-info');
$('#grxx').attr('hidden',true);
$('#soucang').attr('hidden',false);
$('#dingdan').attr('hidden',true);
});


$('#li3').click(function(){
$('#li3').attr('class','btn btn-warning');
$('#li1').attr('class','btn btn-info');
$('#li2').attr('class','btn btn-info');
$('#grxx').attr('hidden',true);
$('#soucang').attr('hidden',true);
$('#dingdan').attr('hidden',false);
});






















$("#edit").submit(function(){

var formData = new FormData($('#edit')[0]);
$.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });

$.ajax({
    type:'post',
    url: "/home/grxx",
    data: formData,
    dataType: 'html',
    processData: false,
    contentType: false,
    success: function(data) {

                if(data==1){
                    alert('修改成功');
                    window.location.href='/home/grxx';
                }else{
                    alert('修改失败');
                }
        }

    });





return false;


})

$("#gai").submit(function(){

  var Data = new FormData($('#gai')[0]);
    $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });



    $.ajax({
    type:'post',
    url: "/home/xiugai",
    data: Data,
    dataType: 'html',
    processData: false,
    contentType: false,
    success: function(res) {
      // alert(res);

                if(res==1){
                    alert('修改成功,请重新登陆');
                    window.location.href='/home/login';
                }else{
                    alert('修改失败');
                }
        }

    });

return false;

});

function shan(id){
$id=id;
url='/home/gamexq/shan/'+$id;
$.get(url,function(res){
if(res==1){
$('#'+$id).remove();
}



})

return false;
}




function shouadd(){

  layer.open({
  type: 1,
  skin: 'layui-layer-rim', //加上边框
  area: ['820px', '640px'], //宽高
  content: '<h1>这是你最近收藏的商品</h1>@if(!empty($game2))<table class="table table-hover">@foreach($game2 as $v)<tr id="{{$v->gid}}"><td>{{$v->gname}}</td><td><img src="{{$v->gimg}}" alt="暂无图片"></td><td>￥{{$v->price}}</td><td><a href="/home/zhifu/{{ $v->gid }}" class="btn btn-info">立即购买</a></td><td><button onclick="shan({{$v->gid}})" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td></tr>@endforeach</table>@else<p>暂无收藏的游戏</p>@endif'});
}

// return false;
</script>

    <!--Contact Section End-->

@endsection