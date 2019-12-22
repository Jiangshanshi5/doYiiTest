<?php
    
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head id="Head1">
    <title>顶部</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
        BODY
        {
            padding-right: 0px;
            padding-left: 0px;
            padding-bottom: 0px;
            margin: 0px;
            padding-top: 0px;
            
        }
        BODY
        {
            font-size: 12px;
            color: #003366;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }
        TD
        {
            font-size: 12px;
            color: #003366;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }
        DIV
        {
            font-size: 12px;
            color: #003366;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }
        P
        {
            font-size: 12px;
            color: #003366;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }
        a{
				text-decoration:none; /*去掉下划线*/
                color:white;

			}
        a:hover{
				background:pink;
				color:blue;
			}
        small:hover{
            background:yellow;
				color:red;
        }
        small{
            float:right;
            margin-top:0px;
        }
    </style>
    <meta content="MSHTML 6.00.2900.3492" name="GENERATOR">
</head>
<body>
    <form id="form1" name="form1" action="YHTop.aspx" method="post">
    <table cellspacing="0" cellpadding="0" width="100%" border="0">
        <tbody>
            <tr>
                <td width="10">
                    <img src="../images/new_001.jpg" border="0">
                </td>
                <td background="../images/new_002.jpg">
                    <font size="1"><small>&nbsp;&nbsp;&nbsp;您的登录时间为:<?php echo $_SESSION['time']; ?></small></font><br>
                    <font size="5"><b>&nbsp;&nbsp;&nbsp;<a href="../index.php" target="_top" title="返回上一级目录" >商城后台管理系统</a></b></font>
                </td>
                
                <td background="../images/new_002.jpg">
                    <table cellspacing="0" cellpadding="0" width="100%" border="0">
                        <tbody>
                            <tr>
                                <td align="right" height="35">
                                </td>
                            </tr>
                            <tr>
                                <td height="35">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width="10">
                    <img src="../images/new_003.jpg" border="0">
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</body>
</html>
