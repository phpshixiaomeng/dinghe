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
                        <form action="#">
                            <div class="row">
                                <div class="col-12 mb-30"><input type="text" placeholder="Your name here"></div>
                                <div class="col-12 mb-30"><input type="email" placeholder="Your email here"></div>
                                <div class="col-12 mb-30"><input type="password" placeholder="Enter passward"></div>
                                <div class="col-12 mb-30"><input type="password" placeholder="Conform password"></div>
                                <div class="col-12"><input type="submit" value="register"></div>
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
     <!--Login Section End-->

  @endsection