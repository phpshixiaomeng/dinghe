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
<div id="right_ctn">
    <div class="right_m">
         <div class="hy_list">
            <div class="box_t">
                <span class="name">友情链接</span>
                    <div class="position">
                        <a href=""><img src="/admin_assets/images/icon5.png" alt=""/></a>
                        <a href="">首页</a>
                        <span><img src="/admin_assets/images/icon3.png" alt=""/></span>
                        <a href="">友情链接列表</a>
                    </div>
            </div>
            <form  action="/admin/link" method="get">
                <div class="search">
                    <span >按照名字查询</span>
                    <div class="s_text"><input name="search" type="text"></div>
                    <input type="submit" class="btn btn-info" value="搜索">
                    <span style="float:right; font:18px/1.2 '微软雅黑';margin-right: 100px;margin-top: 20px;" >总共<b style="color:red;" ></b>条友情链接</span>
                </div>
            </form>
            <div class="space_hx">&nbsp;</div>

                <div class="alert alert-success">

                </div>

                <div class="alert alert-danger">

                </div>

            <table style = "width:97%" cellpadding="0" cellspacing="0" class="list_hy">
                <tr>
                    <th scope="col">友情链接名</th>
                    <th scope="col">友情链接地址</th>
                    <th scope="col">友情链接缩略图</th>
                    <th scope="col">审核</th>
                    <th scope="col">操作</th>
                </tr>


                <tr>
                    <td class="xz"><input name="id" type="checkbox" value=""></td>
                    <td></td>
                    <td></td>
                    <td>
                        <img src=""style="width:40px;height:40px;" alt="">
                    </td>
                    <td>

                            <a href=""><img style="width:20px" src="/admin_assets/images/links/dui.jpg"></a>

                            <a href=""><img style="width:20px" src="/admin_assets/images/links/cuo.jpg"></a>

                    </td>
                    <td>
                        <a style="float:left" href="" class="btn btn-warning">修改</a>
                        <form style="float:left" action="" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input  onclick="return confirm('确定要删除吗?')" class="btn btn-danger" type="submit" value="删除">
                        </form>

                    </td>
                </tr>

                </table>
                    <div style="text-align: right;">

                    </div>
                <div class="r_foot" style="margin-bottom: 30px">
                    <div class="r_foot_m">
                   <!--      <span>
                            <input id="qx" name="" type="checkbox" value="">
                            <em>全部选中</em>
                        </span> -->
                        <span style="width:100px;">
                            <form method="post" id="qdel" action="/admin/link/del">
                                {{ csrf_field() }}
                                <input  class="btn btn-danger" onclick="return confirm('确定要删除吗?')"  style="width:100px;height:30px;color:grey;"  type="submit" value="批量删除">
                            </form>
                        </span>
                    </div>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#qx').click(function() {
        if(this.checked){
            $("input[name='id']").attr("checked", true);
        }else{
            $("input[name='id']").attr("checked", false);
        }
    });
    $('#qdel').mouseover(function() {
    var delid = [];
        $('input:checkbox:checked').each(function (){
            delid.push($(this).val());
         });
        $(this).append('<input type="hidden" name="delid" value="'+delid+'">');
    });
</script>
@endsection