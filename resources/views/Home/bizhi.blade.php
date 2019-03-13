@extends('Home/show/head')
@section('content')

    <!--Gallery Area Start-->
    <div class="gallery-area section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
        <div class="container">
            <div class="row">

                @foreach($wall as $k=>$v)
                <div class="col-lg-4 col-md-6">
                    <!--Single Gallery Start-->
                    <div class="single-gallery mb-30">
                        <div class="gallery-image">
                            <a class="gallery-popup" href="assets/images/game/game1.jpg"><img src="/uploads/{{ $v->game_img }}" alt=""></a>
                            <div class="gallery-hover">
                                <h4>{{ $v->gname }}</h4>
                            </div>
                        </div>
                    </div>
                    <!--Single Gallery End-->
                </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="blog-pagination text-center">
                        <ul class="page-pagination">
                            <li><!-- <a href="#"><i class="icofont-long-arrow-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#"><i class="icofont-long-arrow-right"></i></a> -->
                            {{ $wall->links() }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Gallery Area End-->

   @endsection