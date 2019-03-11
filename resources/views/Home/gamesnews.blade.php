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
                                            <li>{{$tata->auth}}</li>
                                            <li>{{$tata->created_at}}</li>
                                            <li>{{$tata->gname}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <h3>{{$title}}</h3>
                                    <p><strong>咨询主要内容:</strong></p>
                                    <p>{{$data->content}}</p>
                                    <blockquote class="blockquote mt-30 mb-30">
                                    <p><strong>游戏简要概括:</strong></p>
                                        <p>{{$data->gstart}}</p>
                                    </blockquote>

                                    <div class="blog-tags">
                                        <h6>标签:</h6>
                                        {{$gname}}|
                                        {{$data->price}}元|
                                        {{$data->gpt}}
                                    <h3 num='5'>⭐⭐⭐⭐⭐()人</h3>
                                    <h3 num='4'>⭐⭐⭐⭐()人</h3>
                                    <h3 num='3'>⭐⭐⭐()人</h3>
                                    <h3 num='2'>⭐⭐()人</h3>
                                    <h3 num='1'>⭐()人</h3>
                                      <h2>文章打分:</h2>
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
                                            <i class="fa fa-thumbs-o-up"></i><a  dataid="{{$v->id}}" href="javascript:;" onclick="zan({{$v->id}})">{{$v->pzan}}</a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <i class="fa fa-thumbs-o-down"></i><a  dtaid="{{$v->id}}" href="javascript:;" onclick="cai({{$v->id}})">{{$v->pcai}}</a>

                                        </div>
                                    </div>

                                </li>
                              @endforeach
                            </ul>


                            <h3> {{ $pls->links() }}</h3>

                            <form action="#" id="form" class="comment-form">
                            <h4>留下评论:</h4>
                                <input type="" name="gid" value="{{$data->gid}}" placeholder="" hidden>
                                 <textarea style="border:0;border-radius:5px;background-color:RGB(214,213,183);padding: 10px;resize: none;"  class="form-control" name="pcontent" rows="3"></textarea>
                                <input type="submit" class="btn btn-info" value="评论" placeholder="">
                            </form>




                            <script src="/assets/js/lq-score.min.js"></script>
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
                              $id=zid;
                                url='/home/gamesnews/zan/'+zid;
                                $.ajaxSetup({
                          headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
                          });

                                  $.get(url,function(res){
                                  $('[dataid='+$id+']').html(res);

                                  })



                            }

                            function cai(cid){
                              $id=cid;
                              $.ajaxSetup({
                          headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
                          });
                                url='/home/gamesnews/cai/'+cid;



                                  $.get(url,function(res){
                                   $('[dtaid='+$id+']').html(res);
                                  })






                            }



                            /*
            属性参数介绍：
            $tipEle--------提示元素，请传入jquery对象
            fontSize-------大小，字符串类型
            isReScore------是否允许重新评分
            tips-----------提示，可以是default默认消息，可以传模板字符串，也可以传长度为5的数组
            zeroTip--------无分数提示，字符串类型
            score----------分数，小数、整数都可以
            callBack-------评分回调，会返回分数和插件元素李，例：function(score,ele){}
            content--------内容
            defultColor----默认颜色(未选中的颜色)
            selectColor----选中后的颜色，可以传单个字符串，也可以传长度为5的数组
        */
                          $(function () {

                            //demo9
                      $("#demo9").lqScore({
                      $tipEle: $("#tip9"),
                      defultColor:'yellow',
                      callBack:function(score){

                      },
                      fontSize:'40px',
                      tips: "default", //默认提示
                       });

                      });








                            </script>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area mt-sm-60 mt-xs-50">
                        <!--Single Sidebar Widget Start-->
                        <!--Single Sidebar Widget End-->
                        <!--Single Sidebar Widget Start-->
                        <div class="single-sidebar-widget mb-45">
                            <h3>追随我们</h3>
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
                            <h3>流行/推荐</h3>
                          @foreach($tuijian as $v)
                            <div class="popular-game mb-20">
                                <div class="game-img">
                                    <a href="#"><img src="/uploads/{{ $v->game_img }}" alt=""></a>
                                </div>
                                <div class="game-content">
                                    <h3><a href="#">{{$v->name}}</a></h3>
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
                                            <a href="#"><img src="/uploads/{{ $v->game_img }}" alt=""></a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h3><a href="#">{{$v->name}}</a></h3>
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






</div>
@endsection