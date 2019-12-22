<?php
   require("../../public/dbconfig.php");
    //2
    $link = @mysql_connect(HOST,USER,PASS) or die("数据库导入失败");
    //3
    mysql_select_db(DBNAME,$link);
    mysql_set_charset("utf8");
    //4
    $id=$_GET['id'];
    $sql="delete from liuyan where id={$_GET['id']} ";
    $res= mysql_query($sql);
    //5
    mysql_close($link);
    header("location:show.php");