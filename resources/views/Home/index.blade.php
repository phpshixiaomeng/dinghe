@extends('Home/show/head')
@section('content')

    <!--Featured section start-->
    <div class="featured-section section pb-95 pb-lg-75 pb-md-65 pb-sm-55 pb-xs-45">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-12">
                    <!--Featured Title Start-->
                    <div class="featured-title">
                        <h2>特色游戏S</h2>
                        <a href="/home/games">查看所有游戏S</a>
                    </div>
                    <!--Featured Title End-->
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="featured-slide">



                        @foreach($data as $val)
                        <div class="single-featured img-full">
                            <a href="{{$val->gname}}"><img src="/uploads/{{ $val->image }}" alt="" ></a>
                        </div>
                        @endforeach
                        @if($num==3)
                        <div class="single-featured img-full">
                            <img src="assets/images/feature/zanwu.jpg" alt="" >
                        </div>
                        <div class="single-featured img-full">
                           <img src="assets/images/feature/zanwu.jpg" alt="">
                        </div>
                        @endif
                        @if($num==2)

                        <div class="single-featured img-full">
                           <img src="assets/images/feature/zanwu.jpg" alt="">
                        </div>
                        <div class="single-featured img-full">
                            <img src="assets/images/feature/zanwu.jpg" alt="">
                        </div>
                        <div class="single-featured img-full">
                           <img src="assets/images/feature/zanwu.jpg" alt="">
                        </div>
                        @endif
                        @if($num==1)
                        <div class="single-featured img-full">
                            <img src="assets/images/feature/zanwu.jpg" alt="">
                        </div>
                        <div class="single-featured img-full">
                           <img src="assets/images/feature/zanwu.jpg" alt="">
                        </div>
                        <div class="single-featured img-full">
                            <img src="assets/images/feature/zanwu.jpg" alt="">
                        </div>
                        <div class="single-featured img-full">
                           <img src="assets/images/feature/zanwu.jpg" alt="">
                        </div>
                        @endif
                        @if($num==0)
                        <div class="single-featured img-full">
                            <img src="assets/images/feature/zanwu.jpg" alt="">
                        </div>
                        <div class="single-featured img-full">
                           <img src="assets/images/feature/zanwu.jpg" alt="">
                        </div>
                        <div class="single-featured img-full">
                            <img src="assets/images/feature/zanwu.jpg" alt="">
                        </div>
                        <div class="single-featured img-full">
                           <img src="assets/images/feature/zanwu.jpg" alt="">
                        </div>
                        <div class="single-featured img-full">
                           <img src="assets/images/feature/zanwu.jpg" alt="">
                        </div>

                        @endif












                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Featured section end-->

    <!--New Game Area Start-->
    <div class="new-game-area section pb-50 pb-lg-30 pb-md-20 pb-sm-10 pb-xs-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--Section Title Start-->
                    <div class="section-title">
                        <h2><span class="color-blue">new</span> games</h2>
                    </div>
                    <!--Section Title End-->
                </div>
            </div>
            <div class="row game-slide">
                <div class="col-4">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game1.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">长卷</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game4.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">长卷</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-4">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game2.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">长卷l</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game5.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">长卷</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-4">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game3.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">长卷</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game6.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">长卷</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-4">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game2.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">长卷</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game5.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">长卷</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-4">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game1.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">长卷</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game3.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">长卷</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
            </div>
        </div>
    </div>
    <!--New Game Area End-->


    <!--Games Review Section Start-->
    <div class="games-review-section section pb-105 pb-lg-85 pb-md-20 pb-sm-65 pb-xs-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--Section Title Start-->
                    <div class="section-title">
                        <h2><span class="color-blue">游戏资讯</span></h2>
                    </div>
                    <!--Section Title End-->
                </div>
            </div>
            <div class="row">
            @foreach($zixun as $v)
                <div class="col-lg-4 col-md-6">
                    <!--Single Games Review Start-->
                    <div class="single-games-review mb-50">
                        <div class="review-img">
                           <a href="/home/{{$v->id}}/gamesnews" class="btn btn-info"><img src="/uploads/{{$v->image}}" alt=""></a>
                        </div>
                        <div class="review-content">
                            <h4><a href="games-details.html">{{$v->gname}}</a></h4>
                            <span>{{$v->auth}}</span>
                            <p>{{$v->contact}}</p>
                            <a href="/home/{{$v->id}}/gamesnews" class="btn btn-info">查看详情</a></li>
                        </div>
                    </div>
                    <!--Single Games Review End-->
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!--Games Review Section Start-->
<script src="/assets/dist/js/ckin.js"></script>
@endsection
