@extends('Home/show/head')
@section('content')

    <!--Contact Section Start-->
    <div class="contact-section section pt-10 pt-lg-10 pt-md-10 pt-sm-10 pt-xs-20 pb-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @if (count($errors) > 0)
                        <div  style="position:fixed;top:10%;left:45%;" id="alert" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
                        @foreach ($errors->all() as $error)
                            <strong>{{ $error }}</strong><br>
                        @endforeach
                    </div>
                    @endif
                    @if (session('error'))
                        <div  style="position:fixed;top:10%;left:45%;" id="alert" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div style="position:fixed;top:10%;left:45%;" id="alert" class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    <div class="contact-address-wrap">
                        <h2>如有需要人工客服</h2>
                        @if($num)
                            <li>
                              <div style="float:right;background:red;width:15px;height:15px;border-radius:100%;"><span style="color:white;margin-left: 4px;">{{ $num }}</span></div><a href="/home/help/reply" style="font-size:30px;float:right;" class="glyphicon glyphicon-envelope" aria-hidden="true"></a>
                            </li>
                        @else
                            <li>
                              <a href="/home/help/reply" style="font-size:30px;float:right;margin-right:25px;" class="glyphicon glyphicon-envelope" aria-hidden="true"></a><br><br>
                              <label  style="font-size:20px;float:right;">历史反馈</label>
                            </li>
                        @endif
                        <div class="contact-address">
                            <div class="contact-information">
                                <h4>电话号</h4>
                                @if( $common_websites )
                                <h4><a>{{ $common_websites->information }}</a></h4>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="contact-form mt-90 mt-lg-70 mt-md-60 mt-sm-50 mt-xs-20">
                        <h4>反馈的标题</h4>
                        <form action="/home/help/add" method="post" >
                            {{ csrf_field() }}
                                <div class="col-12">
                                    <input type="text" name="name" placeholder="请具体写出是什么出现问题">
                                </div>
                                <h4 style="margin-top: 20px;">回复内容</h4>
                                    <script id="description" name="description" type="text/plain" style="height:200px;margin-bottom:20px;" >
                                    </script>
                                <div class="col-12">
                                    <input type="submit" value="提交">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Contact Section End-->
    <script type="text/javascript">
        var ue = UE.getEditor('description',{
            autoHeightEnabled:false,
            toolbars: [
            ['indent','emotion', 'undo', 'redo', 'bold','italic', 'underline']
            ]
            });
        $('#button').click(function(){
            $("#alert").hide();
        });
    </script>

    @endsection