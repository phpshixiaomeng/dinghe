@extends('Home/show/head')
@section('content')

    <!--Games Details Area Start-->
    <div class="games-details-area section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-xs-45">
        <div class="container">
            <div class="row">
               <div class="col-lg-8">
                   <div class="row">
                       <div class="col-12">
                           <div class="game-image-gallery-wrap">
                            {{-- 大图片轮播 --}}
                            <div class="game-image-large">

                              @foreach($game_img as $key=>$value)
                                <div class="game-image img-full">
                                    <img src="/uploads/{{ $value->game_img }}" alt="">
                                </div>
                              @endforeach

                            </div>
                            {{-- 小图片轮播 --}}
                            <div class="game-image-thumbs">

                              @foreach($game_pic as $k=>$v)
                                <div class="sm-image"><img src="/uploads/{{ $v->game_pic }}" alt="product image thumb"></div>
                              @endforeach 
                                    
                            </div>
                            <div class="game-description mb-45">
                               <h3>{{ $gameslist->name }}</h3>
                               <p>{!! $gameslist->game_xq !!}</p>
                           </div>
                        </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-12">
                           <div class="timelaine-wrapper mb-30">
                               <div class="single-timeline pb-30">
                                  @foreach($game_peiz as $kk=>$vv)
                                    @if($vv->status == 0) 
                                       <h4>游戏标准配置</h4>
                                       操作系统：<p>{{ $vv->system }}</p>
                                       最佳内存:<p>{{ $vv->ram }}</p>
                                       最佳处理器:<p>{{ $vv->ram }}</p>
                                       最佳GPU:<p>{{ $vv->graphic }}</p>
                                       声卡:<p>{{ $vv->audio }}</p>
                                       硬盘:<p>{{ $vv->disk }}</p>
                                       其他事项：<p>{{ $vv->other }}</p>
                                    @endif
                                  @endforeach
                               </div>

                              <div class="single-timeline pb-30">
                                  @foreach($game_peiz as $kkk=>$vvv)
                                    @if($vvv->status == 1)               
                                       <h4>游戏最低配置</h4>
                                       操作系统：<p>{{ $vvv->system }}</p>
                                       最低内存:<p>{{ $vvv->ram }}</p>
                                       处理器:<p>{{ $vvv->ram }}</p>
                                       最佳GPU:<p>{{ $vvv->graphic }}</p>
                                       声卡:<p>{{ $vvv->audio }}</p>
                                       硬盘:<p>{{ $vvv->disk }}</p>
                                       其他事项：<p>{{ $vvv->other }}</p>
                                    @endif
                                  @endforeach    
                              </div> 

                               <div class="single-timeline pb-30">
                                   <h4>价格和购买</h4>
                                   <span class="game-price">价格 ￥{{ $gameslist->game_jg }}</span>
                                  
                                    
                                    <a href="/home/zhifu/{{ $gameslist->id }}">点击购买此游戏</a>
                                  
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-12">
                           <div class="ratting-wrap mb-40">
                               <h3>评级</h3>
                               <div class="rating-area">
                                   <div class="total-rating">
                                       <h2>4.82</h2>
                                       <span>(4.8 out of 5)</span>
                                   </div>
                                   <div class="rating-review">
                                       <div class="single-rating">
                                           <div class="rating-star">
                                               <span>5</span>
                                               <i class="fa fa-star"></i>
                                           </div>
                                           <div class="rating-progress">
                                               <div class="progress">
                                                  <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" data-wow-duration="1.5s" data-wow-delay="1.2s"></div>
                                               </div>
                                           </div>
                                           <div class="rating-count">
                                               <span>980</span>
                                           </div>
                                       </div>
                                       <div class="single-rating">
                                           <div class="rating-star">
                                               <span>4</span>
                                               <i class="fa fa-star"></i>
                                           </div>
                                           <div class="rating-progress">
                                               <div class="progress">
                                                  <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" data-wow-duration="1.5s" data-wow-delay="1.2s"></div>
                                               </div>
                                           </div>
                                           <div class="rating-count">
                                               <span>280</span>
                                           </div>
                                       </div>
                                       <div class="single-rating">
                                           <div class="rating-star">
                                               <span>3</span>
                                               <i class="fa fa-star"></i>
                                           </div>
                                           <div class="rating-progress">
                                               <div class="progress">
                                                  <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" data-wow-duration="1.5s" data-wow-delay="1.2s"></div>
                                               </div>
                                           </div>
                                           <div class="rating-count">
                                               <span>89</span>
                                           </div>
                                       </div>
                                       <div class="single-rating">
                                           <div class="rating-star">
                                               <span>2</span>
                                               <i class="fa fa-star"></i>
                                           </div>
                                           <div class="rating-progress">
                                               <div class="progress">
                                                  <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" data-wow-duration="1.5s" data-wow-delay="1.2s"></div>
                                               </div>
                                           </div>
                                           <div class="rating-count">
                                               <span>25</span>
                                           </div>
                                       </div>
                                       <div class="single-rating">
                                           <div class="rating-star">
                                               <span>1</span>
                                               <i class="fa fa-star"></i>
                                           </div>
                                           <div class="rating-progress">
                                               <div class="progress">
                                                  <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" data-wow-duration="1.5s" data-wow-delay="1.2s"></div>
                                               </div>
                                           </div>
                                           <div class="rating-count">
                                               <span>25</span>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-12">
                           <div class="review-wrap">
                              <h3>评论（120）</h3>
                              <!--Single Review Start-->
                              <div class="single-review mb-30">
                                  <h4>最佳动作游戏</h4>
                                  <div class="ratting">
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star-half-o"></i>
                                  </div>
                                  <p>T他是我玩过的最好的动作游戏。遭遇痛苦的后果。同样，我也不存在任何爱、追求或欲望的人，他们的意义微不足道，不那么性感，我们中的任何人都曾进行过艰苦的体育锻炼。</p>
                                  <div class="review-name-action">
                                      <a href="#">Adam Smith</a>
                                      <ul>
                                          <li><a href="#"><i class="fa fa-thumbs-o-up"></i>425</a></li>
                                          <li><a href="#"><i class="fa fa-thumbs-o-down"></i>65</a></li>
                                      </ul>
                                  </div>
                              </div>
                              <!--Single Review End-->
                              <!--Single Review Start-->
                              <div class="single-review mb-30">
                                  <h4>我真的爱这个游戏</h4>
                                  <div class="ratting">
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star-half-o"></i>
                                  </div>
                                  <p>The Witcher 3 is the best action game that i play ever. encounter consequences that are mely painful. Nor again is there me anyone who loves or pursues or desires take a trivial meaning less sexample, which of us ever undertakes laborious physical exercise.</p>
                                  <div class="review-name-action">
                                      <a href="#">Thomas Morgan</a>
                                      <ul>
                                          <li><a href="#"><i class="fa fa-thumbs-o-up"></i>425</a></li>
                                          <li><a href="#"><i class="fa fa-thumbs-o-down"></i>65</a></li>
                                      </ul>
                                  </div>
                              </div>
                              <!--Single Review End-->
                              <div class="reply-btn">
                                <a href="#">view more <i class="icofont-long-arrow-right"></i></a>
                              </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-4">
                    <div class="sidebar-area mt-sm-50 mt-xs-50">
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                            <h3>最新上架</h3>

                            @foreach($xin_game as $a=>$b)
                            <div class="single-featured-game mb-20">
                                <div class="game-img">
                                    <a href="#"><img src="/uploads/{{ $b->game_img }}" alt=""></a>
                                    <a class="game-title" href="#">{{ $b->name }}</a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!--Single Sidebar Widget End-->
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                            <h3>关注我们</h3>
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
                            <h3>促销游戏</h3>

                            @foreach($cu_game as $c=>$d)
                            <div class="popular-game mb-20">
                                <div class="game-img">
                                    <a href="#"><img src="/uploads/{{ $d->game_img }}" alt=""></a>
                                </div>
                                <div class="game-content">
                                    <h3><a href="#">{{ $d->name }}</a></h3>
                                    <span>pc/xbox/ps4</span>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!--Single Sidebar Widget End-->
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                            <h3>即将发售</h3>
                            <div class="sidebar-rc-post">
                                <ul>

                                  @foreach($yu_game as $e=>$f)
                                    <li>
                                        <div class="rc-post-thumb">
                                            <a href="#"><img src="/uploads/{{ $f->game_img }}" alt=""></a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h3><a href="#">{{ $f->name }}</a></h3>
                                            <div class="widget-date">{{ $f->game_time }}</div>
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
                                <a href="#"><img src="/assets/images/banner/banner2.jpg" alt=""></a>
                            </div>
                        </div>
                        <!--Single Sidebar Widget End-->
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget">
                            <h3>热门游戏</h3>
                            <div class="sidebar-instagram">
                                <ul>
                                    @foreach($re_game as $g=>$h)
                                    <li><a href="#"><img src="/upload/{{ $h->game_img }}" alt=""></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--Single Sidebar Widget End-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Games Details Area End-->

@endsection