<?php
    //六脉神剑
        require("dbconfig.php");
        //2
        date_default_timezone_set("PRC");
        $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
        //3
        //=============接受信息================//
        $username=$_POST['username'];
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        $sex=$_POST['sex'];
        $address=$_POST['address'];
        $code=$_POST['code'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $state=$_POST['state'];
        $addtime=date("Y-m-d H:i:s");
        //echo $addtime;
        mysql_select_db(DBNAME,$link);
        mysql_set_charset("utf8");
        $sql="insert into users values(null,
        '{$username}',
        '{$name}',
        '{$pass}',
        '{$sex}',
        '{$address}',
        '{$code}',
        '{$phone}',
        '{$email}',
        '{$state}',
        '{$addtime}'
        )";
       // echo $sql;
       
        // exit;
        $res=mysql_query($sql);
        mysql_close($link);
        if($res){
           header("location:leftshow.php?true=2");
            exit;
        }else{
            
        header("location:leftadd.php?errno=1");
            exit;
        }