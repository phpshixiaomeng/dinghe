@extends('admin/public/public')
@section('function')
    $(function() {
        //自适应屏幕宽度
        window.onresize = function() { location = location };

        var main_h = $(window).height();
        $('.hy_list').css('height', main_h - 45 + 'px');

        var search_w = $(window).width() - 40;
        $('.search').css('width', search_w + 'px');
        //$('.list_hy').css('width',search_w+'px');
    });
@endsection
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
@if($huitie)
<div>
    <h2>回帖内容:</h2>
    {!! $huitie->content !!}
</div>
@endif($huitie)
@foreach($huifu as $k=>$v)
<div style="border-bottom:1px dashed grey;">
        <ul>
            <li style="text-align: left;margin-right:10px;">{{ $v->uname }}</li>
            <li style="text-align: left;margin-right:10px;">{!! $v->content !!}</li>
            <li style="text-align: right;margin-right:10px;"><a  onclick="del({{ $v->id }},this)">删除</a>
        </ul>
</div>
@endforeach


<script>
function del(id,obj)
{
    var url = '/admin/luntan/deleted/'+id
    $.get(url,function(msg){
        if(msg=='success' ){
            $(obj).parent().parent().parent().remove();
        }
    })
}
</script>
    @endsection