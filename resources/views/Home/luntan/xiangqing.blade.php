@extends('Home/show/head')
@section('content')
@section('style')
<style type="text/css">
.pinglun{
    display:none;
}
.huifu{
    display:none;
}
.reply{
    display:none;
}
</style>
@endsection
@if (count($errors) > 0)
    <div  style="position:fixed;top:10%;left:40%;width:20%;" id="alert" class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
    @foreach ($errors->all() as $error)
        <strong style="font-size:20px;">{{ $error }}</strong><br>
    @endforeach
</div>
@endif
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

@if($tiezi)
<div class="forum-post-area section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--Single Forum Start-->

                <div class="single-forum forum-post mb-80 mb-lg-60 mb-md-50 mb-sm-50 mb-xs-40">
                    <h3>{{ $tiezi->title }}</h3>
                    <div class="forum-meta">
                        <ul>
                            <li>{{ $tiezi->uname }}</li>
                            <li>发布时间{{ $tiezi->created_at }}</li>
                            @if($tiezi->uname == session('name'))
                            <li><a  onclick="return confirm('确定要删除吗?')"  href="/home/luntan/delete/{{ $tiezi->id }}">删除</a></li>
                            @endif
                            <li>浏览量{{ $tiezi->visit }}</li>
                            <li onclick="zan({{ $tiezi->id }},this)"><i class="fa fa-thumbs-o-up"></i><span>{{$zan}}</span></li>
                            <li onclick="cai({{ $tiezi->id }},this)"><i class="fa fa-thumbs-o-down"></i><span>{{$cai}}</span></li>
                        </ul>
                    </div>
                    <div class="forum-des">
                       {!! $tiezi->content !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="forum-reply-wrap col-12">
                <h3>回复（{{ $num }}）</h3>
                <!--Single Reply Start-->
                @foreach($data as $k =>$v)
                <div class="col-12">
                <div class="single-forum mb-30">
                    <div class="forum-meta">
                        <ul>
                            <li>{{ $v['uname'] }} </li>
                            <li>{{ $v['created_at'] }}</li>
                            @if($tiezi->uname == session('name') || $v['uname'] == session('name') )
                            <li><a  onclick="return confirm('确定要删除吗?')"  href="/home/luntan/del/{{ $v->id }}">删除</a></li>
                            @endif
                        </ul>
                    </div>
                    <h3>回复内容:{!!  $v['content']  !!}</h3>
                    <p onclick="dianji(this)" class="btn-primary btn">收起回复</p>
                <div style="background: #F7F8FA;">
                @foreach($v['son'] as $kk=>$vv)
                <div style="border-bottom:1px dashed grey;">
                <div style="height:20px;">
                    <ul>
                        <li style="float:left;margin-right:10px;">{{$vv['uname']}}</li>
                        <li style="float:left;margin-right:10px;">{{ $vv['created_at'] }}</li>
                        <li onclick="rep(this)" style="float:right;margin-right:10px;">回复</li>
                        @if($tiezi->uname == session('name') || $vv['uname'] == session('name') || $v['uname'] == session('name') )
                            <li><a  onclick="del({{ $vv['id'] }},this)">删除</a></li>
                        @endif
                    </ul>
                </div>
                <p>{!!  $vv['content']  !!}</p>
                </div>
                @endforeach
                <p class="btn-primary btn" onclick="shuo(this)">我也说一句</p>
                </div>
                <div class="pinglun">
                    <form action="/home/luntan/huifu" method="post" >
                        {{ csrf_field() }}
                        <input type="hidden" name="reply_name" value="{{ $v['uname'] }}">
                        <input type="hidden" name="fatie_id" value="{{ $tiezi->id }}">
                        <input type="hidden" name="father_id" value="{{ $v['id'] }}">
                        <textarea class="tiezi" name="content" style="width: 100%;"></textarea>
                        <input class="btn-primary btn" type="submit"  value="提交">
                    </form>
                </div>
                </div>
                </div>
                @endforeach
                <div>
                   {{ $data->appends($request)->links() }}
                </div>
                <div class="forum-reply-wrap col-12">
                <form action="/home/luntan/huitie" method="post" style="margin-bottom: 100px;">
                    {{ csrf_field() }}
                    <input type="hidden" name="reply_name" value="{{ $tiezi->uname }}">
                    <input type="hidden" name="fatie_id" value="{{ $tiezi->id }}">
                    <script id="content" name="content" type="text/plain" style="height:200px;width:500px;" >
                    </script>
                    <input class="btn-primary btn" type="submit" name="" value="提交">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div>
    <h1>帖子丢了啊!!!!!!</h1>
</div>
@endif
<script>
var ue = UE.getEditor('content',{
    autoHeightEnabled:false,
    toolbars: [
    ['indent','emotion', 'undo', 'redo', 'bold','italic', 'underline']
    ]
});
setTimeout(function(){
  $("#alert").hide();
},2500);
$('#button').click(function(){
  $("#alert").hide();
});
function dianji(obj)
{
    if($(obj).next().hasClass("huifu")){
        $(obj).next().removeClass("huifu");
        $(obj).text('收起回复');
    }else{
        $(obj).next().addClass("huifu");
        $(obj).text('查看回复');
    }
}
function shuo(obj)
{
    if($(obj).parent().next().hasClass("pinglun")){
        $(obj).parent().next().removeClass("pinglun");
        $(obj).text('不说了');
    }else{
        $(obj).parent().next().addClass("pinglun");
        $(obj).parent().next().children().children().eq(4).val('');
        $(obj).text('我也说一句');
    }
}
function rep(obj)
{
   var uname = $(obj).prev().prev().text();
   $(obj).parent().parent().parent().parent().next().children().children().eq(4).val('回复@'+uname+':');
   $(obj).parent().parent().parent().parent().next().removeClass("pinglun");
   $(obj).parent().parent().parent().parent().children(':last').text('不说了');
}
function zan(id,obj){
    var url = '/home/luntan/zan/'+id;
    $.get(url,function(data){
        if(data.msg == 'success'){
            $(obj).children(':last').text(data.num);
        }else {
            alert(data.msg);
        }
    },'json');
}

function cai(id,obj){
    var url = '/home/luntan/cai/'+id;
    $.get(url,function(data){
        if(data.msg == 'success'){
            $(obj).children(':last').text(data.num);
        }else {
            alert(data.msg);
        }
    },'json');
}
function del(id,obj)
{
    var url = '/home/luntan/deleted/'+id
    $.get(url,function(msg){
        if(msg=='success' ){
            $(obj).parent().parent().parent().parent().remove();
        }
    })
}
</script>
    @endsection