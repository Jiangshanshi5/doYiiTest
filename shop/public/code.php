<?php
    session_start();
	//0 设置验证码的信息
	$leng = 4;
	$code = mycode($leng,1);
	$width = $leng*20;
	$height = 30;
    $_SESSION['mcode']=$code;//session的名字和验证码的名字不能一样
	//1 画布
	$im = imagecreatetruecolor($width,$height);
	$bg = imagecolorallocate($im,200,200,200);
	$c[0] = imagecolorallocate($im,255,0,0);//配饰颜色
	$c[1] = imagecolorallocate($im,0,255,0);
	$c[2] = imagecolorallocate($im,0,0,255);
	//2 作图
	imagefill($im,0,0,$bg);//填充颜色
	//在资源im上出现随机的字母和数字
	//imagettftext($im,20,0,5,25,$c[0],"MSYH.TTF",$code);
	for($i=0;$i<$leng;$i++){//字体大小，角度，坐标x,y.=========颜色===========字体========内容。
			 imagettftext($im,20,rand(-30,30),$i*20,rand(15,30),$c[rand(0,2)],"MSYH.TTF",$code[$i]);
	}
	//绘制干扰点
	$cc = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));//配置颜色
	for($i=0;$i<=100;$i++){
			imagesetpixel($im,rand(0,$width),rand(0,$height),$cc);//pixel点的意思。
	}
	//绘制干扰线
	//$cc = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
	for($i=0;$i<=5;$i++){
			imageline($im,rand(0,$width),rand(0,$height),rand(0,$width),rand(0,$height),$cc);
	}
	//3 导出
	header("Content-Type:image/png");
	imagepng($im);
	//4 释放
	imagedestroy($im);
	//5 出现随机码
	function mycode($length=4,$type=1){
		$str ="0123456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNOPQRST";
		$h = strlen($str)-1;
		switch($type){
			case 1: $h=9; break;
			case 2: $h=33; break;

		}
			$code = "";
		for($i=0;$i<$length;$i++){
			$code.=$str[rand(0,$h)];
		}
		return $code;

	}