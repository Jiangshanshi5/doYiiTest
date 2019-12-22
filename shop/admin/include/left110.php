<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>网站前台</title>
    </head>
    <body>
        <?php
            echo "欢迎".$_SESSION['xxname']."<a href=\"logout.php\"  target='_top'>退出</a>";
        ?>
       <h2>会员模块</h2>
       <h3><a href='leftshow.php' target="show">浏览会员</a></h3>
       <h3><a href='leftadd.php'target="show">添加会员</a></h3>
       <h2>商品类别</h2>
       <h3><a href='../login.php'target="show">浏览商品类别</a></h3>
       <h3><a href='../login.php'target="show">添加商品类别</a></h3>
       <h2>商品</h2>
       <h3><a href='../login.php'target="show">浏览商品</a></h3>
       <h3><a href='../login.php'target="show">添加商品</a></h3>
    </body>
</html>