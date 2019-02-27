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
            <li>
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

            <li>
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

            <li>
                <div class="nav_m">
                    <span><a>游戏信息</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li>
                        <span><a href="admin/game" target="main">游戏信息</a></span>
                    </li>
                    <li>
                        <span><a href="admin/game/create" target="main">添加游戏</a></span>
                    </li>
                </ul> 
            </li>

        </ul>
    </div>
</body>

</html>