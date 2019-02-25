
<?php
//连接数据库 读取管理员信息
try {
    $dbh = new PDO('mysql:host=localhost;dbname=scream_game','root','');
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$cz = new PDO('mysql:host=localhost;dbname=scream_game','root','');
$da=$cz->query('select * from home_users where id=38');

foreach ($da as $value) {

    $data=$value['name'];
    }
?>


<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部</title>
    <link rel="stylesheet" type="text/css" href="../css/reset.css" />
    <link rel="stylesheet" type="text/css" href="../css/common.css" />
</head>

<body>
    <div class="head clearfix">
        <div class="logo">

            <img src="../images/touxiang.jpg" style="width:33px;height:33px">
            用户名:<?php echo $data ?>
            <a href="/admin"><img src="../images/logo1.png" alt="汉锐会议"/></a>
        </div>
    </div>
</body>

</html>