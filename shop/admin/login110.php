<!DOCTYPE html>
<html>	
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Flat Dark Web Login Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />
<link href="css1/login1.css" rel='stylesheet' type='text/css' />
<!--webfonts-->
<link href='http://fonts.useso.com/css?family=PT+Sans:400,700,400italic,700italic|Oswald:400,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<!--//webfonts-->
<script src="http://ajax.useso.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
<script>$(document).ready(function(c) {
	$('.close').on('click', function(c){
		$('.login-form').fadeOut('slow', function(c){
	  		$('.login-form').remove();
		});
	});	  
});
</script>
 <!--SIGN UP-->
 <h1>�̳Ǻ�̨����ϵͳ</h1>
<div class="login-form">

<!---------------------- �رհ�ť ------------------------>
	<div class="close"> </div>
		<div class="head-info">
<!---------------------- ͷ����ʽ ------------------------>
			<label class="lbl-1"><a href=""></a></label>
			<label class="lbl-2"><a href=""></a></label>
			<label class="lbl-3"><a href=""></a></label>
		</div>
			<div class="clear"> </div>
         <h5><font color="red"><?php switch($_GET['errno']){
                            CASE 1: echo "�û�������,����������";break;
                            CASE 2: echo "�û������������,����������";break;
        }                        
        ?></font></h5>
<!-----------------------ͷ��ͼƬ------------------------->
	<div class="avtar">
		<img src="images/avter1.jpg" width="79px"/>
	</div>
			<form action="dologin.php" method="post">
					<input type="text" class="text" name="user" value="�������û���">
						<div class="key">
					<input type="password" name="pass">
						</div>;<img src="../public/code.php" onclick="this.src='../public/code.php?id='+Math.random();"><input type="text" name="code">&nbsp
                        
	<div class="signin">
		<input type="submit" value="Login" >
	</div>
    </div>
    </form>
    <!---------------------form������--------------------->
 <div class="copy-rights">
					<p>Copyright &copy; 2015.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="��������">��������</a> - Collect from <a href="http://www.cssmoban.com/" title="��������" target="_blank">��������</a></p>
			</div>

</body>
</html>