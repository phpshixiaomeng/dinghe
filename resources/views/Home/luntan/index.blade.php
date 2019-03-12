@extends('Home/show/head')
@section('content')
@section('style')

<style type="text/css">
.beijing{
    background:red;
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
<div class="forum-area section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
    <div class="container" style="margin-bottom:20px;">
        <div style="float:right;width:20px;height:20px;border-radius:100%;"><span id="cishu" style="color:white;margin-left: 2px;"></span></div><a href="/home/luntan/xinxi" style="float:right;"><img src="/assets/images/xinfeng.jpg"></a>
    </div>
    <div class="container" style="min-height:1000px ;">
        <div class="row">
            @foreach($tiezi as $k=>$v)
            <div class="col-12">
                <div class="single-forum mb-30">
                    <h3><a href="/home/luntan/{{ $v->id }}">{{ $v->title }}</a></h3>
                    <div class="forum-meta">
                        <ul>
                            <li>{{ $v->uname }}</li>
                            <li>{{ $v->updated_at }}</li>
                            <li>{{$v->num}} 回复</li>
                        </ul>
                        <span class="view">浏览{{ $v->visit }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $tiezi->appends($request)->links() }}
    </div>
</div>
<script>
    setTimeout(function(){
      $("#alert").hide();
    },2500);
    $('#button').click(function(){
      $("#alert").hide();
    });

    setInterval("zhannei()", 1000);
    function zhannei(){
    $.get("/home/luntan/num", function(msg){
        if(msg == 0){
            $('#cishu').parent().removeClass("beijing");
        }else{
            $('#cishu').text(msg);
            $('#cishu').parent().attr("class", "beijing");
        }
    });
　　
    }
</script>
  @endsection



























