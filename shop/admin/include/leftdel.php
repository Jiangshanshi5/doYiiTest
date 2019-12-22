<?php   
    require("dbconfig.php");
    $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
        //3
        mysql_select_db(DBNAME,$link);
        mysql_set_charset("utf8");
        //4
        $sql="delete from users where id={$_GET['id']}";
        //echo $sql;
        // exit;
        $res=mysql_query($sql);
        header("Location:leftshow.php");