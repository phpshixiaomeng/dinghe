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
                    <span><a>会议管理</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li class="now_li">
                        <span><a href="/hy_list" target="main">会议列表</a></span>
                    </li>
                    <li>
                        <span><a href="/xjhy" target="main">新建会议</a></span>
                    </li>
                    <li>
                        <span><a href="/hymb" target="main">终端召集会议模板</a></span>
                    </li>
                    <li>
                        <span><a href="/cchy" target="main">已经存储的会议</a></span>
                    </li>
                </ul>
            </li>
            <li>
                <div class="nav_m">
                    <span><a>终端管理</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li>
                        <span><a href="/zdlb" target="main">终端列表</a></span>
                    </li>
                    <li>
                        <span><a href="/hy_list" target="main">群组列表</a></span>
                    </li>
                    <li>
                        <span><a href="/sjbf" target="main">终端数据备份</a></span>
                    </li>
                </ul>
            </li>
            <li>
                <div class="nav_m">
                    <span><a>流服务器</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li>
                        <span><a href="/lfpz" target="main">流服务器配置</a></span>
                    </li>
                    <li>
                        <span><a href="/fwqkz" target="main">流服务器控制</a></span>
                    </li>
                </ul>
            </li>
            <li>
                <div class="nav_m">
                    <span><a>系统诊断</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li>
                        <span><a href="/mkzt" target="main">模块状态</a></span>
                    </li>
                    <li>
                        <span><a href="/mkkz" target="main">模块控制</a></span>
                    </li>
                    <li>
                        <span><a href="/wltj" target="main">网络统计</a></span>
                    </li>
                    <li>
                        <span><a href="/zcxx" target="main">GK注册信息</a></span>
                    </li>
                    <li>
                        <span><a href="/ping" target="main">Ping</a></span>
                    </li>
                </ul>
            </li>
            <li>
                <div class="nav_m">
                    <span><a>系统配置</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li>
                        <span><a href="/xtpz" target="main">MCU配置</a></span>
                    </li>
                    <li>
                        <span><a href="/wlpz" target="main">网络配置</a></span>
                    </li>
                    <li>
                        <span><a href="/gkpz" target="main">GK配置</a></span>
                    </li>
                    <li>
                        <span><a href="/dlpz" target="main">FPass配置</a></span>
                    </li>
                </ul>
            </li>
            <li>
                <div class="nav_m">
                    <span><a>日志管理</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li>
                        <span><a href="/gzrj" target="main">故障日志</a></span>
                    </li>
                    <li>
                        <span><a href="/xtrj" target="main">系统日志</a></span>
                    </li>
                </ul>
            </li>
            <li>
                <div class="nav_m">
                    <span><a>系统维护</a></span>
                    <i>&nbsp;</i>
                </div>
                <ul class="erji">
                    <li>
                        <span><a href="/yhxx" target="main">用户信息</a></span>
                    </li>
                    <li>
                        <span><a href="/rjsj" target="main">软件升级</a></span>
                    </li>
                    <li>
                        <span><a href="/hfsz" target="main">恢复出厂设置</a></span>
                    </li>
                    <li>
                        <span><a href="/sjgl" target="main">数据库管理</a></span>
                    </li>
                    <li>
                        <span><a href="/bdcx" target="main">数据库补丁程序</a></span>
                    </li>
                    <li>
                        <span><a href="/gnxk" target="main">功能许可</a></span>
                    </li>
                </ul>
            </li>
            <li>
                <div class="nav_m">
                    <span><a href="/cqxt" target="_blank">重启MCU</a></span>
                </div>
            </li>
            <li>
                <div class="nav_m">
                    <span><a href="/tcxt" target="_blank">退出系统</a></span>
                </div>
            </li>
        </ul>
    </div>
</body>

</html>