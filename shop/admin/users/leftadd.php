<?php
session_start();
    require("dbconfig.php");
    $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
        //3
        mysql_select_db(DBNAME,$link);
        mysql_set_charset("utf8");
        $sql2="select * from users where username='{$_SESSION['xxname']}'";
        //echo $sql2;
        $result1=mysql_query($sql2,$link);
        $cc=mysql_fetch_assoc($result1);
        if($cc['state']!=0){
            header("Location:leftshow.php?errno=3");
        exit;
        }
    mysql_free_result($result1);
    mysql_close($link);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<link href="css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="images/main/favicon.ico" />
<style>
body{overflow-x:hidden; background:url("../images/bg11.jpg") 0px 0px no-repeat;  border: 3px solid #ddd;border-radius:30px;padding:15px 0px 10px 5px;}
#searchmain{ font-size:12px;}
#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(../images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url(../images/main/add.jpg) no-repeat 0px 6px; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF}
#search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
#main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
#main-tab th{ font-size:12px; background:url(../images/main/list_bg.jpg) repeat-x; height:32px; line-height:32px;}
#main-tab td{ font-size:12px; line-height:40px;}
#main-tab td a{ font-size:12px; color:#548fc9;}
#main-tab td a:hover{color:#565656; text-decoration:underline;}
.bordertop{ border-top:1px solid #ebebeb}
.borderright{ border-right:1px solid #ebebeb}
.borderbottom{ border-bottom:1px solid #ebebeb}
.borderleft{ border-left:1px solid #ebebeb}
.gray{ color:#dbdbdb;}
td.fenye{ padding:10px 0 0 0; text-align:right;}
.bggray{ background:#f9f9f9; font-size:14px; font-weight:bold; padding:10px 10px 10px 0; width:120px;}
.main-for{ padding:10px;}
.main-for input.text-word{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; padding:0 10px;}
.main-for select{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666;}
.main-for input.text-but{ width:100px; height:40px; line-height:30px; border: 1px solid #cdcdcd; background:#e6e6e6; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#969696; float:left; margin:0 10px 0 0; display:inline; cursor:pointer; font-size:14px; font-weight:bold;}
#addinfo a{ font-size:14px; font-weight:bold; background:url(../images/main/addinfoblack.jpg) no-repeat 0 1px; padding:0px 0 0px 20px; line-height:45px;}
#addinfo a:hover{ background:url(../images/main/addinfoblue.jpg) no-repeat 0 1px;}
b{ font-size:25px; font-weight:bold;line-height:45px;font-family:"Microsoft YaHei","Tahoma","Arial",'宋体';
color:#fff;}
</style>
</head>
<body>
<!--main_top-->
<?php
    switch($_GET['errno']){
        case 1:
            echo "抱歉您不能创建比您级别高的管理员";
}
?>
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：用户管理&nbsp;&nbsp;>&nbsp;&nbsp;添加信息</td>
  </tr>
  <tr>
    <td align="left" valign="top" id="addinfo">
    <center>
    <b style="font-size:25px";>新增管理员</b>
    </center>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <form method="post" action="leftdoadd.php">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">账号*：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="username" value="" class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">真实姓名：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="name" value="" class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">用户密码：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="pass" value="" class="text-word">
        </td>
        </tr>
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">性别：</td>
        <td align="left" valign="middle" >
        <input type="radio" name="sex" value="1" class="text-word">男
        <input type="radio" name="sex" value="0" class="text-word">女
        </td>
        </tr>
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">家庭住址：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="address" value="" class="text-word">
        </td>
        </tr>
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">邮编：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="code" value="" class="text-word">
        </td>
        </tr>
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">联系电话：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="phone" value="" class="text-word">
        </td>
        </tr>
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">email：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="email" name="email" value="" class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">用户权限：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <select name="state" id="level">
	    <option value="2" >&nbsp;&nbsp;会员</option>
	    <option value="1" >&nbsp;&nbsp;一般管理员</option>
	    <option value="0" >&nbsp;&nbsp;创建者</option>
        </select>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input name="" type="submit" value="提交" class="text-but">
        <input name="" type="reset" value="重置" class="text-but"></td>
        </tr>
    </table>
    </form>
    </td>
    </tr>
</table>
</body>
</html>