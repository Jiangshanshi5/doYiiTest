<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息管理</title>
</head>
<body>
	
	<?php
		$id = $_GET['id'];
		//2 
		//六脉神剑
		//1
		require("dbconfig.php");//导入数据库配置文件
		//2
		$link = @mysql_connect(HOST,USER,PASS) or die("数据库连接失败");
		//3
		mysql_select_db(DBNAME,$link);
		mysql_set_charset("utf8");
		//4查询出需要修改的学生信息
		$sql = "SELECT * FROM stu WHERE id=$id";
		echo $sql;
		$result = mysql_query($sql,$link);
		//5
		$row = mysql_fetch_assoc($result);
		

		

		//关于男女默认选中
		// echo $row['sex']=="m" ? "checked":"";
		// 相当于
		// if($row['sex']=="m"){
		// 	echo "checked";
		// }else{
		// 	echo "";
		// }



	?>
    <h2>添加商品分类</h2>
	<form action="action.php?a=edit" method="post" >
		分类id <input type="text" name="id" value="<?php echo $row['id']; ?>"><br><br>
		分类名称 <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
		父类id号 <input type="text" name="pid" value="<?php echo $row['pid']; ?>"><br><br>
		分类路径 <input type="text" name="path" value="<?php echo $row['path']; ?>"><br><br>
		 <input type="submit" >
		 <input type="reset">
	</form>

	<?php
		//6
		mysql_free_result($result);
		mysql_close($link);	
	?>
</body>
</html>