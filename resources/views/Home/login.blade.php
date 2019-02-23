@extends('Home/show/head')
@section('content')

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
                        <form action="#">
                            <div class="row">
                                <div class="col-12 mb-30"><input type="text" placeholder="Type your username or email address"></div>
                                <div class="col-12 mb-20"><input type="password" placeholder="Enter your passward"></div>
                                <div class="col-12 mb-15">

                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">记住我</label>

                                    <a href="#">忘记了密码？</a>

                                </div>
                                <div class="col-12"><input type="submit" value="LOGIN"></div>
                            </div>
                        </form>
                        <h4>没有帐户？请点击 <a href="register.html">注册</a></h4>

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




@endsection