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
@section('style')
<style type="text/css">
    .fail {
        font-size: 13px;
        color: red;
        width: 300px;
        height: 30px;
        margin: 0 auto;
        margin-left:-120px;
    }

    .success {
        font-size: 13px;
        color: green;
        width: 300px;
        margin: 0 auto;
        margin-left:-120px;
    }
</style>
@endsection
@section('content')
    <div id="right_ctn">
        <div class="right_m">
            <!--会议列表-->
            <div class="hy_list">
                <div class="box_t">
                    <span class="name">添加管理员</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">系统维护</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">用户信息</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--终端列表-->
                <form action="/admin/yhxx" method="post">
                    {{ csrf_field() }}
                    <div class="xjhy">
                        <!--基本配置-->
                        <ul class="hypz" style="padding-top:0px;">
                            <li class="clearfix">
                                <span class="title">注册用户名：</span>
                                <div class="li_r">
                                    <input name="name" type="text" id='name'>
                                </div>
                                <span id='yonghu'></span>
                            </li>
                            <li class="clearfix">
                                <span class="title">密码：</span>
                                <div class="li_r">
                                    <input name="password" type="password" id="password">
                                </div>
                                <span id="mima"></span>
                            </li>
                            <li class="clearfix">
                                <span class="title">重复密码：</span>
                                <div class="li_r">
                                    <input name="repassword" type="password" id="repassword">
                                </div>
                                <span id="remima"></span>
                            </li>
                            <li class="tj_btn">
                                <input id="sub" type="submit" value="添加" disabled="true" style="margin-left: 190px;margin-top: 30px;">
                            </li>
                        </ul>
                        <!--基本配置-->
                    </div>
                </form>
                <!--终端列表-->
            </div>
            <!--会议列表-->
        </div>
    </div>
    <script type="text/javascript">
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $(document).ready(function(){
            $('#name').blur(function(){
                if ($(this).val() == '') {
                    $('#yonghu').addClass('fail');
                    $('#yonghu').text('用户名不能为空');
                    $('#sub').attr({'disabled':'disabled'});
                    $('#password').attr({'disabled':'disabled'});
                    $('#repassword').attr({'disabled':'disabled'});
                    $('#name').focus();
                    return false;
                } else if (!($(this).val().match(/^\S+$/))) {
                    $('#yonghu').addClass('fail');
                    $('#yonghu').text('用户名格式不正确');
                    $('#sub').attr({'disabled':'disabled'});
                    $('#password').attr({'disabled':'disabled'});
                    $('#repassword').attr({'disabled':'disabled'});
                    $('#name').focus();
                    return false;
                }

                var iname = $(this).val();
                // alert(iname);
                var url = 'http://www.addhao.com/admin/yhxx/'+iname;
                $.get(url,function(res){
                     if (res == 1) {
                        $('#yonghu').addClass('fail');
                        $('#yonghu').text('用户名已存在');
                        $('#password').attr({'disabled':'disabled'});
                        $('#repassword').attr({'disabled':'disabled'});
                        $('#sub').attr({'disabled':'disabled'});
                        $('#name').focus();
                         return false;
                    } else {
                        $('#yonghu').addClass('success');
                        $('#yonghu').text('用户名可用');
                        $('#password').attr('disabled',false);
                        $('#repassword').attr('disabled',false);
                    }
                });               
            });

                //验证密码不为空与正则
                $('#password').blur(function() {
                    // alert('123');
                    if ($(this).val() == '') {
                        $('#mima').addClass('fail');
                        $('#mima').text('密码不可为空');
                        $('#sub').attr({'disabled':'disabled'});
                        $('#password').focus();
                        return false;
                    } else if(($(this).val().length) < 6){
                        $('#mima').addClass('fail');
                        $('#mima').text('密码不可小于6位');
                        $('#sub').attr({'disabled':'disabled'});
                        $('#password').focus();
                        return false;
                    } else {
                        $('#mima').addClass('success');
                        $('#mima').text('密码格式正确');
                        $('#sub').attr({'disabled':'disabled'});
                    }

                }); 
              
                $('#repassword').blur(function() {
                    $pass = $('#password').val();
                    if ($(this).val() == '') {
                        $('#remima').addClass('fail');
                        $('#remima').text('密码不可为空');
                        $('#sub').attr({'disabled':'disabled'});
                    } else if(($(this).val().length) < 6) {
                        $('#remima').addClass('fail');
                        $('#remima').text('密码不可小于6位');
                        $('#sub').attr({'disabled':'disabled'});
                    } else if($(this).val() != $pass) {
                        $('#remima').addClass('fail');
                        $('#remima').text('两次密码不一致');
                        $('#sub').attr({'disabled':'disabled'});
                    }else{
                        $('#remima').addClass('success');
                        $('#remima').text('密码格式正确');
                        $('#sub').attr('disabled',false);
                    }

                });

            $('form').submit(function(){
                // alert('123');
                $name = $('#name').val();
                $pass = $('#password').val();
                $repass = $('repassword').val();
                if($name =='' || $pass=='' || $repass == ''){
                    alert('用户名密码不能为空');
                    return false;
                }
            });

        });

    </script>
@endsection