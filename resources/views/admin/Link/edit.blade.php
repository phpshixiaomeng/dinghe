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
                    <span class="name">修改友情链接</span>
                    <!--当前位置-->
                    <div class="position">
                        <a href=""><img src="/admin_assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="/admin_assets/images/icon3.png" alt=""/></span>
                        <a href="">修改友情链接</a>
                    </div>
                    <!--当前位置-->
                </div>
                <form id="images">
                    {{csrf_field()}}
                    <input  id="img" name="image" style="display: none;" type="file" onchange="upload()">

                </form>
                <div class="space_hx">&nbsp;</div>
                <!--终端列表-->

                <form action="/admin/link/{{ $data->id }}" method="post" enctype="multipart/form-data">

                    <div class="xjhy">
                        @if (count($errors) > 0)
                            <div id="alert" class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
                                @foreach ($errors->all() as $error)
                                    <strong>{{ $error }}</strong><br>
                                @endforeach
                            </div>
                        @endif
                        @if (session('error'))
                            <div id="alert" class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
                                {{ session('error') }}
                            </div>
                        @endif
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <ul class="hypz">
                            <li class="clearfix">
                                <span class="title">友情链接名字：</span>
                                <div class="li_r">
                                    <input name="lname" value="{{ $data->lname }}" type="text">
                                <div id="url"></div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <span class="title">友情链接地址：</span>
                                <div class="li_r">
                                    <input name="url" value="{{ $data->url }}" type="text">
                                </div>
                            </li>
                            <input id="img_thumb" type="hidden" name="image" value="{{ $data->image }}">
                            <li class="clearfix">
                                <span class="title">是否显示：</span>
                                <div class="li_r">
                                    <select name="status">
                                        <option value="0">选我显示</option>
                                        <option value="1">选我不显示</option>
                                    </select>
                                </div>
                            </li>
                            <label style="margin-left:150px;margin-top:20px;" for="img" ><img id="thumb" style="width:100px;height:100px;" src="/uploads/{{ $data->image }}" alt=""></label>
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
                if(data.msg == 'success'){
                    $('#thumb').attr('src','/uploads/cache/'+data.path);
                    $('#img_thumb').val(data.path);
                }else if(data.msg == 'error'){
                    alert('图片格式有误,请勿上传同一个文件');
                }else{
                    alert('图片大小有误,请勿上传同一个文件');
                }
            }
        });
    }
    $('#button').click(function(){
        $("#alert").hide();
    });
</script>
@endsection