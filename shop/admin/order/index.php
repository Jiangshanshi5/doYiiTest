<?php session_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品分类</title>
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
		//首页显示学生信息
        echo "<center>";
		//六脉神剑
         echo "<b style=\"font-size:25px\";>添加商品</b>";
        echo "</center>";
        require("../../public/dbconfig.php");
        //2
        $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
        //3
        date_default_timezone_set("PRC");
        mysql_select_db(DBNAME,$link);
        mysql_set_charset("utf8");
        //4
        $sql="select * from type order by concat(path,id)";
        $res=mysql_query($sql);
        $row=mysql_fetch_assoc($res)
        ?>
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：商品&nbsp;&nbsp;>&nbsp;&nbsp;商品</td>
  </tr>
  <tr>
    <td align="left" valign="top" id="addinfo">
     <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search" background="../images/new_002.jpg"></td>
  		
  <tr>
    <td align="left" valign="top">
    <form method="post" action="action.php?a=add" enctype="multipart/form-data">
    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
        <input type="hidden" name="path" value="<?php echo $path; ?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">商品名称*：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="goods" value="" class="text-word">
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">商品分类*：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <?php 
        echo "<select name=\"typeid\" id=\"level\">";
        while($row=mysql_fetch_assoc($res)){
        //$row['id'];
            $disable="";
            $n=substr_count($row['path'],",");
            $path=str_repeat("&nbsp;&nbsp;","$n");
            echo "<option  value={$row['id']}>{$path}{$row['name']}</option>";
            //echo $row['id'];
            }
        echo "</select>";
        
        ?></td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">生产厂家：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="company" value="" class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">简介：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="descr" value="" class="text-word">
        </td>
        </tr>
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">单价：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="price" value="" class="text-word">
        </td>
        </tr>
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">图片上传：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="file" name="picname" value="" class="text-word">
        </td>
        </tr>
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">状态：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="radio" name="state" value="0" > 售空
        <input type="radio" name="state" value="1"> 在售
        </td>
        </tr>
        <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">库存量：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="store" value="" class="text-word">
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">被购买数量：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="num" value="" class="text-word">
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