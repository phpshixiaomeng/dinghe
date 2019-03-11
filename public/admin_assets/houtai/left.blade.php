<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=8">
    <title>左边导航</title>
    <link rel="stylesheet" type="text/css" href="../css/reset.css" />
    <link rel="stylesheet" type="text/css" href="../css/common.css" />
    <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
    <!--框架高度设置-->
    <script type="text/javascript">
    $(function() {
        $('.sidenav li').click(function() {
            $(this).siblings('li').removeClass('now');
            $(this).addClass('now');
        });

        $('.erji li').click(function() {
            $(this).siblings('li').removeClass('now_li');
            $(this).addClass('now_li');
        });

        var main_h = $(window).height();
        $('.sidenav').css('height', main_h + 'px');
    })
    </script>
    <!--框架高度设置-->
</head>

<body>
    <div id="left_ctn">
        <ul class="sidenav">

            <li class="now">
                <div class="nav_m">
                    <span><a>前台用户管理</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li class="now_li">
                        <span><a href="/admin/userlist" target="main">前台用户列表</a></span>
                    </li>
                </ul>
            <li>
             <li class="now">
                <div class="nav_m">
                    <span><a>管理员信息</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li>
                        <span><a href="/admin/hy_list" target="main">管理员信息</a></span>
                    </li>
                    <li>
                        <span><a href="/admin/yhxx" target="main">添加管理员</a></span>
                    </li>
                </ul>
            </li>

            <li class="now">
                <div class="nav_m">
                    <span><a>分类信息</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li>
                        <span><a href="/admin/tjfl" target="main">分类信息</a></span>
                    </li>
                    <li>
                        <span><a href="/admin/tjfl/create" target="main">添加分类</a></span>

                    </li>
                </ul>
            </li>



            <li class="now">
                <div class="nav_m">
                    <span><a>游戏信息</a></span>

                    <i>&nbsp;</i>
                </div>
              <ul class="erji">
                    <li>
                        <span><a href="/admin/game" target="main">游戏信息</a></span>
                    </li>
                    <li>
                        <span><a href="/admin/game/create" target="main">添加游戏</a></span>
                    </li>

                    <li>
                        <span><a href="/admin/gameimg" target="main">游戏详情图信息</a></span>
                    </li>
                    <li>
                        <span><a href="/admin/gameimg/create" target="main">游戏详情图添加</a></span>
                    </li>

                    <li>
                        <span><a href="/admin/gamepic" target="main">游戏轮播图信息</a></span>
                    </li>

                    <li>
                        <span><a href="/admin/gamepic/create" target="main">游戏轮播图添加</a></span>
                    </li>

                </ul>

            </li>
            <li class="now">
                    <div class="nav_m">
                    <span><a>网站信息管理</a></span>
                    <i>&nbsp;</i>
            </div>

                <ul class="erji">
                    <li>

                        <span><a href="/admin/website" target="main">查看网站信息</a></span>
                    </li>
                    <li>
                        <span><a href="/admin/website/create" target="main">添加网站信息</a></span>
                    </li>
                </ul>

            </li>
            <li class="now">
                <div class="nav_m">
                    <span><a>友情链接管理</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li>
                        <span><a href="/admin/link" target="main">查看友情链接</a></span>
                    </li>
                    <li>
                        <span><a href="/admin/link/create" target="main">添加友情链接</a></span>
                    </li>
                </ul>
            </li>
            <li class="now">
                <div class="nav_m">
                    <span><a>广告管理</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li>
                        <span><a href="/admin/ads" target="main">查看广告</a></span>
                    </li>
                    <li>
                        <span><a href="/admin/ads/create" target="main">添加广告</a></span>
                    </li>
                </ul>
            </li>


            <li class="now">
                <div class="nav_m">
                    <span><a>轮播图管理</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li>
                        <span><a href="/admin/lunbo" target="main">查看轮播图片</a></span>
                    </li>
                    <li>
                        <span><a href="/admin/lunbo/create" target="main">添加轮播图</a></span>
                    </li>
                </ul>
            </li>
            <li class="now">
                <div class="nav_m">
                    <span><a>游戏资讯管理</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li>
                        <span><a href="/admin/zixun" target="main">查看资讯列表</a></span>
                    </li>
                    <li>
                        <span><a href="/admin/zixun/create" target="main">添加资讯</a></span>
                    </li>
                </ul>
            </li>
            <li class="now">
                <div class="nav_m">
                    <span><a>配置信息</a></span>

                    <i>&nbsp;</i>
                </div>

              <ul class="erji">
                 <li>
                        <span><a href="/admin/highpei" target="main">配置列表</a></span>
                    </li>
                    <li>
                        <span><a href="/admin/highpei/create" target="main">添加配置信息</a></span>
                    </li>

                </ul>

            </li>






























































































































































































































































            <li class="now">
                <div class="nav_m">
                    <span><a>反馈与帮助管理</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li>
                        <span><a href="/admin/help" target="main">查看反馈与帮助</a></span>
                    </li>
                    <li>
                        <span><a href="/admin/help/history" target="main">反馈与帮助历史记录</a></span>
                    </li>
                </ul>
            </li>
            <li class="now">
                <div class="nav_m">
                    <span><a>论坛管理</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li>
                        <span><a href="/admin/luntan" target="main">查看帖子</a></span>
                    </li>
                </ul>
            </li>







        </ul>
    </div>
</body>

</html>