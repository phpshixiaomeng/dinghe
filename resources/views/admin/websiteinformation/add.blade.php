@extends('admin/public/public')
@section('function')
    $(function() {
        //自适应屏幕宽度
        window.onresize = function() { location = location };

        var main_h = $(window).height();
        $('.hy_list').css('height', main_h - 45 + 'px');

        var main_w = $(window).width();
        $('.xjhy').css('width', main_w - 40 + 'px');


    });
@endsection
@section('content')

    <div id="right_ctn">
        <div class="right_m">
            <!--会议列表-->
            <div class="hy_list">
                <div class="box_t">
                    <span class="name">新增网站信息</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="/admin_assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="/admin_assets/images/icon3.png" alt=""/></span>
                        <a href="">新增网站信息</a>
                    </div>
                    <!--当前位置-->
                </div>

                <div class="space_hx">&nbsp;</div>

                <form id="images">
                    {{csrf_field()}}
                    <input  id="img" name="image" style="display: none;" type="file" onchange="upload()">
                </form>
                <!--终端列表-->
                <form action="/admin/link" method="post" enctype="multipart/form-data">
                    <div class="xjhy">
                        <!--基本配置-->
                         @if (count($errors) > 0)
                        <div style="background: pink; text-align:left;font-size:18px;">
                            @foreach ($errors->all() as $error)
                                <p style="margin-left:5px;">{{ $error }}</p>
                            @endforeach
                        </div>
                        @endif
                        {{ csrf_field() }}
                        <ul class="hypz">
                            <li class="clearfix">
                                <span class="title">网站版本号：</span>
                                <div class="li_r">
                                    <input name="lname" value="{{ old('lname') }}" type="text">
                                <div id="url"></div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">网站描述：</span>
                                <div class="li_r">
                                    <input id="link_url" name="url" value="{{ old('url') }}" type="text">
                                </div>
                            </li>
                             <li class="clearfix">
                                <span class="title">网站信息：</span>
                                <div class="li_r">
                                    <input id="link_url" name="url" value="{{ old('url') }}" type="text" placeholder="请填写详细地址(包含http://)"l>
                                </div>
                            </li>
                            <li class="clearfix">
                            <span class="title">网站LOGO：</span>



                            </li>
                            <li class="clearfix">

                            </li>


                            <li class="tj_btn">
                                <input class="btn btn-info" style="margin-left:200px;" type="submit" value="提交">
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

<script type="text/javascript">
    function upload()
    {

         $.ajax({
            url: '/admin/link/upload',
            type: 'POST',
            data: new FormData($('#images')[0]),
            processData: false,
            contentType: false,
            dataType:"json",
            success : function(data) {
                // console.log(data);
                if(data.msg == 'success'){
                    $('#thumb').attr('src','/uploads/'+data.path);
                    $('#img_thumb').val(data.path);
                }
            }
        });
    }















</script>

@endsection