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
@section('style')
    <style type="text/css">
        .fail {
            font-size: 13px;
            color: red;
            width: 300px;
            height: 30px;
            margin: 0 auto;
            margin-left:-120px;
        }
        .success {
        font-size: 13px;
        color: green;
        width: 300px;
        margin: 0 auto;
        margin-left:-120px;
        }
    </style>
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
                <form action="/admin/game" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="xjhy">
                        <!--基本配置-->
                        <ul class="hypz">

                            <li class="clearfix">
                                <span class="title">游戏名称：</span>
                                <div class="li_r">
                                    <input name="name" type="text" value="{{ old('name') }}">
                                    <i>*</i>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">所属类型：</span>
                                <div class="li_r xial">
                                    <div class="xial_w xial_l">
                                        <select name="cid" style="width:190px;height:27;">
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
                                    <input name="game_jg" type="text" value="{{ old('game_jg') }}">
                                    <i>*</i>
                                </div>
                            </li>
                            
                            <li class="clearfix">
                                <span class="title">游戏销量：</span>
                                <div class="li_r">
                                    <input name="game_xl" type="text" value="{{ old('game_xl') }}">
                                    <i>*</i>
                                </div>
                            </li>

                            <li class="clearfix">
                                <span class="title">游戏库存：</span>
                                <div class="li_r">
                                    <input name="game_kc" type="text" value="{{ old('game_kc') }}">
                                    <i>*</i>
                                </div>
                            </li>

                            <li class="clearfix">
                                <span class="title">发售时间：</span>
                                <div class="li_r">
                                    <input name="game_time" id="shijian" type="text" value="{{ old('game_time') }}">
                                </div>
                                <span id="sj"></span>
                            </li>

                            <li class="clearfix" style="height:100px">
                                <span class="title">游戏图片：</span>
                                <div class="li_r xial">
                                    <div class="xial_w xial_l">
                                        <input type="file" name="game_img" id="" style="height:100px">
                                    </div>
                                </div>
                            </li>
                            
                            <li class="clearfix">
                                <span class="title">发售时间：</span>
                                <div class="li_r">
                                    <input name="download" id="download" type="text" value="{{ old('download') }}">
                                </div>
                                <span id="sj"></span>
                            </li>

                            <li class="clearfix">
                                <span class="title">是否上架：</span>
                                <div class="li_r xial">
                                    <div class="xial_w xial_l">
                                        <select name="game_zt" style="width:190px;height:27;">
                                            <option value="0">上架</option>
                                            <option value="1">下架</option>
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix" style="height:400px;">
                                <span class="title">游戏详情：</span>
                                <div class="li_r">
                                    <!-- 加载编辑器的容器 -->
                                    <script id="abc" name="game_xq" type="text/plain">
                                       {{ old('game_xq') }}
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

    <script type="text/javascript">
        var ue = UE.getEditor('abc', {
            autoHeightEnabled:false,
        });
    </script>

    <script type="text/javascript">
        $('#shijian').blur(function(){
            if(!($(this).val().match(/^[1-9]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/))){
                $('#sj').addClass('fail');
                $('#sj').text('时间格式不正确');
            } else {
                $('#sj').addClass('success');
                $('#sj').text('时间格式正确');
            }
        })

    </script>
@endsection