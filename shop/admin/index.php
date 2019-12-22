<?php
	session_start();
	if(empty($_SESSION['xxname'])){
		header("Location:login.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>商铺购物管理系统</title>
</head>
<frameset rows="59,*" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="include/top.php" scrolling="No" noresize="noresize"/>
  <frameset cols="200,*" frameborder="no" border="0" framespacing="0">
    <frame src="include/left.php" scrolling="No" noresize="noresize"/>
    <frame src="include/main.php" name="show"/>
  </frameset>
</frameset>
<noframes><body>
</body>
</noframes></html>