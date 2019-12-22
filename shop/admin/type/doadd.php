<?php
    $id=$_POST['id'];
    $name=$_POST['name'];
    $fid=$_POST['pid'];
    $path=$_POST['path'];
    //六脉神剑第一剑
    require("dbconfig.php");
    //2
    $link=mysql_connect(HOST,USER,PASS) OR die("导入数据库失败");
    //3
    mysql_select_db(DBNAME,$link);
    mysql_set_charset("utf8");
    //4
    $sql="insert into stu(id,name,pid,path)values('{$id}','{$name}','{$fid}','{$path}')";
    $res=mysql_query($sql);
    //5
    mysql_close($link);
    echo "成功添加1条信息！";