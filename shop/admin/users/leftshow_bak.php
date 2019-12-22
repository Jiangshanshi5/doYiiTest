<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>会员信息</title>
    <style type="text/css">
        body{
				background:url("../images/bg1.jpg") 0px 0px no-repeat;  /*平铺出导航栏的背景颜色*/
				/*border:1px solid red;*/
			}
        h1{
            margin-top:50px;
            }
        table{
            padding:20px;
            border-radius:50px;
            background-color:hsla(255,100%,100%,0.4);
            }
        tr,td,th{
        
            border:1px dashed #ddd;
        }
    </style>
</head>
<body>
	
	<?php
		//首页显示学生信息
        echo "<center>";
		echo "<h1>会员信息</h1>";
		//六脉神剑
        require("dbconfig.php");
        //2
        $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
        //3
        date_default_timezone_set("PRC");
        //=============接受信息================//
        $username=$_POST['username'];
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        $sex=$_POST['sex'];
        $address=$_POST['address'];
        $code=$_POST['code'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $addtime=date("Y-m-d H:i:s");
        echo $addtime;
        mysql_select_db(DBNAME,$link);
        mysql_set_charset("utf8");
		//2
        $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
        //3
        mysql_select_db(DBNAME,$link);
        mysql_set_charset("utf8");
        //4
        $sql="select * from users";
        $res=mysql_query($sql);
        //5
        $aa=array(w=>"女",m=>"男",0=>"女",1=>"男");
        echo "<table width='1000px' cellspacing='0px'>";
        echo "<tr>
            <th>序号</th>
            <th>登录名</th>
            <th>姓名</th>
            <th>密码</th>
            <th>性别</th>
            <th>地址</th>
            <th>邮编</th>
            <th>电话</th>
            <th>电子邮件</th>
            <th>状态</th>
            <th>注册时间</th>
            <th>操作</th>
        </tr>";
        while($row=mysql_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['username']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['pass']}</td>";
            echo "<td>{$aa[$row['sex']]}</td>";
            echo "<td>{$row['address']}</td>";
            echo "<td>{$row['code']}</td>";
            echo "<td>{$row['phone']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['state']}</td>";
            echo "<td>{$row['addtime']}</td>";
            echo "<td><a href=\"leftdel.php?id={$row['id']}\">删除</a> | <a href=\"leftchange.php?id={$row['id']}&addtime={$row['addtime']}\">修改</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        mysql_free_result($res);
        mysql_close($link);
	?>
</body>
</html>