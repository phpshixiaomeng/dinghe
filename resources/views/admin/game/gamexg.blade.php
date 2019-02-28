@extends('admin/public/public')
@section('function')
    $(function() {
        //自适应屏幕宽度
        window.onresize = function() { location = location };

        var main_h = $(window).height();
        $('.hy_list').css('height', main_h - 45 + 'px');

        var main_w = $(window).width();
        $('.xjhy').css('width', main_w - 40 + 'px');


        $('.xial_m span').click(function() {
            $(this).parent('.xial_m').siblings('.xl_ctn').toggle();
        });
    });
@endsection
@section('content')
    <div id="right_ctn">
        <div class="right_m">
            <!--会议列表-->
            <div class="hy_list">
                <div class="box_t">
                    <span class="name">添加游戏</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="Assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">添加游戏</a>
                        <span><img src="Assets/images/icon3.png" alt=""/></span>
                        <a href="">游戏列表</a>
                    </div>
                    <!--当前位置-->
                </div>
                <div class="space_hx">&nbsp;</div>
                <!--终端列表-->
                <form action="/admin/game/{{ $games->id }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field("PUT") }} 
                    <div class="xjhy">
                        <!--基本配置-->
                        <ul class="hypz">
                            <li class="clearfix">
                                <span class="title">游戏名称：</span>
                                <div class="li_r">
                                    <input name="name" type="text" value="{{ $games->name }}">
                                    <i>*</i>
                                </div>
                            </li>
                            
                            <li class="clearfix">
                                <span class="title">所属类型：</span>
                                <div class="li_r xial">
                                    <div class="xial_w xial_l">
                                        <select name="game_zt" style="width:190px;height:27;">
                                            @foreach($cates_data as $k=>$v)
                                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </li>

                             <li class="clearfix">
                                <span class="title">游戏价格：</span>
                                <div class="li_r">
                                    <input name="game_jg" type="text" value="{{ $games->game_jg }}">
                                    <i>*</i>
                                </div>
                            </li>

                            <li class="clearfix">
                                <span class="title">游戏销量：</span>
                                <div class="li_r">
                                    <input name="game_xl" type="text" value="{{ $games->game_xl }}">
                                    <i>*</i>
                                </div>
                            </li>

                            <li class="clearfix">
                                <span class="title">游戏库存：</span>
                                <div class="li_r">
                                    <input name="game_kc" type="text" value="{{ $games->game_kc }}">
                                    <i>*</i>
                                </div>
                            </li>

                            <li class="clearfix" style="height:90px">
                                <span class="title">游戏图片：</span>
                                <div class="li_r xial">
                                    <div class="xial_w xial_l" style="height:100">
                                        <input type="file" name="game_img" id="" >
                                        <img src="/uploads/{{ $games->game_img }}" style="width:50px;height:50px;margin-left:60px;margin-top:10px;">
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <span class="title">是否上架：</span>
                                <div class="li_r xial">
                                    <div class="xial_w xial_l">
                                        <select name="game_zt" style="width:190px;height:27;">
                                            @if($games->game_zt == '上架')
                                            <option value="0" selected>上架</option>
                                            <option value="1">下架</option>
                                            @else
                                            <option value="0">上架</option>
                                            <option value="1" selected>下架</option>
                                            @endif 
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix" style="height:400px;">
                                <span class="title">游戏详情：</span>
                                <div class="li_r">
                                    <!-- 加载编辑器的容器 -->
                                    <script id="abc" name="game_xq" type="text/plain">
                                       {{ $games->game_xq }}
                                    </script>
                                    <!-- <textarea name="game_xq" style="width:190px;height:200px;"></textarea> -->
                                </div>
                            </li>
                            <li class="tj_btn">
                                <a href="" class="back">返回</a>
                                <input type="submit" value="保存" style="width:119px;height:30px;margin-top: 19px;background-color: #3D89CB;color:white">
                            </li>

                        </ul>
                        <!--基本配置-->
                    </div>
                </form>
                <!--终端列表-->
            </div>
            <!--会议列表-->
        </div>
    </div>
    <!-- 配置文件 -->

    <script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->

    <script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->

    <script type="text/javascript">
        var ue = UE.getEditor('abc', {
            autoHeightEnabled:false,
        });
    </script>
@endsection