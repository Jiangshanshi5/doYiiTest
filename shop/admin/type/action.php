<?php
    switch($_GET['a']){
        case 'insert':
            $type=$_POST['type'];
            $pid=$_POST['pid'];
            $path=$_POST['path'];
            // echo $pid;
            // echo "<br>";
            // echo $path;
            // echo "<br>";
            //使用六脉神剑
            $link=mysql_connect("localhost","root","");
            mysql_select_db("shop",$link);
            mysql_set_charset("utf8");
            // $sql1="create table type(id int unsigned not null primary key auto_increment,name varchar(32) not null,pid int default 0,path varchar(255))";
            // $result=mysql_query($sql1,$link);
            $sql="insert into type values(null,'$type','$pid','$path')";
            //echo $sql;
            $result=mysql_query($sql,$link);
            if(mysql_insert_id()<0){
                header("location:add.php?errno=1");
            exit;
            }else{
            header("location:index.php?true=2");
            exit;
            }
            break;
            case change:
            $link=mysql_connect("localhost","root","");
            mysql_select_db("shop",$link);
            mysql_set_charset("utf8");
            $name=$_POST['type'];
            $id=$_GET['id'];
            $sql="update type set name='{$name}' where id={$id}";
            echo $sql;
            $result=mysql_query($sql,$link);
            if(mysql_affected_rows()<1){
               header("location:change.php?errno=1");
            exit;
            }else{
            header("location:index.php?true=1");
            exit;
            }
            break;
    }