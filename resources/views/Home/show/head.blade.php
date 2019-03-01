<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <!-- <meta charset="utf-8"> -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home 01 || Gilbard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link href="/assets/images/favicon.ico" type="img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/qanto.css">
    <link rel="stylesheet" href="/assets/css/bauhaus93.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/icofont.min.css">
    <link rel="stylesheet" href="/assets/css/plugins.css">
    <link rel="stylesheet" href="/assets/css/helper.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="/assets/css/styler.css" rel="stylesheet" type="text/css">


    <!-- Modernizr JS -->
    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="/assets/js/jquery-3.1.1.min.js"></script>
 </head>
<body>

<div id="main-wrapper">

    <!--Header section start-->
    <header class="header header-static bg-black header-sticky">
        <div class="default-header menu-right">
            <div class="container container-1520">
                <div class="row">

                    <!--Logo start-->
                    <div class="col-12 col-md-3 col-lg-3 order-md-1 order-lg-1 mt-20 mb-20">
                        <div class="logo">
                            <a href="/home"><img src="/assets/images/logo.png" alt=""></a>
                        </div>
                    </div>
                    <!--Logo end-->

                    <!--Menu start-->
                   <div class="col-lg-6 col-12 order-md-3 order-lg-2 d-flex justify-content-center">
                        <nav class="main-menu menu-style-2">
                            <ul>
                                <li><a href="/home">首页</a>
                                    <!-- <ul class="sub-menu"> -->
                                        <!-- <li><a href="index.html">首页 One</a></li> -->
                                        <!-- <li><a href="index-2.html">首页 Two</a></li>
                                        <li><a href="index-3.html">首页 Three</a></li>
                                        <li><a href="index-4.html">首页 Four</a></li>
                                        <li><a href="index-5.html">首页 Five</a></li>
                                        <li><a href="index-landing.html">首页 Landing</a></li> -->
                                    <!-- </ul> -->
                                </li>
                                <li><a href="/home/games">游戏</a>
                                    <ul class="sub-menu">

                                        @if($common_game_child)

                                        @foreach($common_game_child as $k=>$v)
                                         <li><a href="#">{{ $v->name }}</a></li>
                                        @endforeach
                                        @endif
                                        <li><a href="games">游戏商店</a></li>

                                    </ul>
                                </li>
                                <li><a href="/home/video">影像</a></li>

                                <li><a href="/home/luntan">论坛</a>
                                    <ul class="sub-menu">
                                        <li><a href="/home/luntan">论坛</a></li>
                                        <li><a href="/home/luntanfatie">发帖</a></li>
                                    </ul>
                                </li>
                                <li><a href="/home/bokelist">游戏资讯</a>
                                    <ul class="sub-menu">

                                        <li><a href="/home/bizhi">精美壁纸</a></li>
                                        <li><a href="/home/zhifu">付款</a></li>


                                        <!-- <li><a href="login/tuichu">退出</a></li> -->

                                    </ul>
                                </li>
                                <li><a href="/home/contact">联系</a></li>

                            </ul>
                        </nav>
                    </div>
                    <!--Menu end-->

                    <!--Header Right Wrap-->
                    <div class="col-12 col-md-9 order-md-2 order-lg-3 col-lg-3">
                        <div class="header-right-wrap">
                            <ul>

                           <?php if(!session_id()) session_start();?>
                            @if(empty($_SESSION))
                                <li><a href="/home/login">登录</a></li>
                                <li><a href="/home/zhuce">注册</a></li>
                            @else
                                <li><a href="javascript:if(confirm('确实要退出吗?'))location='http://www.dingding.com/home/zhuce/tui/edit'">退出</a></li>
                                <li><a href="/home/grxx">个人信息</a></li>
                            @endif
                                <li class="header-search"><a class="header-search-toggle" href="#"><i class="icofont-search-2"></i></a>
                                    <div class="header-search-form">
                                        <form action="#">
                                            <input type="text" placeholder="enter键搜索">
                                            <button><i class="icofont-search"></i></button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--Header Right Wrap-->

                </div>

                <!--Mobile Menu start-->
                <div class="row">
                    <div class="col-12 d-flex d-lg-none">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
                <!--Mobile Menu end-->

            </div>
        </div>
    </header>
    <!--Header section end-->

    <!--slider section start-->
    <div class="hero-section section position-relative">
        <div class="hero-slider">
            <!--Hero Item start-->

            @foreach($common_ads as $kk=>$vv)
            <div class="hero-item hero-item-2" style="background-image: url(/uploads/{{ $vv->image }})">
                <div class="container container-1520">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-content">
                                <h1 style="font-size: 50px; font-family:'微软雅黑' ;">{{ $vv->gname  }}</h1>
                                <h2 style="font-size: 50px; font-family:'微软雅黑' ;">{{ $vv->title  }}</h2>
                                <a class="df-btn" href="">现在购买</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!--Hero Item end-->
        </div>
    </div>
    <!--slider section end-->
@section('content')

@show

<!--Projects section start-->
    <div class="newslatter-section section pb-125 pb-lg-105 pb-md-70 pb-sm-85 pb-xs-50">
        <div class="container">

            <div class="row">
               <div class="col-12">
                   <!--News Latter Area Start-->
                   <div class="news-latter-area">
                       <div class="news-latter-box">
                           <h3>订阅我们的 <span class="color-blue">公众号</span> <br> 获取所有 <span class="color-red">最新</span> 新闻, 更新, <br> <span class="color-blue">视频</span> 和优惠 </h3>
                          <!--  <form action="#">
                               <input type="text" placeholder="Enter your email here">
                           </form> -->
                       </div>
                       <div class="news-latter-banner-image">
                           <img src="/assets/images/news-latter/news-banner.png" alt="">
                       </div>
                   </div>
                   <!--News Latter Area End-->
               </div>
            </div>

        </div>

    </div>
    <!--Projects section end-->

    <!--Footer section start-->
    <footer class="footer-section style-2 section bg-theme" style="background-image: url(/assets/images/bg/footer-bg.jpg)">

        <!--Footer Top start-->
        <div class="footer-top section pt-175 pt-lg-150 pt-md-125 pt-sm-110 pt-xs-40 pb-80 pb-lg-70 pb-md-60 pb-sm-15 pb-xs-40">
            <div class="container container-1520">
                <div class="row justify-content-lg-between">

                    <!--Footer Widget start-->
                    <div class="col-xl-3 col-lg-2 col-md-3">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="/home"><img src="/assets/images/logo.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!--Footer Widget end-->

                    <!--Footer Widget start-->
                    <div class="col-xl-6 col-lg-6 col-md-9">
                        <div class="footer-widget">
                            <div class="footer-nav">
                                <nav>
                                    <ul>
                                        <li><a href="#">论坛</a></li>
                                        <li><a href="#">演示</a></li>
                                        <li><a href="#">支持</a></li>
                                        <li><a href="#">条款条件</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--Footer Widget end-->

                    <!--Footer Widget start-->
                    <div class="col-xl-3 col-lg-4 col-md-12">
                        <div class="footer-widget">
                            <div class="footer-social">
                               <span>友情链接:</span>

                                <ul>
                                    @foreach($common_link as $kkk=>$vvv)
                                    <li><a href="{{ $vvv->url }}"><img style="width :40px;height: 40px;" src="uploads/{{ $vvv->image }}" alt=""></a></li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>
                    <!--Footer Widget end-->

                </div>
            </div>
        </div>
        <!--Footer Top end-->

        <!--Footer bottom start-->
        <div class="footer-bottom border-color section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright text-center">
                            <p>版权:{{$common_websites->title}}|<a  href="/home">Gilbard</a>. {{$common_websites->description}}.
                            |联系方式:{{$common_websites->information}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer bottom end-->

     </footer>
     <!--Footer section end-->

</div>

<!-- Placed js at the end of the document so the pages load faster -->

<!-- All jquery file included here -->
<script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/plugins.js"></script>
<script src="/assets/js/main.js"></script>
<!-- <script src="/assets/js/vendor/Choices.js"></script> -->
</body>

</html>