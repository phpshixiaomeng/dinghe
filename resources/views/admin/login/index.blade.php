<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台登录</title>
<link rel="stylesheet" type="text/css" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin_assets/css/font-awesome.min.css"/>
<link rel="stylesheet" href="/admin_assets/css/loginMy.css"/>
<script type="text/javascript" src="/admin_assets/js/jquery-1.8.3.min.js"></script>
<style>
html,body{width:100%;}
</style>

</head>
<body>
@if (session('error'))
    <div id="alert" class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span id="button" aria-hidden="true">&times;</span></button>
        <center style="font-size: 20px;">{{ session('error') }}</center>
    </div>
@endif
<div class="main">
    <div class="center">

        <form action="/admin/login" method="post" id="formOne" onsubmit="return submitB()" >
            {{csrf_field()}}
            <i class="fa fa-user Cone">  | </i>
            <input style="width:51.2%" type="text" name="user" id="user" placeholder="用户名"onblur="checkUser()"/>
            <span id="user_pass"></span>
            <br/>
            <i class="fa fa-key Cone">  | </i>
            <input style="width:51.2%" type="password" name="password" id="pwd" placeholder="密码"onblur="checkUser1()"/>
            <span id="pwd_pass"></span>
            <br/>
            <i class="fa fa-folder-open Cone">  | </i>
            <input type="submit" value="登录" id="submit" >
            <br/>
        </form>
    </div>

</div>


<script type="text/javascript" src="/admin_assets/js/loginMy.js"></script>
<div style="text-align:center;">
<script>
    $('#button').click(function(){
        $("#alert").hide();
    });
</script>
</div>
</body>
</html>