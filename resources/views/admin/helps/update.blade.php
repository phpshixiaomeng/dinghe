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
@section('style')
<style type="text/css">
.help_update li h3{
    width:40%;
    margin-bottom:20px;
}
.reply{
    display: none;
}
.help_update{
    text-align: left;
    margin-left: 150px;
    width:800px;
}
.help_update h3 div{
    width:100%;
    word-wrap:break-word ;
}
#reply{
    width:70%;
    height:30%;
}
#edit{
    float:right;
    margin-right:30%;
}
#xiugai{
    float:right;
    margin-right:20%;
}
</style>
@endsection
@section('content')
<script>
    layui.use(['layer', 'form'], function(){
      var layer = layui.layer
      ,form = layui.form;
    });
</script>
<ul class="help_update">
   <li>
       <h3><small>用户名</small></h3>
       <h3>{{ $helps->uname }}</h3>
   </li>
   <li>
       <h3><small>反馈事件</small></h3>
       <h3>{{ $helps->name }}</h3>
   </li>
   <li>
       <h3><small>问题描述</small></h3>
       <h3><div>
           {!! $helps->description !!}
       </div></h3>
   </li>
   <li>
       <h3><small>回复内容</small></h3>
       <h3><div>
           {!! $helps->reply !!}
       </div></h3>
   </li>
   <li>
       <a id="edit" class="btn btn-info">点击展开修改</a>
   </li>
   <li>
        <div class="reply">
            <form id = "replys">
                    {{ csrf_field() }}
                    <h3><small>修改回复内容</small></h3>
                    <script id="reply" name="reply" type="text/plain">
                        {!! $helps->reply !!}
                    </script>
            </form>
            <a onclick ="submit( {{ $helps->id}} )" id="xiugai" class="btn btn-info" >修改</a>
        </div>
    </li>
</ul>
<script type="text/javascript">
    var ue = UE.getEditor('reply',{
    autoHeightEnabled:false,
    toolbars: [
    ['indent','emotion', 'undo', 'redo', 'bold','italic', 'underline']
    ]
    });
    $('#edit').click(function() {
        if( $(this).html() == '收起'){
            $(this).html('点击展开修改');
            $('.reply').hide();
        }else{
            $(this).html('收起');
            $('.reply').css('display','inline');
        }
    });
    function submit(id)
    {
        $.ajax({
            url: '/admin/help/update/'+id,
            type: 'POST',
            data: new FormData($('#replys')[0]),
            processData: false,
            contentType: false,
            dataType:"json",
            success : function(data) {
                if(data.msg="success"){
                    alert('修改成功');
                    var iframe = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(iframe);
                    window.parent.location.reload();
                }else{
                    alert('修改失败请重试');
                }
            }
        });
    }
</script>
@endsection