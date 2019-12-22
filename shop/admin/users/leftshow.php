
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
b{ font-size:18px;font-weight:bold;line-height:45px;font-family:"Microsoft YaHei","Tahoma","Arial",'宋体';
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

<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：用户管理&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
echo "<b style=\"color:red;\">";
        switch($_GET['true']){
            case 1:echo "修改成功";break;
            case 2:echo "添加成功";break;
            }
        switch($_GET['errno']){
            case 1:
            echo "<b style=\"color : red\">删除操作失败,无法删除超级管理员</b><br>";break;
            case 2:
            echo "<b style=\"color : red\">删除操作失败</b><br>";break;
            case 3:
            echo "<b style=\"color : red\">您的权限不够</b><br>";break;
        }
        echo "</b><br>";
?></td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search" background="../images/new_002.jpg">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form method="get" action="leftshow.php">
             性别<select name="sex" >
                <option value="">全部</option>
                <option value="1" <?php $_GET['sex']=='1' ?"selected" : "" ?>>男</option>
                <option value="0" <?php $_GET['sex']=='0' ?"selected" : "" ?>>女</option>
            </select>
	         <span>管理员：</span>
	         <input type="text" name="name" value="<?php echo $_POST['name']; ?>" class="text-word">
            </select>
	         <input name="" type="submit" value="搜索" class="text-but">
	         </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;" background="../images/new_002.jpg"><a href="./leftadd.php" target="show" onFocus="this.blur()" class="add">新增管理员</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">登录名</th>
        <th align="center" valign="middle" class="borderright">姓名</th>
        <th align="center" valign="middle" class="borderright">密码</th>
        <th align="center" valign="middle" class="borderright">性别</th>
        <th align="center" valign="middle" class="borderright">地址</th>
        <th align="center" valign="middle" class="borderright">邮编</th>
        <th align="center" valign="middle" class="borderright">电话</th>
        <th align="center" valign="middle" class="borderright">电子邮件</th>
        <th align="center" valign="middle" class="borderright">状态</th>
        <th align="center" valign="middle" class="borderright">注册时间</th>
        <th align="center" valign="middle">操作</th>
      </tr>
      
   
      <?php
		//首页显示学生信息
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
        //echo $addtime;
        //3
        mysql_select_db(DBNAME,$link);
        mysql_set_charset("utf8");
//======================================分页==============================================//
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
                $sql="select count(*) from users ".$where;
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
				$sql = "select * from users ".$where.$limit;
//======================================分页==============================================//
        $res=mysql_query($sql);
        //5
        $bb=array(1=>"男",0=>"女");
        $aa=array(2=>'会员',1=>"管理员",0=>"创建者");
        while($row=mysql_fetch_assoc($res)){
$str=<<<aa
    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{$row['id']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['username']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['name']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['pass']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$bb[$row['sex']]}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['address']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['code']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['phone']}
        </td><td align="center" valign="middle" class="borderright borderbottom">{$row['email']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$aa[$row['state']]}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$row['addtime']}</td>
        <td align="center" valign="middle" class="borderbottom">
        <a href="leftchange.php?id={$row['id']}&addtime={$row['addtime']}" onFocus="this.blur()" class="add">修改</a><span class="gray">&nbsp;|&nbsp;</span><a href="leftdel.php?id={$row['id']}" onFocus="this.blur()" class="add">删除</a></td>
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
                 echo "<a href='leftshow.php?page=1'{$url}>首页</a> | ";
                echo "<a href='leftshow.php?page=".($page-1)."{$url}'>上一页</a> | ";
                echo "第";
                for($i=1;$i<=$pagesize;$i++){
                    echo "<a href='leftshow.php?p={$i}'>{$i} </a>";
                }
                echo "页 | ";
                echo "<a href='leftshow.php?page=".($page+1)."{$url}'>下一页</a> | ";
                echo "<a href='leftshow.php?page={$pagesize}{$url}'>末页</a>";
                //万年历方式
                
                
                echo "<form action='leftshow.php' method='get'>";
                echo "<input type='text' size='1' name='p' value=\"\"> ";
                echo "<input type='submit' value='跳转'>";
                echo "</form>";
//======================================分页==============================================//
                ?>
    </small>
    </center>

</body>
</html>