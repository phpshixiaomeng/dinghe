@extends('Home/show/head')
@section('content')
<script type="text/javascript">
    layui.use(['layer', 'form'], function(){
      var layer = layui.layer
      ,form = layui.form;

    });
</script>
<div id="main-wrapper">
    <!--Page Banner Area Start-->
    <div class="page-banner-area" style="background-image: url(/assets/images/bg/page-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-content text-center">
                        <h1>KINGS OF THE <br> WARRIORS</h1>
                        <a class="df-btn" href="#">Buy now</a>
                        <ul class="page-breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li>Single Blog Left Sidebar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Area End-->
    <!--Blog Area Start-->
    <div class="blog-details-area section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-xs-50">
        <div class="container">
            <div class="row row-25">
                <div class="col-lg-8 order-lg-2 order-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="blog-details">
                                {{-- 订单列表页 --}}
                                	<div class="table-responsive">
									  <table class="table">
											<tr class="text-center">
											  <th class="active">编号</th>
											  <th class="success">订单号</th>
											  <th class="warning">订单金额</th>
											  <th class="danger">订单状态</th>
											  <th class="info">查看详情/下载</th>
											</tr>
                                            @foreach($order as $k=>$v)                
											<tr class="text-center">
											  <td class="active">{{ $v->id }}</td>
											  <td class="success">{{ $v->order_num }}</td>
											  <td class="warning">{{ $v->order_amount }}</td>
                                              @if($v->order_status == 0)
											  <td class="danger" style="color:grey">交易成功</td>
                                              @endif
											  <td class="info"><button onclick="lbw({{ $v->id }})" class="btn btn-primary btn-sm" style="font-size: 10px;">详情/下载</button></td>
											</tr>
                                            @endforeach
									  </table>
									</div>
                                {{-- 订单列表页结束 --}}
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-4 order-lg-1 order-2">
                    <div class="sidebar-area mt-sm-60 mt-xs-50">
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                            <h3>featured games</h3>
                            <div class="single-featured-game mb-20">
                                <div class="game-img">
                                    <a href="#"><img src="/assets/images/banner/sidebar-banner1.jpg" alt=""></a>
                                    <a class="game-title" href="#">the killer</a>
                                </div>
                            </div>
                            <div class="single-featured-game mb-20">
                                <div class="game-img">
                                    <a href="#"><img src="/assets/images/banner/sidebar-banner2.jpg" alt=""></a>
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
                                    <a href="#"><img src="/assets/images/banner/sidebar-banner3.jpg" alt=""></a>
                                </div>
                                <div class="game-content">
                                    <h3><a href="#">Splinter cell</a></h3>
                                    <span>pc/xbox/ps4</span>
                                </div>
                            </div>
                            <div class="popular-game mb-20">
                                <div class="game-img">
                                    <a href="#"><img src="/assets/images/banner/sidebar-banner4.jpg" alt=""></a>
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
                            <h3>recent post</h3>
                            <div class="sidebar-rc-post">
                                <ul>
                                    <li>
                                        <div class="rc-post-thumb">
                                            <a href="#"><img src="/assets/images/rc-img/rc-img1.jpg" alt=""></a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h3><a href="#">latest update of the new version</a></h3>
                                            <div class="widget-date">05 November, 2018</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rc-post-thumb">
                                            <a href="#"><img src="/assets/images/rc-img/rc-img2.jpg" alt=""></a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h3><a href="#">Crew in the earth get new season</a></h3>
                                            <div class="widget-date">08 November, 2018</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rc-post-thumb">
                                            <a href="#"><img src="/assets/images/rc-img/rc-img3.jpg" alt=""></a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h3><a href="#">secrect code for the Mortal Kombat 4</a></h3>
                                            <div class="widget-date">05 November, 2018</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rc-post-thumb">
                                            <a href="#"><img src="/assets/images/rc-img/rc-img4.jpg" alt=""></a>
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
                                <a href="#"><img src="/assets/images/banner/banner2.jpg" alt=""></a>
                            </div>
                        </div>
                        <!--Single Sidebar Widget End-->
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget">
                            <h3>follow us</h3>
                            <div class="sidebar-instagram">
                                <ul>
                                    <li><a href="#"><img src="/assets/images/instagram/instagram1.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="/assets/images/instagram/instagram2.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="/assets/images/instagram/instagram3.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="/assets/images/instagram/instagram4.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="/assets/images/instagram/instagram5.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="/assets/images/instagram/instagram6.jpg" alt=""></a></li>
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
    <!--Projects section start-->
    <div class="newslatter-section newslatter-section-tow section pt-5 pt-lg-0 pt-sm-0 pt-xs-0 pb-xs-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                 
                </div>
            </div>
        </div>
    </div>
    <!--Projects section end-->
</div>


</body>

<script type="text/javascript">
function lbw(id){
  layer.open({
  type: 2,
  title: 'layer mobile页',
  shadeClose: true,
  shade: 0.8,
  area: ['800px', '90%'],
  content: '/home/order/display/'+id //iframe的url
}); 
}

</script>

@endsection