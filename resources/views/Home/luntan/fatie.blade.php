@extends('Home/show/head')
@section('content')
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
<div class="Forum-create-area section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45 pb-xs-45">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="forum-form">
                    <form action="/home/luntan" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12">
                                <div class="single-input mb-50 mb-sm-30 mb-xs-20">
                                   <label>话题标题</label>
                                   <input name="title" type="text"  placeholder="话题标题">
                                </div>
                                <div class="single-input mb-50 mb-sm-30 mb-xs-20">
                                  <label>话题内容</label>
                                    <script id="content" name="content" type="text/plain" style="height:200px;" >
                                    </script>
                                </div>
                                <div class=" mb-50 mb-sm-30 mb-xs-20">
                                  <input class="btn btn-primary" type="submit"  value="发帖" style="width:100px;height:40px;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
</script>
@endsection