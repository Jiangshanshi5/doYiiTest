<?php
        include("../../public/functions.php");
        require("../../public/dbconfig.php");
        //echo $_POST['goods'];
       
        $date=DATE("Y-m-d H:i:s");
switch($_GET['a']){
   case  "putout":
        $id=$_GET['id'];
        $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
            date_default_timezone_set("PRC");
            mysql_select_db(DBNAME,$link);
            mysql_set_charset("utf8");
        $sql="update orders set  status='1' where id={$_GET['id']}";
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
                break;
            //========================添加完毕================//
        case "change":
             $linkman=$_POST['linkman'];
             $address=$_POST['address'];
             $code=$_POST['code'];
             $phone=$_POST['phone'];
             $addtime=$_POST['addtime'];
             $total=$_POST['total'];
             $status=$_POST['status'];
            $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
            date_default_timezone_set("PRC");
            mysql_select_db(DBNAME,$link);
            mysql_set_charset("utf8");
            $sql="update orders set 
            linkman='{$linkman}',
            address='{$address}', 
            code='{$code}' ,
            phone='{$phone}' ,
            addtime='{$addtime}' ,
            total='{$total}' ,
            status='{$status}' 
            where id={$_GET['id']}";
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