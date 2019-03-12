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
@if (session('error'))
    <div id="alert" class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
        <strong>{{ session('error') }}</strong>
    </div>
@endif
    <div id="right_ctn">
        <div class="right_m">
            <!--会议列表-->
            <div class="hy_list">
                <div class="box_t">
                    <span class="name">添加管理员</span>
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--终端列表-->
                <form action="/admin/user" method="post">
                    {{ csrf_field() }}
                    <div class="xjhy">
                        <!--基本配置-->
                        <ul class="hypz" style="padding-top:0px;">
                            <li class="clearfix">
                                <span class="title">用户名：</span>
                                <div class="li_r">
                                    <input name="user" type="text" id='name'>
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
                                <input class="btn btn-primary" id="sub" type="submit" value="添加" disabled="true" style="margin-left: 190px;margin-top: 30px;">
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
        $(document).ready(function(){
            $('#name').blur(function(){
                if ($(this).val() == '') {
                    $('#yonghu').removeClass();
                    $('#yonghu').addClass('fail');
                    $('#yonghu').text('用户名不能为空');
                    $('#sub').attr({'disabled':'disabled'});
                    $('#password').attr({'disabled':'disabled'});
                    $('#repassword').attr({'disabled':'disabled'});
                    $('#name').focus();
                    return false;
                } else if (!($(this).val().match(/^\S+$/))) {
                    $('#yonghu').removeClass();
                    $('#yonghu').addClass('fail');
                    $('#yonghu').text('用户名格式不正确');
                    $('#sub').attr({'disabled':'disabled'});
                    $('#password').attr({'disabled':'disabled'});
                    $('#repassword').attr({'disabled':'disabled'});
                    $('#name').focus();
                    return false;
                }else{
                    $('#yonghu').removeClass();
                    $('#yonghu').addClass('success');
                    $('#password').attr('disabled',false);
                    $('#repassword').attr('disabled',false);
                }

            });

                //验证密码不为空与正则
                $('#password').blur(function() {
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
                        $('#remima').removeClass();
                        $('#remima').addClass('fail');
                        $('#remima').text('密码不可为空');
                        $('#sub').attr({'disabled':'disabled'});
                    } else if(($(this).val().length) < 6) {
                        $('#remima').removeClass();
                        $('#remima').addClass('fail');
                        $('#remima').text('密码不可小于6位');
                        $('#sub').attr({'disabled':'disabled'});
                    } else if($(this).val() != $pass) {
                        $('#remima').removeClass();
                        $('#remima').addClass('fail');
                        $('#remima').text('两次密码不一致');
                        $('#sub').attr({'disabled':'disabled'});
                    }else{
                        $('#remima').removeClass();
                        $('#remima').addClass('success');
                        $('#remima').text('密码格式正确');
                        $('#sub').attr('disabled',false);
                    }

                });

            $('form').submit(function(){
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