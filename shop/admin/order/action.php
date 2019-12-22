<?php
        include("../../public/functions.php");
        require("../../public/dbconfig.php");
        $typeid=$_POST['typeid'];
        $goods=$_POST['goods'];
        $company=$_POST['company'];
        $descr=$_POST['descr'];
        $price=$_POST['price'];
        $picname=$_FILES['picname']['name'];
        $state=$_POST['state'];
        //echo $_POST['goods'];
        $store=$_POST['store'];
        $num=$_POST['num'];
        $date=DATE("Y-m-d H:i:s");
switch($_GET['a']){
    
            //========================添加完毕================//
        case "change":
             $price=$_POST['price'];
             $num=$_POST['num'];
            $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
            date_default_timezone_set("PRC");
            mysql_select_db(DBNAME,$link);
            mysql_set_charset("utf8");
            $sql="update detail set price='{$price}',num='{$num}' where id={$_GET['id']}";
            // echo  "<hr>";
            // echo $sql;
            // exit;
            $res=mysql_query($sql);
            if(mysql_affected_rows()>0){
                    header("location:show.php?true=2");
                     exit;
                    //echo "成功";
            }else{
                    header("location:show.php?errno=2");
                    exit;
                   // echo "失败";
            }
                mysql_close($link);	
        
        
        ;break;
            }