@extends('Home/show/head')
@section('content')

    <!--Games Area Start-->
    <div class="games-area section pt-85 pt-lg-65 pt-md-55 pt-sm-55 pt-xs-45">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--Game Toolbar Start-->
                <div class="game-topbar-wrapper d-md-flex justify-content-md-between align-items-center">
                    <form action="/home/games" method="get">
                        <div class="game-search-box">
                            <h3>游戏 搜索</h3>
                            <input type="text" name="search" value="{{ $request['search'] or '' }}" placeholder="请输入游戏">
                            <button type="submit"><i class="icofont-search-2"></i></button>
                        </div>
                    </form>
                     <!--Toolbar Short Area Start-->
                     <div class="toolbar-short-area d-md-flex align-items-center">
                         <div class="toolbar-shorter">
                            <h3>类别</h3>
                             <select class="wide">
                                 <option value="0">全类型</option>
                                 @foreach($cates_type as $key=>$value)
                                 @if(!empty($id) && $id == $value->id)
                                 <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                                 @else
                                 <option value="{{ $value->id }}">{{ $value->name }}</option>
                                 @endif
                                 @endforeach
                             </select>
                         </div>
                         <div class="toolbar-shorter">
                            <h3>平台</h3>
                             <select class="wide">
                                 <option value="0">全平台</option>
                                 @foreach($cates_flat as $ke=>$val)
                                 <option value="{{ $val->id }}">{{ $val->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <!--Toolbar Short Area End-->
                </div>
                <!--Game Toolbar End-->
            </div>
        </div>
        <div class="row">

            @if(isset($cgame)){

                @foreach($cgame as $a=>$b)
                    <div class="col-lg-4 col-md-6" style="float:left;">
                        <!--Single Game Start-->
                        <div class="single-game mb-50">
                            <div class="game-img">
                                <a href="#"><img src="/uploads/" alt=""></a>
                            </div>
                            <div class="game-content">
                                <h4><a href="games-details.html">{{ $b->name }}</a></h4>
                                <span>￥{{ $b->game_jg }}</span>
                            </div>
                        </div>
                        <!--Single Game End-->
                    </div>
                @endforeach

            @else
                
                @foreach($games as $k=>$v)
                    <div class="col-lg-4 col-md-6" style="float:left;">
                        <!--Single Game Start-->
                        <div class="single-game mb-50">
                            <div class="game-img">
                                <a href="/home/gamexq/{{ $v->id }}"><img src="#" alt=""></a>
                            </div>
                            <div class="game-content">
                                <h4><a href="games-details.html">{{ $v->name }}</a></h4>
                                <span>￥{{ $v->game_jg }}</span>
                            </div>
                        </div>
                        <!--Single Game End-->
                    </div>
                    @endforeach

            @endif
               
        </div>
        <div class="row">
            <div class="col-12">
                <div class="blog-pagination text-center">
                    <ul class="page-pagination" style="margin-left:500px;">
                        <!-- <li><a href="#"><i class="icofont-long-arrow-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#"><i class="icofont-long-arrow-right"></i></a></li> -->
                        {{ $games->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--Games Area End-->

    @endsection