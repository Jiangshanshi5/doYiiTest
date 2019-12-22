<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息管理</title>
</head>
<body>
    <?php
        echo "<center>";
		echo "<h1>会员信息</h1>";
		//六脉神剑
        require("dbconfig.php");
        //2
        $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
        //3
        mysql_select_db(DBNAME,$link);
        mysql_set_charset("utf8");
		//2
        $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
        //3
        mysql_select_db(DBNAME,$link);
        mysql_set_charset("utf8");
        //4
        $sql="select * from users where id={$_GET['id']}";
        $res=mysql_query($sql);
        $row=mysql_fetch_assoc($res);
        mysql_free_result($res);
        mysql_close($link);
	?>
	<h2>添加信息</h2>
	<form action="leftaction.php?a=edit&id=<?php echo $row['id']; ?>&addtime=<?php echo $row['addtime']; ?>" method="post">
    <table>
        <tr>
		<td>账号*</td>
        <td><input type="text" name="username" value="<?php echo $row['username']; ?>"></td>
        </tr>
        <tr>
		<td>真实姓名</td>
        <td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
        </tr>
        <tr>
		<td>密码*</td>
        <td><input type="password" name="pass" value="<?php echo $row['pass']; ?>"></td>
        </tr>
        <tr>
		<td>性别*</td>
        <td><input type="radio" name="sex" <?php echo $row['sex']=="1" ? "checked":"";?> value="1">男
			 <input type="radio" name="sex" <?php echo $row['sex']=="0" ? "checked":"";?> value="0">女</td>
             </tr>
        <tr>
		<td>家庭住址</td>
        <td><input type="text" name="address" value="<?php echo $row['address']; ?>"></td></tr>
        <tr>
		<td>邮编</td>
        <td><input type="text" name="code" value="<?php echo $row['code']; ?>"></td></tr>
        <tr>
		<td>联系电话</td>
        <td><input type="text" name="phone" value="<?php echo $row['phone']; ?>"></td></tr>
        <tr>
		<td>email*</td>
        <td><input type="text" name="email" value="<?php echo $row['email']; ?>"></td></tr>
        <tr>
		<td> <input type="submit" >
		 </td><td><input type="reset"></td>
         </tr>
    </table>
	</form>
</body>
</html>