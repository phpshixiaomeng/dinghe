@extends('Home/show/head')
@section('content')
<!--Login Section Start-->
    <div class="login-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45">
        <div class="container">
            <div class="row">

                <!-- Login -->
                <div class="col-md-6 col-12 d-flex">
                    <div class="gilbard-login">

                        <h3>我们需要您的注册</h3>
                        <p>Scream尖叫游戏公司提供了所有这些谴责快乐和歌唱痛苦的错误想法，这将给你一个完整的系统描述，并阐述</p>

                        <!-- Login Form -->
                        <form action="" method="">

                        {{csrf_field()}}
                            <div class="row">

                                <div class="col-12 mb-30"><input type="text" name="name" placeholder="输入用户名" id="name">注意:用户名和密码应以字母开头，长度在6-16之间只能包含字符、数字和下划线</div>

                                <!-- <div class="col-12 mb-30"><input type="email" placeholder="Your email here"></div> -->
                                <div class="col-12 mb-30"><input type="password" name="password" placeholder="输入密码" id="password"></div>
                                <div class="col-12 mb-30"><input type="password" name="npassword" placeholder="请确认密码" onblur="yanzheng()" id="npassword"></div>
                                <div class="col-12"><input type="submit" value="立即注册"></div>
                            </div>
                        </form>
                        <h4>有账户吗？请点击 <a href="login">登陆</a></h4>
                    </div>
                </div>

                <div class="col-md-1 col-12 d-flex">

                    <div class="login-reg-vertical-boder"></div>

                </div>

                <!-- Login With Social -->
                <div class="col-md-5 col-12 d-flex">

                    <div class="gilbard-social-login">
                        <h3>你也可以用这些登陆</h3>

                        <a href="#" class="facebook-login">登陆用<i class="fa fa-facebook"></i></a>
                        <a href="#" class="twitter-login">登陆用 <i class="fa fa-twitter"></i></a>
                        <a href="#" class="google-plus-login">登陆用<i class="fa fa-google-plus"></i></a>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <script>
        // alert($);
    //查询账号是否重复
    $("#name").blur(function(){
            var str = $("#name").val();

            var ret = /^[a-zA-Z][a-zA-Z0-9_]{5,17}$/;

            if(!ret.test(str)){

                alert('用户名密码格式不正确请检查后重新输入');
                $("#name").val('');

            }



            var name=$("#name").val();
        var data= "http://www.dingding.com/zhuce/"+name;
        $.get(data,function(res){
        // alert(res);
        if(res == '1'){
        // $("#gradeinfo").html("<font color="red">您输入的用户名存在！请重新输入！</font>");
        // alert('22222');
        alert('您输入的用户名存在！请重新输入！');
        $("#name").val('');
        }
        // $("#gradeinfo").html("");
        // alert('3333');
})
})

//密码正则验证
$("#password").blur(function(){
            var str = $("#password").val();

            var ret = /^[a-zA-Z][a-zA-Z0-9_]{5,17}$/;

            if(ret.test(str)){



            }else{

                alert('用户密码格式不正确请检查后重新输入');
                $("#password").val('');

            }






})











    //验证两次注册密码
    function yanzheng(){
        // alert(1111);
        // $data=$('input')
            $p1=$('input[name=password]').val();
            $p2=$('input[name=npassword]').val();
        // alert($data);
    if($p1!=$p2){
        // $p2.val('');
        alert('两次密码不一致,请重新输入');
        $('input[name=npassword]').val('');
    }

    }
    //提交注册
    $("form").submit(function(){

        var name=$('#name').val();
        var ps=$('#password').val();
        var nps=$('#npassword').val();
        // alert(11111);
        // alert($('#name').val());
        if(name==''||ps==''||nps==''){
            // alert(1111);
            alert('您有账号或密码未填,请仔细确认');
        }else{
            var data={
                'name':name,
                'password':ps

            };
            var url='http://www.dingding.com/zhuce';
            $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });
            $.post(url,data,function(res){


                if(res==1){
                    alert('注册成功');
                    window.location.href('http://www.dingding.com/home');//注册成功跳到首页
                }


        });


    }
return false;
});

    </script>
     <!--Login Section End-->

  @endsection