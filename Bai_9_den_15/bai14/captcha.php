<?php
session_start();
if(!function_exists('imagecreatetruecolor')){http_response_code(500);exit('PHP GD extension is required');}
$chars='ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
$code='';for($i=0;$i<6;$i++)$code.=$chars[random_int(0,strlen($chars)-1)];
$_SESSION['captcha']=$code;
$im=imagecreatetruecolor(170,60);
$bg=imagecolorallocate($im,245,248,252);imagefill($im,0,0,$bg);
for($i=0;$i<7;$i++){$c=imagecolorallocate($im,random_int(100,210),random_int(100,210),random_int(100,210));imageline($im,0,random_int(0,60),170,random_int(0,60),$c);}
for($i=0;$i<6;$i++){$c=imagecolorallocate($im,random_int(20,100),random_int(20,100),random_int(20,100));imagestring($im,5,12+$i*25,20+random_int(-5,5),$code[$i],$c);}
header('Content-Type: image/png');header('Cache-Control: no-store, no-cache, must-revalidate');imagepng($im);imagedestroy($im);
