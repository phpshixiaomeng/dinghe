@extends('Home/show/head')
@section('content')

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
                        <h3>个人信息</h3>
                        <form action="#" class="comment-form">
                            <div class="row" style="background-color:RGB(3,22,52);">

                              <font color="white">用户头像:</font> <div class="col-md-12 col-24 mb-60">
                                    <label for="touxiang"><img src="/touxiang/public/{{$data2->pic}}" alt="暂无头像请上传" width="120" height="120"></label>


                                </div>
                                 <div class="col-md-6 col-12 mb-30">
                                    <font color="white">用户昵称:{{$data2->nickname}}</font>
                                </div>

                                <div class="col-md-6 col-12 mb-30">
                                    <font color="white">个人简介:{{$data2->profile}}</font>
                                </div>
                                <div class="col-md-6 col-12 mb-30">
                                    <font color="white">性别:
                                    @if($data2->sex==1)
                                    {{'男'}}
                                    @elseif($data2->sex==0)
                                    {{'女'}}
                                    @else
                                    {{'未知'}}
                                    @endif
                                    </font>
                                </div>


                                <div class="col-12 mb-30">
                                <font color="white">VIP等级:{{$vip}}</font>
                                </div>

                                <div class="col-12">

                                </div>
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                修改个人信息
                                </button>
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Modal">
                                修改密码
                                </button>

                            </div>
                        </form>
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
    <img src="/touxiang/public/{{$data2->pic}}"  alt="暂无头像请上传" width="120" height="120">
    </label>
    <input type="file" id="exampleInputFile" name="file" hidden>

    <!-- <p class="help-block">Example block-level help text here.</p> -->
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
$("#edit").submit(function(){

var formData = new FormData($('#edit')[0]);
$.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });

$.ajax({
    type:'post',
    url: "http://www.dingding.com/home/grxx",
    data: formData,
    dataType: 'html',
    processData: false,
    contentType: false,
    success: function(data) {

                if(data==1){
                    alert('修改成功');
                    window.location.href='http://www.dingding.com/home/grxx';
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
    url: "http://www.dingding.com/home/xiugai",
    data: Data,
    dataType: 'html',
    processData: false,
    contentType: false,
    success: function(res) {
      // alert(res);

                if(res==1){
                    alert('修改成功,请重新登陆');
                    window.location.href='http://www.dingding.com/home/login';
                }else{
                    alert('修改失败');
                }
        }

    });

return false;

});









// return false;
</script>

    <!--Contact Section End-->

@endsection