@extends('Home/show/head')
@section('content')
    <!--Video Area Start-->
    <div class="video-area section pt-85 pt-lg-65 pt-md-55 pt-sm-55 pt-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--Game Toolbar Start-->
                    <div class="game-topbar-wrapper d-md-flex justify-content-md-between align-items-center">
                    <form  action="/home/video" method="get">
                        <div class="game-search-box">
                            <h3>搜索游戏</h3>
                            <input type="text" name="search" placeholder="视频名字">
                            <button><i class="icofont-search-2"></i></button>
                        </div>
                    </form>
                         <!--Toolbar Short Area Start-->

                         <!--Toolbar Short Area End-->
                    </div>
                    <!--Game Toolbar End-->
                </div>
            </div>
            <div class="row">


                @foreach($data as $val)
                <div class="col-md-6">
                    <!--Single Video Popup Start-->
                    <div class="single-video-popup mb-30">
                        <div class="video-img">

                            <video poster="/uploads/{{$val->image}}" src="{{$val->href}}" data-color="#fff000" data-ckin="compact" data-overlay="2"></video>

                        </div>
                        <div class="video-content">
                                <h3>{{$val->title}}</h3>
                        </div>
                    </div>
                    <!--Single Video Popup End-->
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-12">
                <div class="blog-pagination text-center">
                    <ul class="page-pagination" style="margin-left:500px;">
                 {{ $data->appends($request)->links()}}
                 </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!--Video Area End-->
<script src="/assets/dist/js/ckin.js"></script>
    @endsection