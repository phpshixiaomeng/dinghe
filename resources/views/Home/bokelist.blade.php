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
                        <div class="single-sidebar-widget mb-45">
                            <h3>featured games</h3>
                            <div class="single-featured-game mb-20">
                                <div class="game-img">
                                    <a href="#"><img src="assets/images/banner/sidebar-banner1.jpg" alt=""></a>
                                    <a class="game-title" href="#">the killer</a>
                                </div>
                            </div>
                            <div class="single-featured-game mb-20">
                                <div class="game-img">
                                    <a href="#"><img src="assets/images/banner/sidebar-banner2.jpg" alt=""></a>
                                    <a class="game-title" href="#">muscle cars</a>
                                </div>
                            </div>
                        </div>
                        <!--Single Sidebar Widget End-->
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                            <h3>follow us</h3>
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
                            <h3>popular/recomended</h3>
                            <div class="popular-game mb-20">
                                <div class="game-img">
                                    <a href="#"><img src="assets/images/banner/sidebar-banner3.jpg" alt=""></a>
                                </div>
                                <div class="game-content">
                                    <h3><a href="#">Splinter cell</a></h3>
                                    <span>pc/xbox/ps4</span>
                                </div>
                            </div>
                            <div class="popular-game mb-20">
                                <div class="game-img">
                                    <a href="#"><img src="assets/images/banner/sidebar-banner4.jpg" alt=""></a>
                                </div>
                                <div class="game-content">
                                    <h3><a href="#">battle field 4</a></h3>
                                    <span>pc/xbox/ps4</span>
                                </div>
                            </div>
                        </div>
                        <!--Single Sidebar Widget End-->
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                            <h3>近期大作</h3>
                            <div class="sidebar-rc-post">
                                <ul>
                                    <li>
                                        <div class="rc-post-thumb">
                                            <a href="#"><img src="assets/images/rc-img/rc-img1.jpg" alt=""></a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h3><a href="#">latest update of the new version</a></h3>
                                            <div class="widget-date">05 November, 2018</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rc-post-thumb">
                                            <a href="#"><img src="assets/images/rc-img/rc-img2.jpg" alt=""></a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h3><a href="#">Crew in the earth get new season</a></h3>
                                            <div class="widget-date">08 November, 2018</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rc-post-thumb">
                                            <a href="#"><img src="assets/images/rc-img/rc-img3.jpg" alt=""></a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h3><a href="#">secrect code for the Mortal Kombat 4</a></h3>
                                            <div class="widget-date">05 November, 2018</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rc-post-thumb">
                                            <a href="#"><img src="assets/images/rc-img/rc-img4.jpg" alt=""></a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h3><a href="#">need for speed have new challenge</a></h3>
                                            <div class="widget-date">02 November, 2018</div>
                                        </div>
                                    </li>
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
                        <div class="single-sidebar-widget">
                            <h3>follow us</h3>
                            <div class="sidebar-instagram">
                                <ul>
                                    <li><a href="#"><img src="assets/images/instagram/instagram1.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="assets/images/instagram/instagram2.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="assets/images/instagram/instagram3.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="assets/images/instagram/instagram4.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="assets/images/instagram/instagram5.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="assets/images/instagram/instagram6.jpg" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                        <!--Single Sidebar Widget End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Blog Area End-->

@endsection