@extends('Home/show/head')
@section('content')
@if (session('error'))
    <div  style="position:fixed;top:10%;left:40%;width:20%;" id="alert" class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
        <strong style="font-size:20px;">{{ session('error') }}</strong>
    </div>
@endif
@if (session('success'))
    <div style="position:fixed;top:10%;left:40%;width:20%;" id="alert" class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
        <strong style="font-size:20px;">{{ session('success') }}</strong>
    </div>
@endif
    <!--Forum Post Area Start-->
    <div class="forum-post-area section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div style="min-height: 1000px;" class="single-forum forum-post mb-80 mb-lg-60 mb-md-50 mb-sm-50 mb-xs-40">
                    @foreach($data as $key=>$val)
                    <div class="single-forum mb-30">
                        <b>回帖人</b>
                        <h4>{{ $val->uname }}&nbsp;&nbsp;{{ $val->updated_at }}</h4>
                        <b>回帖内容</b>
                        <h4>{!! $val->content !!}</h4>
                        <h3 style="text-align: right;"><a style="color:red;" href="/home/luntan/{{ $val->fatie_id }}">去查看</a></h3>
                    </div>
                    @endforeach
                    @if(!$num)
                        <h1>没有历史回复信息</h1>
                    @endif
                    {{ $data->appends($request)->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection