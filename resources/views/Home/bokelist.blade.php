@extends('Home/show/head')
@section('content')

    <!--Blog Area Start-->
    <div class="blog-list-area section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-xs-50">
        <div class="container">
            <div class="row row-25">
                <div class="col-lg-8">
                    <div class="row">
                    @foreach($data as $val)
                        <div class="col-12">
                            <!--Single Blog Post Start-->
                            <div class="single-blog-post blog-list mb-30">
                                <div class="blog-img">
                                    <img src="/uploads/{{ $val->image }}" alt="">
                                </div>
                                <div class="blog-content">
                                    <h3>{{$val->title}}</h3>
                                    <p>{{$val->contact}}</p>
                                    <div class="blog-bottom">
                                        <ul class="meta meta-border-bottom">
                                            <li>{{$val->auth}}</li>
                                            <li>{{$val->created_at}}</li>
                                            <li>热度:{{$val->fire}}度</li><br>
                                            <li><a href="/home/{{$val->id}}/gamesnews" class="btn btn-info">查看详情</a></li>
                                        </ul>




                                    </div>
                                </div>
                            </div>
                            <!--Single Blog Post End-->
                        </div>
                    @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="blog-pagination text-center">
                                <ul class="page-pagination">
                                   <li>{{ $data->links() }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area mt-sm-55 mt-xs-50">
                        <!--Single Sidebar Widget Start-->
                        <!--Single Sidebar Widget End-->
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                            <h3>跟随我们</h3>
                            <div class="sidebar-social">
                                <ul>
                                    <li><a class="facebook" href="#"><i class="icofont-facebook"></i></a></li>
                                    <li><a class="youtube" href="#"><i class="icofont-youtube-play"></i></a></li>
                                    <li><a class="instagram" href="#"><i class="icofont-instagram"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="icofont-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!--Single Sidebar Widget End-->
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                             <h3>流行/热销</h3>
                          @foreach($tuijian as $v)
                            <div class="popular-game mb-20">
                                <div class="game-img">
                                    <a href="/home/gamexq/{{ $v->id }}"><img src="/uploads/{{ $v->game_img }}" alt=""></a>
                                </div>
                                <div class="game-content">
                                    <h3><a href="/home/gamexq/{{ $v->id }}">{{ $v->name }}</a></h3>
                                    <span>激情发售!</span>
                                </div>
                            </div>
                          @endforeach
                        </div>
                        <!--Single Sidebar Widget End-->
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                            <h3>近期大作</h3>
                            <div class="sidebar-rc-post">
                                <ul>
                                   @foreach($xinpin as $v)
                                    <li>
                                        <div class="rc-post-thumb">
                                            <a href="/home/gamexq/{{ $v->id }}"><img src="/uploads/{{ $v->game_img }}" alt=""></a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h3><a href="/home/gamexq/{{ $v->id }}">{{$v->name}}</a></h3>
                                            <div class="widget-date">{{$v->game_time}}</div>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--Single Sidebar Widget End-->
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                            <div class="sidebar-banner">
                                <a href="#"><img src="assets/images/banner/banner2.jpg" alt=""></a>
                            </div>
                        </div>
                        <!--Single Sidebar Widget End-->
                        <!--Single Sidebar Widget Start-->

                        <!--Single Sidebar Widget End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Blog Area End-->

@endsection