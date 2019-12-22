<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加信息</title>
    <style type="text/css">
    body,h2,a,ul,li{
				margin:0px;
				padding:0px;
			}
    body{
				background:url("../images/bg11.jpg") 0px 0px no-repeat;  /*平铺出导航栏的背景颜色*/
				/*border:1px solid red;*/
			}
    h2{
            margin-top:70px;
            }
    </style>
</head>
<body>
<center>
	<h2>添加信息</h2>
	<form action="leftdoadd.php" method="post">
    <table>
        <tr>
		<td>账号*</td>
        <td><input type="text" name="username"></td>
        </tr>
        <tr>
		<td>真实姓名</td>
        <td><input type="text" name="name"></td>
        </tr>
        <tr>
		<td>密码*</td>
        <td><input type="password" name="pass"></td>
        </tr>
        <tr>
		<td>性别*</td>
        <td><input type="radio" name="sex" value="1">男
			 <input type="radio" name="sex" value="0">女</td>
             </tr>
        <tr>
		<td>家庭住址</td>
        <td><input type="text" name="address"></td></tr>
        <tr>
		<td>邮编</td>
        <td><input type="text" name="code"></td></tr>
        <tr>
		<td>联系电话</td>
        <td><input type="text" name="phone"></td></tr>
        <tr>
		<td>email*</td>
        <td><input type="text" name="email"></td></tr>
        <tr>
		<td> <input type="submit" >
		 </td><td><input type="reset"></td>
         </tr>
    </table>
	</form>
    </center>
</body>
</html>