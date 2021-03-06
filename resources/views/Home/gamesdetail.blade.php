﻿@extends('Home/show/head')
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
                                    @if(!empty($ilike->id))
                                    @if($gameslist->id == $ilike->id)
                                    <a href="{{ $gameslist->download }}"><span style="color:grey;">已拥有此游戏,</span>点击下载</a>
                                    @endif
                                    @else
                                    <a href="/home/zhifu/{{ $gameslist->id }}">点击购买此游戏</a>
                                    @endif
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
                                       <h2 id="pingjun">{{$pingjun}}</h2>
                                       <span></span>
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
                                               <span id="star5">{{$star5}}</span>
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
                                               <span id="star4">{{$star4}}</span>
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
                                               <span id="star3">{{$star3}}</span>
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
                                               <span id="star2">{{$star2}}</span>
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
                                               <span id="star1">{{$star1}}</span>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
<!-- 评分 -->
<div id="success" class="alert alert-success alert-dismissible" hidden>
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>评级成功!</strong>
  </div>

  <div id="fail"    class="alert alert-success alert-dismissible" hidden>
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><font color="red">评级失败!已评级无法重复评级</font></strong>
</div>

                                  @if(empty($numstar))
                                      <h2>文章评级:</h2>
                                      <div id="root">
                                      <div><div class="myapp-score">
                                      <h2>
                                      <div id="demo9">
                                      </div>
                                      </h2>
                                      <div class="myapp-tip">
                                      <h2><span id="tip9" class="lq-score-tip"></span></h2>
                                      </div>
                                      </div>
                                      </div>
                                      </div>

                                  @else
                                      <h3>已评级:</h3>
                                  @if($numstar->store==5)
                                      <h3>⭐⭐⭐⭐⭐{{$numstar->store}}分</h3>
                                  @elseif($numstar->store==4)
                                      <h3>⭐⭐⭐⭐{{$numstar->store}}分</h3>
                                  @elseif($numstar->store==3)
                                      <h3>⭐⭐⭐{{$numstar->store}}分</h3>
                                  @elseif($numstar->store==2)
                                      <h3>⭐⭐{{$numstar->store}}分</h3>
                                  @elseif($numstar->store==1)
                                      <h3>⭐{{$numstar->store}}分</h3>
                                  @endif
                                  @endif









<!-- 评分 -->



                  <form action="/home/gamexq/{{ $gameslist->id }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                      <div style="width:550px;height:300px">
                        <script id="abc" style="width:550px;height:150px" name="greply_reply" type="text/plain">

                        </script>
                        <input id="btn" type="submit" value="评论" class="btn btn-primary btn-sm" style="margin-top: 10px;float:right;">
                      </div>
                   </form>

                   <div class="row">




                       <div class="col-12">
                           <div class="review-wrap">
                              <h3>评论（{{ $pl }}）</h3>
                              <!--Single Review Start-->
                              @if(!empty($reply))
                              @foreach($reply as $g=>$h)
                              <div class="single-review mb-30">


                                  <h4><a href="">{{ $h->nickname->nickname }}</a></h4>
                                  <div class="ratting">
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star-half-o"></i>
                                  </div>
                                  <p>{!! $h->greply_reply !!}</p>
                                  <div class="review-name-action">
                                      <span style="font-size: 12px;">{{ date('Y-m-d',$h->greply_time) }}</span>
                                      <ul>
                                          <li><a onclick="zan({{ $h->id }})"><i class="fa fa-thumbs-o-up"></i>{{ $h->zan }}</a></li>
                                          <li><a onclick="cai({{ $h->id }})"><i class="fa fa-thumbs-o-down"></i>{{ $h->cai }}</a></li>
                                      </ul>
                                  </div>
                              </div>
                              @endforeach
                              @endif
                              <!--Single Review End-->

                              <!--Single Review End-->
                              <div class="blog-pagination text-center">
                                <ul class="page-pagination">
                                    {{ $replys->links() }}
                                </ul>
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
<script src="/assets/js/lq-score.min.js"></script>
    <!--Games Details Area End-->
<script type="text/javascript">
  var ue = UE.getEditor('abc', {
      autoHeightEnabled:false,
      toolbars:[['FullScreen', 'Source', 'Undo', 'Redo','bold','test','emotion']],
  });
</script>
<script type="text/javascript">
  $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
  function zan(id){
    var url = '/home/gamexq/zan/'+id;
    $.get(url,function(res){
      console.log(res);
        if(res == 2){
            alert('请勿重复发表意见');
        }else if(res == 3){
            alert('请先登录');
            window.location.href="/home/login";
        }
    });
  }

  function cai(id){
    var url = '/home/gamexq/cai/'+id;
    $.get(url,function(res){
      console.log(res);
        if(res == 2){
            alert('请勿重复发表意见');
        }else if(res == 3){
            alert('请先登录');
            window.location.href="/home/login";
        }
    });
  }




                      $(function () {


                        $("#demo9").lqScore({
                        $tipEle: $("#tip9"),
                        defultColor:'yellow',
                        callBack:function(score){
                          $.ajaxSetup({
                            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
                            });
                          var id={{$gameid}};
                          url='/home/gamexq/star/'+id+'/'+score;
                          var star1=$('#star1').text();
                          var star2=$('#star2').text();
                          var star3=$('#star3').text();
                          var star4=$('#star4').text();
                          var star5=$('#star5').text();
                          var zongfen={{$zongfen}};
                          var people={{$people}};
                          $.get(url,function(res){
                          // alert(res);
                              if(res<6){
                          var star=$('#star'+res).text();
                              $('#success').attr('hidden',false);
                              var zz=$('#star'+res).text(star*1+1*1);

                              // alert(zongfen);
                              $('#pingjun').text(Math.round(((zongfen*1+res*1)*1/(people*1+1*1)*1)*Math.pow(10,1))/Math.pow(10,1));
                              // Math.round(((zongfen*1+res*1)*1/(people*1+1*1)*1)*Math.pow(10,1))/Math.pow(10,1)

                              }else if(){
                              alert("即将跳转登录页");window.location.href="/home/login";
                            }else{
                                $('#fail').attr('hidden',false);
                              }

                          })
                        return false;
                        },
                        fontSize:'30px',
                        tips: "default", //默认提示
                        });
                        });












</script>


@endsection