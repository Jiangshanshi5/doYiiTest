<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="../include/css/css3.css" type="text/css" rel="stylesheet" />
<link href="../include/css/main3.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="../include/images/main/favicon.ico" />
<style>
body{overflow-x:hidden; background:url("../images/bg11.jpg") 0px 0px no-repeat; border-radius:30px; border: 3px solid #ddd; padding:15px 0px 10px 5px;}
#searchmain{  font-size:12px;}
#search{ font-size:12px; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{border-radius:50px;  height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(../include/images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url(../include/images/main/add.jpg) no-repeat -3px 7px; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
#search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
#main-tab{ border-radius:30px;  border:1px solid #eaeaea; background:#FFF; font-size:12px;}
#main-tab th{ font-size:12px; background:url(../include/images/main/list_bg.jpg) repeat-x; height:32px; line-height:32px;}
#main-tab td{ font-size:12px; line-height:40px;background:url(../include/images/main/list_bg.jpg) repeat-x;}
#main-tab td a{ font-size:12px; color:#548fc9;}
#main-tab td a:hover{background:url(../include/images/main/list_bg.jpg) repeat-x;color:#565656; text-decoration:underline;}
.bordertop{ border-top:1px solid #ebebeb}
.borderright{ border-right:1px solid #ebebeb}
.borderbottom{ border-bottom:1px solid #ebebeb}
.borderleft{ border-left:1px solid #ebebeb}
.gray{ color:#dbdbdb;}
td.fenye{ padding:10px 0 0 0; text-align:right;}
.bggray{ background:#f9f9f9}
b{ font-size:25px;  font-weight:bold;line-height:45px;font-family:"Microsoft YaHei","Tahoma","Arial",'宋体';
color:#fff;}
small{
}
select{
    margin-top:12;
    }
a{
	text-decoration:none; /*去掉下划线*/
     color:white;
			}
a:hover{
		background:#ddd;
		color:blue;
			}
input{border-radius:5px;}
input:hover{
				border:1px solid green;
                border-radius:5px;
			}

</style>
</head>
<body>
<!--main_top-->
<center><b style="color:red;">
<?php
    switch($_GET['true']){
            // case 1:
                // echo "添加成功";break;
            case 2:
                echo "修改成功";break;
        }
    switch($_GET['errno']){
            // case 1:
                // echo "添加成功";break;
            case 2:
                echo "修改失败";break;
        }
?>
</b>
</center>
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：商品信息</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search" background="../images/new_002.jpg">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form method="get" action="show.php">
	         <span>类别名：</span>
	         <input type="text" name="name" value="<?php echo $_POST['name']; ?>" class="text-word">
            </select>
	         <input name="" type="submit" value="搜索" class="text-but">
	         </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;" background="../images/new_002.jpg"><a href="./index.php" target="show" onFocus="this.blur()" class="add">添加商品</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">订单id</th>
        <th align="center" valign="middle" class="borderright">商品id</th>
        <th align="center" valign="middle" class="borderright">商品名称</th>
        <th align="center" valign="middle" class="borderright">单价</th>
        <th align="center" valign="middle" class="borderright">被购买数量</th>
        <th align="center" valign="middle">操作</th>
      </tr>
      
      <?php
        require("../../public/dbconfig.php");
        //2
        $link = @mysql_connect(HOST,USER,PASS) or die("导入失败");
        //3
        date_default_timezone_set("PRC");
        mysql_select_db(DBNAME,$link);
        mysql_set_charset("utf8");
//=====================================================================//
        $wherelist = array();
                    $urllist = array();
                    if(!empty($_GET['name'])){
                    $wherelist[] = " name like '%{$_GET['name']}%'";
                    $urllist[] = "name={$_GET['name']}";
                    //加载一条sql语句
                    }
                    if(!empty($_GET['sex'])){
                        $wherelist[]=" sex='{$_GET['sex']}'";
                        $urllist[] = "sex={$_GET['sex']}";
                    }
                    //从数组拼接成为条件字符串
                    if(count($wherelist)>0){
                        $where=" where ".implode("and",$wherelist);
                        $url="&".implode("&",$urllist);
                       
                    }
        $page=isset($_GET['page']) ?$_GET['page'] :1;//接受查看的页码
                $maxsize=6;//每页显示的条数
                $pagerows=0;//一共多少条数据
                $pagesize=0;//一共显示多少页
                //求出数据条数
                $sql="select count(*) from detail ".$where;
                // echo $sql;
                // echo "<hr>";
                $result=mysql_query($sql);
                $pagerows=mysql_result($result,0);//获取数据库中有多少条记录
                //一共要显示多少页
                $pagesize=ceil($pagerows/$maxsize);
                //查看页码$page是否越界
                if($page>$pagesize){
                    $page=$pagesize;
                }
                if($page<1){
                    $page=1;
                }
                $limit =" limit ".($page-1)*$maxsize.",".$maxsize;
				$sql = "select * from detail ".$where.$limit;
        $res=mysql_query($sql);
        //5
        $aa=array(0=>'售空',1=>'在售');
        while($row=mysql_fetch_assoc($res)){
        //echo $row['picname'];
        //print_r($row);
$str=<<<aa
    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{$row['id']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['orderid']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['goodsid']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['name']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['price']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['num']}
        <td align="center" valign="middle" class="borderbottom">
        <a href="del.php?id={$row['id']}&name={$row['picname']}" onFocus="this.blur()" class="add">删除</a><span class="gray">&nbsp;|&nbsp;</span><a href="change.php?id={$row['id']}&name={$row['picname']}" onFocus="this.blur()" class="add">修改</a></td>
      </tr>
aa;
         echo $str; 
}       
	?>
    </table>
    <?php
        mysql_free_result($res);
        mysql_close($link);
        ?>
    </td>
    </tr>
  <tr>
  </tr>
</table>
<center>
<small>
<?php
//======================================分页==============================================/
                     
               echo "<br>当前是{$page}/{$pagesize}页,共计有{$pagerows}条记录<br>";
                //第二种 
                echo $url;
                 echo "<a href='show.php?page=1'{$url}>首页</a> | ";
                echo "<a href='show.php?page=".($page-1)."{$url}'>上一页</a> | ";
                // echo "第";
                // for($i=1;$i<=$pagesize;$i++){
                    // echo "<a href='show.php?p={$i}'>{$i} </a>";
                // }
                // echo "页 | ";
                echo "<a href='show.php?page=".($page+1)."{$url}'>下一页</a> | ";
                echo "<a href='show.php?page={$pagesize}{$url}'>末页</a>";
                //万年历方式
                
                
                echo "<form action='show.php' method='get'>";
                echo "<input type='text' size='1' name='p' value=\"\"> ";
                echo "<input type='submit' value='跳转'>";
                echo "</form>";
//======================================分页==============================================//
                ?>
    </small>
    </center>
</body>
</html>