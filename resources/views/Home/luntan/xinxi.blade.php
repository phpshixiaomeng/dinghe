@extends('Home/show/head')
@section('content')
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