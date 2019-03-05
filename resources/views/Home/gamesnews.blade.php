@extends('Home/show/head')
@section('content')



    <!--Blog Area Start-->
    <div class="blog-details-area section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-xs-50">
        <div class="container">
            <div class="row row-25">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="blog-details">
                                <div class="blog-img">
                                    <a href="single-blog.html"><img src="/uploads/{{$image}}" alt=""></a>
                                    <div class="meta-box">
                                        <ul class="meta meta-border-bottom">
                                            <li><a href="#">Smith</a></li>
                                            <li>15 Devember, 2018 </li>
                                            <li><a href="#">25 Comments</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <h3>latest version of angry birds released in 2019</h3>
                                    <p><strong>Need for Sped</strong> rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally tances occur in which toil and pain can procure him some great pleasure pleasure rationally encounter sequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain itsuse it is pain, but because occasionally circumstances occur in which toil and pain can procure </p>
                                    <p>Rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally tances occur in which toil and pain can procure him some great pleasure pleasure rationally encounte</p>
                                    <blockquote class="blockquote mt-30 mb-30">
                                        <p>Rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because  nally tances occur in which toil and pain can procure </p>
                                    </blockquote>
                                    <p>Rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or ues or desires to obtain pain of itself, because it is pain, but because occasionally tances occur in which toil and pain can procure him some great pleasure pleasure rationally encounte</p>
                                    <div class="blog-tags">
                                        <h5>Tags:</h5>
                                        <a href="#">Games</a>
                                        <a href="#">Playstation</a>
                                        <a href="#">Xbox</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="blog-comment-wrap col">
                            <h4>评论区({{$count}})</h4>
                            <ul class="comment-list">
                            @foreach($pls as $v)
                                <li>
                                    <div class="single-comment">
                                        <div class="image"><img src="/uploads/public/{{$v->touxiang}}" alt=""></div>
                                        <div class="content">
                                            <h5>{{$v->pname}}</h5>
                                            <div class="review-date">
                                                <span>{{$v->ptime}}</span>

                                            </div>
                                            <p>{{$v->pcontent}}</p>
                                            <a href="javascript:;" onclick="zan({{$v->id}})"><i class="fa fa-thumbs-o-up"></i><font id="zan">{{$v->pzan}}</font></a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <a href="javascript:;" onclick="cai({{$v->id}})"><i class="fa fa-thumbs-o-down"></i><font id="cai">{{$v->pcai}}</font></a>

                                        </div>
                                    </div>

                                </li>
                              @endforeach
                            </ul>
                            <h3> {{ $pls->links() }}</h3>
                            <h4>留下评论:</h4>
                            <form action="#" id="form" class="comment-form">
                                <input type="" name="gid" value="{{$data->gid}}" placeholder="" hidden>
                                 <textarea style="border:0;border-radius:5px;background-color:RGB(214,213,183);padding: 10px;resize: none;"  class="form-control" name="pcontent" rows="3"></textarea>
                                <input type="submit" class="btn btn-info" value="评论" placeholder="">
                            </form>
                            <script type="text/javascript">
                            $("#form").submit(function(){
                          var Data = new FormData($('#form')[0]);
                          $.ajaxSetup({
                          headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
                          });



                                  $.ajax({
                                  type:'post',
                                  url: "/home/gamesnews",
                                  data: Data,
                                  dataType: 'html',
                                  processData: false,
                                  contentType: false,
                                  success: function(res) {
                                    // alert(res);

                                              if(res==1){
                                                alert('评论成功');
                                                window.location.reload();

                                              }else{
                                                alert('评论失败');
                                              }
                                      }

                                  });

                              return false;

                              });

                            //赞
                            function zan(zid){
                                url='/home/gamesnews/zan/'+zid;
                                $.ajaxSetup({
                          headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
                          });

                                  $.get(url,function(res){
                                  $(this).text(res);
                                  })



                            }

                            function cai(cid){
                              $.ajaxSetup({
                          headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
                          });
                                url='/home/gamesnews/cai/'+cid;



                                  $.get(url,function(res){
                                  $(this).text(res);
                                  })






                            }

















                            </script>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area mt-sm-60 mt-xs-50">
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
                            <h3>recent post</h3>
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






</div>
@endsection