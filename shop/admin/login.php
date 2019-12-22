<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>验证用户登录页面</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css1/login1.css" rel='stylesheet' type='text/css' />
    </head>
    <body>
        <!--<h2><a href="">登录</a></h2>-->
        <div class="login-form">
        <div class="close"> </div>
        <div class="head-info"></div>
        <div class="clear"> </div>
         <h5><font color="red"><?php switch($_GET['errno']){
                            CASE 1: echo "用户名错误,请重新输入";break;
                            CASE 2: echo "用户名或密码错误,请重新输入";break;
                            CASE 3: echo "验证码输入错误";break;
                            case 4:
                            echo "sorry,无登录权限";break;
        }                        
        ?></font></h5>
        <div class="avtar">
		<img src="images/avter1.jpg" width="79px"/>
	</div>
        <form action="include/dologin.php" method="post">
        <input type="text" name="user">
        <input type="password" name="pass"><br><br>
        <input type="text" size="6" name="code"><img src="../public/code.php" onclick="this.src='../public/code.php?id='+Math.random();"><br><br>
        <input type="submit"><br><br>
        <small><font><a href="">登录</a> | <a href="">注册</a></font></small>
        <!--验证码js特效  onclick="this.src='../public/code.php?id='+Math.random();"-->
        </form>
        </div>
    </body>
</html>