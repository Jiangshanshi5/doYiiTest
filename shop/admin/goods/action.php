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
            //echo $sql;
            //exit;
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
        if(!empty($_FILES)){//如果上传了picname 则删除原图片                    _
            unlink("./uploads/".$_GET['name']);     //                                     |
            unlink("./uploads/s_".$_GET['name']);  //                                      |
            $path="./uploads/";
            $typelist=array("image/png","image/jpeg","image/gif","image/jpeg");
            $upfile=$_FILES['picname'];
            print_r($upfile);
            echo"上面是要打印的数组";
            $a=fileupload($upfile,$path,$typelist);
            echo $a['info'];//新名称
            if($a['error']==false){
                exit("上传文件失败"."失败原因".$a['info']);
            }
            imageZoom($a['info'],$path,$width=50,$height=50,$pre="s_");
            echo $a['info'];            //       |          
            }                                                    //                       --         
        $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
            date_default_timezone_set("PRC");
            mysql_select_db(DBNAME,$link);
            mysql_set_charset("utf8");
            $sql="update goods set typeid='{$typeid}',goods='{$goods}',company='{$company}',descr='{$descr}',price='{$price}',picname='{$a['info']}',state='{$state}',store='{$store}',num='{$num}',addtime='{$date}' where id={$_GET['id']}";
            echo  "<hr>";
            echo $sql;
            $res=mysql_query($sql);
            if(mysql_affected_rows()>0){
                    header("location:show.php?true=2");
                     exit;
                    //echo "成功";
            }else{
                    header("location:index.php?errno=2");
                    exit;
                   // echo "失败";
            }
                mysql_close($link);	
        
        
        ;break;
            }