<?php   
    session_start();
    require("dbconfig.php");
    $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
        //3
        mysql_select_db(DBNAME,$link);
        mysql_set_charset("utf8");
        $sql2="select * from users where username='{$_SESSION['xxname']}'";
        echo $sql2;
        $result1=mysql_query($sql2,$link);
        $cc=mysql_fetch_assoc($result1);
        //echo $cc['state']."=cc<br>";
        $id=$_GET['id'];
        $sql1="select * from users where id={$id}";
        $result=mysql_query($sql1,$link);
        $name=mysql_fetch_assoc($result);
        // echo $name['state']."=name";
        // exit;
    if($cc['state']>=$name['state']){//判断本用户是否为超级管理员
            header("Location:leftshow.php?errno=3");
        exit;
        }
        if($result && mysql_num_rows($result)>0){//结果有多少条
        $sql="delete from users where id={$_GET['id']}";
        $res=mysql_query($sql);
        header("Location:leftshow.php?true=1");
        exit;
        }