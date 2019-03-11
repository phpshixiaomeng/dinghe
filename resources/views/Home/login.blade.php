@extends('Home/show/head')
@section('content')
 @if (count($errors) > 0)
    <div  style="position:fixed;top:10%;left:40%;width:20%;" id="alert" class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
    @foreach ($errors->all() as $error)
        <strong style="font-size:20px;">{{ $error }}</strong><br>
    @endforeach
</div>
@endif
@if (session('error'))
    <div  style="position:fixed;top:10%;left:40%;width:20%;" id="alert" class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
        <strong style="font-size:20px;">{{ session('error') }}</strong>
    </div>
@endif
@if (session('success'))
    <div style="position:fixed;top:10%;left:40%;width:20%;" id="alert" class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
        <strong style="font-size:20px;">{{ session('success') }}</strong>
    </div>
@endif
     <!--Login Section Start-->
    <div class="login-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45">
        <div class="container">
            <div class="row">

                <!-- Login -->
                <div class="col-md-6 col-12 d-flex">
                    <div class="gilbard-login">

                        <h3>登录到您的帐户</h3>
                        <p>吉尔巴德提供了所有这些谴责快乐和歌唱痛苦的错误想法，这将给你一个完整的系统描述，并阐述</p>

                        <!-- Login Form -->
                        <form id="form">
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12 mb-30"><input type="text" id="name" placeholder="请输入用户名"></div>
                                <div class="col-12 mb-20"><input type="password" id="password" placeholder="请输入密码"></div>
                                <div class="col-12 mb-15">

                                    <input type="checkbox" id="remember_me">
                                    <!-- <label for="remember_me">记住我</label> -->

                                    忘记密码?<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modal">
                                    申诉密码
                                    </button>


                                </div>
                                <div class="col-12"><input type="submit" value="登录"></div>
                            </div>
                        </form>
                        <h4>没有帐户？请点击 <a href="zhuce"><font style="color:blue">注册</font></a></h4>

                    </div>
                </div>

                <div class="col-md-1 col-12 d-flex">

                    <div class="login-reg-vertical-boder"></div>

                </div>

                <!-- Login With Social -->
                <div class="col-md-5 col-12 d-flex">

                    <div class="gilbard-social-login">
                        <h3>你也可以用…</h3>

                        <a href="#" class="facebook-login">用登录 <i class="fa fa-facebook"></i></a>
                        <a href="#" class="twitter-login">用登录 <i class="fa fa-twitter"></i></a>
                        <a href="#" class="google-plus-login">用登录 <i class="fa fa-google-plus"></i></a>

                    </div>

                </div>

            </div>
        </div>
    </div>
     <!--Login Section End-->

    <!--Projects section start-->

    <!--Projects section end-->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">申诉</h4>
      </div>
      <div class="modal-body">
    <!-- form表单 -->
<form id="gai">
{{csrf_field()}}
  <div class="form-group">
    <label for="username">用户名:</label>
    <input type="text" id="username" class="form-control" value="" name="username" placeholder="想要申诉的账户">
  </div>
<!--   <div class="form-group">
    <label for="exampleInputEmail1">生日</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="出生日期">
  </div> -->
  <div class="form-group">
    <label for="youxiang">邮箱:</label>
    <input type="text" class="form-control" id="youxiang" value=""  placeholder="请输入邮箱">
    <button class="btn btn-warning"  id="send">发送验证码</button>
  </div>
 <div class="form-group">

    <input class="form-control" id="yanzhengma" type="text" name="yanzhengma" value="" placeholder="请输入验证码" hidden>
 </div>

  <input type="submit" class="btn btn-info" value="立即验证申诉">
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

<script>

$("#form").submit(function(){

        var name=$('#name').val();
        var ps=$('#password').val();
        // var nps=$('#npassword').val();
        // alert(11111);
        // alert($('#name').val());
        if(name==''||ps==''){
            // alert(1111);
            alert('您有账号或密码未填,请仔细确认');
        }else{
            var data={
                'name':name,
                'password':ps

            };


            var url='/home/login';


            $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });
            $.post(url,data,function(res){


            if(res==1){
                alert('登录成功');
                window.location.href='/home';//登录成功跳到首页
            }else if(res==2){
                alert('登录失败/账号或密码错误');
                $('#password').val('');
            }else{
                alert('您的账号已被冻结');
            }
                // if(res==1){
                //     alert('登录成功');

                // }else{
                //     alert('账号或者密码错误');
                // }


        });


    }
return false;
});


if($.cookie("total")!=undefined&&$.cookie("total")!='NaN'&&$.cookie("total")!='null'){//cookie存在倒计时
    $('#yanzhengma').attr('hidden',false);
    timekeeping();

    }else{//cookie 没有倒计时

    $('#send').attr("disabled", false);
    }

function timekeeping(){
        //把按钮设置为不可以点击
        $('#send').attr("disabled", true);
        var interval=setInterval(function(){//每秒读取一次cookie
          //从cookie 中读取剩余倒计时
          total=$.cookie("total");
          //在发送按钮显示剩余倒计时
          $('#send').html('请等待'+total+'秒重新发送');
          //把剩余总倒计时减掉1
          total--;

          if(total==0){//剩余倒计时为零，则显示 重新发送，可点击
          //清除定时器
          clearInterval(interval);
          //删除cookie
          total=$.cookie("total",total, { expires: -1 });

          //显示重新发送
          $('#send').html('重新发送');
          //把发送按钮设置为可点击
          $('#send').attr("disabled", false);
          }else{//剩余倒计时不为零

          //重新写入总倒计时
          $.cookie("total",total);
          }

        },1000);

      }


$('#send').click(function(){

    $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });
var y1=$('#username').val();
var y2=$('#youxiang').val();
// if(!empty($('#username').val())&& !empty($('#youxiang').val())){
if(y1 !='' && y2 !='' ){
    url='/home/youxiang/'+y2;
    $.get(url,function(res){

      if(res==1){
$('#yanzhengma').attr('hidden',false);
$.cookie("total",60);
$('#send').attr("disabled", true);
        var interval=setInterval(function(){//每秒读取一次cookie
          //从cookie 中读取剩余倒计时
          total=$.cookie("total");
          //在发送按钮显示剩余倒计时
          $('#send').html('请等待'+total+'秒重新发送');
          //把剩余总倒计时减掉1
          total--;

          if(total==0){//剩余倒计时为零，则显示 重新发送，可点击
          //清除定时器
          clearInterval(interval);
          //删除cookie
          total=$.cookie("total",total, { expires: -1 });

          //显示重新发送
          $('#send').html('重新发送');
          //把发送按钮设置为可点击
          $('#send').attr("disabled", false);
          }else{//剩余倒计时不为零

          //重新写入总倒计时
          $.cookie("total",total);
          }

        },1000);



/////////////////////////////////////////////////////////////
 }else{
        alert('验证码发送失败');
      }


    })
}else{
    alert('邮箱或用户未填请仔细确认');
}
return false;
});

//验证码提交
$("#gai").submit(function(){

        var username = $('#username').val();
        var youxiang = $('#youxiang').val();
        var yanzhengma = $('#yanzhengma').val();
        // var nps=$('#npassword').val();
        // alert(11111);
        // alert($('#name').val());
        if(username==''|| youxiang==''||yanzhengma== ''){
            // alert(1111);
            alert('您有账号邮箱或验证码未填,请仔细确认');
        }else{
            var data={
                'name':username,
                'youxiang':youxiang,
                'yanzhengma':yanzhengma
            };


            var url='/home/shensu';


            $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });
            $.post(url,data,function(res){


            if(res.msg==1){
                alert('申诉成功!您的初始化密码为'+res.password);
                // window.location.href='/home';//登录成功跳到首页
            }else if(res.msg==2){
                alert('申诉失败');
                // $('#password').val('');
            }else{
                alert('邮箱与验证码不匹配');
            }
                // if(res==1){
                //     alert('登录成功');

                // }else{
                //     alert('账号或者密码错误');
                // }


        },'json');


    }
return false;
});











setTimeout(function(){
    $("#alert").hide();
},2500);
$('#button').click(function()
{
    $("#alert").hide();
});



</script>



@endsection