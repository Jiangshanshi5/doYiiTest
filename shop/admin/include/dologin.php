<?php
    session_start();
    date_default_timezone_set("PRC");
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $code=$_POST['code'];
    $time=date("Y-m-d H:i:s");
    // echo $code;
    // echo "<br>";
    // echo $_SESSION['mcode'];
    //exit;
    // if($user!="user"){
        // header("location:../login.php?errno=1");
        // exit;
    // }
    // if($pass!=123456){
        // header("location:../login.php?errno=2");
        // exit;
    //}
    if($code!=$_SESSION['mcode']){
        header("location:../login.php?errno=3");
        exit;
        //验证码错误
    }
    define(HOST,"localhost");
    define(USER,"root");
    define(PASS,"");
    define(DBNAME,"shop");
    $link=@mysql_connect(HOST,USER,PASS) or die("连接失败");
    mysql_select_db(DBNAME,$link);
    mysql_set_charset("utf8");
    
    $sql="select * from users where username=\"$user\"";
    $result=mysql_query($sql,$link);
    if($result && mysql_num_rows($result)>0){//结果有多少条
        $name=mysql_fetch_assoc($result);
        if($pass != $name['pass']){
            header("location:../login.php?errno=2");
            exit;
            //密码错误
        }
        if($name['state']>1){
            header("location:../login.php?errno=4");
            exit;
            //无登录权限
        }
    }else{
         header("location:../login.php?errno=1");
        exit;
        //用户名错误
    }
    
    $_SESSION['xxname'] =$user; 
    $_SESSION['time'] =$time; 
    header("location:../index.php?user={$_POST['user']}&{$_SESSION['time']}");
    exit;
    
    
    
    
    
    
    