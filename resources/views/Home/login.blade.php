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
                        <form>
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12 mb-30"><input type="text" id="name" placeholder="请输入用户名"></div>
                                <div class="col-12 mb-20"><input type="password" id="password" placeholder="请输入密码"></div>
                                <div class="col-12 mb-15">

                                    <input type="checkbox" id="remember_me">
                                    <!-- <label for="remember_me">记住我</label> -->

                                    <a href="#">忘记了密码？</a>

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
<script>

$("form").submit(function(){

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
setTimeout(function(){
    $("#alert").hide();
},2500);
$('#button').click(function()
{
    $("#alert").hide();
});


</script>



@endsection