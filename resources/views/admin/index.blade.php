<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台管理系统</title>
    <style>
    body {
        scrollbar-base-color: #C0D586;
        scrollbar-arrow-color: #FFFFFF;
        scrollbar-shadow-color: DEEFC6;
    }
    </style>
</head>
    <frameset rows="50,*" cols="*" frameborder="no" border="0" framespacing="0">
    <frame src="admin_assets/houtai/top.blade.php" name="topFrame" scrolling="no">

        <frameset cols="225,*" name="btFrame" frameborder="NO" border="0" framespacing="0">
            <frame src="admin_assets/houtai/left.blade.php" noresize name="menu" scrolling="yes">
                <frame src="admin_assets/houtai/hy_list.blade.php" class="frame_r" noresize name="main" scrolling="yes">
        </frameset>
</frameset>
<noframes>

    <body>您的浏览器不支持框架！</body>
</noframes>

</html>