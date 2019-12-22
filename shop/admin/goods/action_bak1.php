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
        $store=$_POST['store'];
        $num=$_POST['num'];
        $date=DATE("Y-m-d H:i:s");
switch($_GET['a']){
    case  "add":
         //=========================文件上传========================//
            $path="./uploads/";
            $typelist=array("image/png","image/jpeg","image/gif","image/jpeg");
            $upfile=$_FILES['picname'];
            print_r($upfile);
            echo"上面是要打印的数组";
            $a=fileupload($upfile,$path,$typelist);
            $data['newname']=$a['info'];//新名称
            if($a['error']==false){
                exit("上传文件失败"."失败原因".$a['info']);
            }
            imageZoom($data['newname'],$path,$width=50,$height=50,$pre="s_");
                //=========================文件输出=======================//
            $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
            date_default_timezone_set("PRC");
            mysql_select_db(DBNAME,$link);
            mysql_set_charset("utf8");
            $sql="insert into goods values(null,'{$typeid}','{$goods}','{$company}','{$descr}','{$price}','{$data['newname']}','{$state}','{$store}','{$num}','0','{$date}')";
            echo $sql;
            $res=mysql_query($sql);
            if(mysql_affected_rows()>0){
                    header("location:show.php?true=1");
                }else{
                    header("location:index.php?errno=1");
                }
                mysql_close($link);	
                break;
            //========================添加完毕================//
    case "change":
            
            $goods=$_POST['goods'];
            $company=$_POST['company'];
            $descr=$_POST['descr'];
            $price=$_POST['price'];
            $state=$_POST['state'];
            $store=$_POST['store'];
            $num=$_POST['num'];
            $date=DATE("Y-m-d H:i:s");
            $id=$_GET['id'];
            //=============取值完毕===============//
             //=========================文件上传========================//
            $path="./uploads/";
            $typelist=array("image/png","image/jpeg","image/gif","image/jpeg");
            $upfile=$_FILES['picname'];
            $a=fileupload($upfile,$path,$typelist);
            $data['newname']=$a['info'];//新名称
            if($a['error']==false){
                exit("上传文件失败"."失败原因".$a['info']);
            }
            imageZoom($data['newname'],$path,$width=50,$height=50,$pre="s_");
            
            
            $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
        //  
            date_default_timezone_set("PRC");
            mysql_select_db(DBNAME,$link);
            mysql_set_charset("utf8");
            $sql="UPDATE goods SET goods='{$goods}',company='{$company}',descr='{$descr}',price='{$price}',picname='{$data['newname']}',state='{$state}',store='{$store}',num='{$num}',addtime='{$date}' WHERE id={$_GET['id']}";
            echo $sql;
            $res=mysql_query($sql);
            $sql="delete from pic where 新文件名='{$id}' ";
            $res= mysql_query($sql);
            // $sql1="alter table pic auto_increment = 1";
            // $res= mysql_query($sql1);
            $picname=$_GET['name'];
            //echo $picname;
            @unlink("./uploads/".$picname);
            @unlink("./uploads/s_".$picname);
            //=====删除完毕====//
            if(mysql_affected_rows()>0){
                    header("location:show.php?true=2");
                    exit;
                }else{
                 header("location:change.php?errno=2");
                 exit;
                }
            //=========删除原图片===========//
            
			mysql_close($link);	
            break;
            
         }   