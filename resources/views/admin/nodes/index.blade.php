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
@if (session('success'))
    <div id="alert" class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
        <strong>{{ session('success') }}</strong>
    </div>
@endif
@if (session('error'))
    <div id="alert" class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
        <strong>{{ session('error') }}</strong>
    </div>
@endif
<div style="height:35px; background:none;">
<button  id="kanjuese" style="float:left" class="btn btn-primary" >角色列表</button>
<button  id="kanjiedian" style="float:left" class="btn btn-info" >节点列表</button>
</div>
<div id="right_ctn">
    <div class="right_m">
         <div id="juese" class="hy_list">
            <div class="box_t">
                <span class="name">角色列表</span>
            </div>
            <div class="space_hx">&nbsp;</div>
            <table  class="search list_hy">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">角色名</th>
                    <th scope="col">操作</th>
                </tr>
                @foreach($data_roles as $key=>$val)
                <tr>
                    <th>{{ $val->id}}</th>
                    <th>{{ $val->name}}</th>
                    <th>
                    <a class="btn btn-primary" href="/admin/nodes/{{$val->id}}/edit">权限节点</a>
                    </th>
                </tr>
                @endforeach
                </table>
            <div style="text-align: right;">
                {{ $data_roles->links() }}
            </div>
        </div>
         <div id="jiedian"  hidden class="hy_list">
            <div class="box_t">
                <span class="name">方法列表</span>
            </div>
            <div class="space_hx">&nbsp;</div>
            <table  class="search list_hy">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">节点名称</th>
                    <th scope="col">控制器名称</th>
                    <th scope="col">方法名称</th>
                </tr>
                @foreach($data_nodes as $k=>$v)
                <tr>
                    <th>{{ $v->id}}</th>
                    <th>{{ $v->name}}</th>
                    <th>{{ $v->cname}}</th>
                    <th>{{ $v->aname}}</th>
                </tr>
                @endforeach
                </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#button').click(function(){
    $("#alert").hide();
});
$('#kanjuese').click(function(){
    $('#juese').show();
    $('#jiedian').hide();
});
$('#kanjiedian').click(function(){
    $('#jiedian').show();
    $('#juese').hide();
});
</script>
@endsection