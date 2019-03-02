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

                                <div class="col-12 mb-30">
                                <div id="tishi">

                                </div><input type="text" name="name" placeholder="输入用户名" id="name">注意:用户名和密码应以字母开头，长度在6-16之间只能包含字符、数字和下划线
                                <div id="tishitt">

                                </div>

                                </div>

                                <!-- <div class="col-12 mb-30"><input type="email" placeholder="Your email here"></div> -->
                                <div class="col-12 mb-30">
                                <div id="tishit">

                                </div>

                                <input type="password" name="password" placeholder="输入密码" id="password"></div>











                                <div class="col-12 mb-30">
                                <div id="tishittt">

                                </div>

                                <input type="password" name="npassword" placeholder="请确认密码" onblur="yanzheng()" id="npassword"></div>

                                <div class="col-12 mb-30">
                                <div id="duanxin">

                                </div>

                                <input type="text" name="duanxin0" id="phone" placeholder="输入手机号获取短信验证码"><div class="fa fa-twitter"><input type="button" id="facai" value="获取验证码"></div>


                            <input type="text" name="ma" id="ma" placeholder="输入验证码">
                                </div>




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
        //
        //
//短信验证
    $("#facai").click(function(){
        $yz=$("#phone").val();
        // alert($yz);
        //手机号正则验证
         var str = $("#phone").val();

            var ret =  /^((13[0-9])|(17[0-1,6-8])|(15[^4,\\D])|(18[0-9]))\d{8}$/;
            if(str!=''){
            if(!ret.test(str)){

                $("#duanxin").html('<font color="red">手机号格式不正确</font>');
                $("#phone").val('');

            }else{




//ajax短信提交
    var phone=$('#phone').val();
    var url="http://www.dingding.com/home/zhuce/create?phone="+phone;
     $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });
    $.get(url,function(res){
    if(res==0){
        $('#duanxin').html('<font color="green">短信验证法发送成功!</font>');
    }else{
        $('#duanxin').html('<font color="red">短信验证法发送失败!</font>');
    }

    })




//



    $a=60;//秒数
    var zz=setInterval(function(){
    if($a==0){
    clearInterval(zz);
    $("#facai").attr('disabled',false);
    $("#facai").val("获取验证码");
    }else{
    $a--;
    $("#facai").val($a+'秒后可再次发送短信');
}
},1000);
$("#facai").attr('disabled',true);
}
}
    })
//焦点事件
    $("#name").focus(function(){
        $("#tishitt").html('');
        $("#tishi").html('');
    })
    $("#password").focus(function(){
        $("#tishit").html('');
})
    $("#phone").focus(function(){
        $("#duanxin").html('');
})
    $("#npassword").focus(function(){
        $("#tishittt").html('');
})


    //提示注册



    //查询账号是否重复
    $("#name").blur(function(){
            var str = $("#name").val();

            var ret = /^[a-zA-Z][a-zA-Z0-9_]{5,17}$/;
            if(str!=''){
            if(!ret.test(str)){

                $("#tishitt").html('<font color="red">用户名格式不正确</font>');
                $("#name").val('');

            }
        }


            var name=$("#name").val();
            var data= "/home/zhuce/"+name;
         $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });



        $.get(data,function(res){
        // alert(res);
        if(name!=''){
        if(res == '1'){
        // $("#gradeinfo").html("<font color="red">您输入的用户名存在！请重新输入！</font>");
        // alert('22222');
        // alert('您输入的用户名存在！请重新输入！');
        $("#tishi").html('<font color="red">用户名已存在,用户名不可用</font>');
        $("#name").val('');
        }else{
            $("#tishi").html('<font color="green">用户名可用</font>');
        }
    }
        // $("#gradeinfo").html("");
        // alert('3333');
})
})

//密码正则验证
$("#password").blur(function(){
            var str = $("#password").val();

            var ret = /^[a-zA-Z][a-zA-Z0-9_]{5,17}$/;
            if(str!=''){
            if(!ret.test(str)){


                $("#tishit").html('<font color="red">密码格式不正确</font>');
                $("#password").val('');

            }
        }






})











    //验证两次注册密码
    function yanzheng(){
        // alert(1111);
        // $data=$('input')
            $p1=$('input[name=password]').val();
            $p2=$('input[name=npassword]').val();
        // alert($data);
    if($p2!=''){
    if($p1!=$p2){
        // $p2.val('');
        $("#tishittt").html('<font color="red">两次密码不一样,请重新输入</font>');
        $('input[name=npassword]').val('');
    }
}
    }
    //提交注册
    $("form").submit(function(){

        var name=$('#name').val();
        var ps=$('#password').val();
        var nps=$('#npassword').val();
        var phone=$('#phone').val();
        var duanxin=$('#ma').val();
        // alert(11111);
        // alert($('#name').val());
        if(name==''||ps==''||nps=='' || phone=='' || duanxin==''){
            // alert(1111);
            alert('用户名密码手机号短信验证码不能为空,请仔细确认');
        }else{
            var data={
                'name':name,
                'password':ps,
                'phone':phone,
                'ma':duanxin
            };
            var url='/home/zhuce';
            $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });
            $.post(url,data,function(res){


                if(res==1){
                    alert('注册成功');
                    window.location.href('http://www.dingding.com/home');//注册成功跳到首页
                }else{
                    alert('注册失败,短信验证码错误');
                    var ps=$('#password').val('');
                    var nps=$('#npassword').val('');
                    // var phone=$('#phone').val('');
                    // var duanxin=$('#ma').val('');
                }


        });


    }
return false;
});






    </script>
     <!--Login Section End-->

  @endsection