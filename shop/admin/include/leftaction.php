<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>学生信息管理</title>
</head>
<body>
	<?php
        require("dbconfig.php");
        $link = @mysql_connect(HOST,USER,PASS) or die("数据库连接失败");
			mysql_select_db(DBNAME,$link);
			mysql_set_charset("utf8");
		switch($_GET['a']){
			case "edit"://修改 edit modify filemtime() change 
			//4.1 接收学生信息的id号
			$username=$_POST['username'];
            $name=$_POST['name'];
            $pass=$_POST['pass'];
            $sex=$_POST['sex'];
            $address=$_POST['address'];
            $code=$_POST['code'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $addtime=date("Y-m-d H:i:s");
            $id=$_GET['id'];
			$sql = "UPDATE users SET username='$username',name='$name',pass='$pass',sex='$sex',address='$address',code='$code',phone='$phone',email='$email',addtime='$addtime'  WHERE id=$id";
			//echo $sql;//打印sql语句
			$result = mysql_query($sql,$link);
			//5判断是否修改成功
			if(mysql_affected_rows()>0){
				echo "修改成功";
			}else{
				echo "修改失败";
			}
			//6
			mysql_close($link);	
			break;
		}
	?>
</body>
</html>