@extends('admin/public/public')
@section('function')

    $(function() {
        //自适应屏幕宽度
        window.onresize = function() { location = location };

        var w_height = $(window).height();
        $('.bg_img').css('height', w_height + 'px');

        var bg_wz = 1920 - $(window).width();
        $('.bg_img img').css('margin-left', '-' + bg_wz / 2 + 'px')

        $('.language .lang').click(function() {
            $(this).siblings('.lang_ctn').toggle();
        });
    })
 @endsection
@section('content')

    <!--登录-->
    <div class="login">
        <!-- <div class="bg_img"><img src="admin_assets/images/login_bg.jpg"/></div> -->
            <div class="logo">
                <a href=""><img src="Assets/images/logo.png" alt=""/></a>
            </div>
            <div class="login_m">
                <form action="" method="post">
                    <ul>
                        <li class="wz">用户名</li>
                        <li><input name="" type="text"></li>
                        <li class="wz">密码</li>
                        <li><input name="" type="password"></li>
                        <li class="wz">语言</li>
                        <li class="language">
                            <div class="lang">
                                <span>简体中文</span>
                                <em>&nbsp;</em>
                            </div>
                            <ul class="lang_ctn">
                                <li>
                                    <span>繁體</span>
                                </li>
                                <li>
                                    <span>ENGLISH</span>
                                </li>
                            </ul>
                        </li>
                        <li class="l_btn">
                            <a href="">登录</a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
        <!--登录-->
@endsection