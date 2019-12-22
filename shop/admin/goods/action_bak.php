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
    //print_r($_FILES);
    echo $typeid;
     //=========================文件上传========================//
     $path="./uploads/";
    $typelist=array("image/png","image/jpeg","image/gif","image/jpeg");
    $upfile=$_FILES['picname'];
    print_r($upfile);
    echo"上面是要打印的数组";
    $a=fileupload($upfile,$path,$typelist);
    $data['name']=$_POST['name'];//名称
    $data['newname']=$a['info'];//新名称
    $data['time']=date("Y-m-d H:i:s");
    $data['oldname']=$upfile['name'];//原文件名
    $data['type']=$upfile['type'];//文件类型
    $data['size']=$upfile['size'];//文件大小
    echo "<pre>";
    print_r($data);
    exit;
    if($a['error']==false){
        exit("上传文件失败"."失败原因".$a['info']);
    }
    imageZoom($data['newname'],$path,$width=50,$height=50,$pre="s_");
    //=========================文件输出=======================//
        //2
        $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
        //3
        date_default_timezone_set("PRC");
        mysql_select_db(DBNAME,$link);
        mysql_set_charset("utf8");
        $sql="insert into goods values(null,'{$typeid}','{$goods}','{$company}','{$descr}','{$price}','{$picname}','{$state}','{$store}','{$num}','0','{$date}')";
        echo $sql;
        $res=mysql_query($sql);
        if(mysql_affected_rows()>0){
				echo "添加成功";
			}else{
				echo "添加失败";
			}
			//6
			mysql_close($link);	