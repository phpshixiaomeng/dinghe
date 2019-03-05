@extends('Home/show/head')
@section('content')
    <!--Forum Post Area Start-->
    <div class="forum-post-area section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45">
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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div style="min-height: 1000px;" class="single-forum forum-post mb-80 mb-lg-60 mb-md-50 mb-sm-50 mb-xs-40">
                    @foreach($data as $key=>$val)
                    <div class="single-forum mb-30">
                        <b>问题标题</b>
                        <h3><a>{{ $val->name }}</a></h3>
                        <b>问题描述</b>
                        <h3><a>{!! $val->description !!}</a></h3>
                        <b>网站回复</b>
                        <h3><a>{!! $val->reply !!}</a></h3>
                        <div style="float:right;" class="forum-meta">
                            <a  href="/home/help/del/{{ $val->id }}"><span class="view">删除</span></a>
                        </div>
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
    <!--Forum Post Area End-->

    @endsection