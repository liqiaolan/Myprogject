<?php
session_start();
$str='3456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$vcode='';
for($i=0;$i<4;$i++){
    $vcode.=$str[mt_rand(0,strlen($str)-1)];
}
$_SESSION['vcode']=$vcode;
//该地址相对于本身
$url='vcode.php';
echo <<<EOT
<body style="margin: 0;padding: 0">
<span style="color:#b6b6b6;font-size:20px;width:88px;height:36px;
letter-spacing: 2px;padding:0 5px" onclick="location.href='$url'">$vcode</span> 
</body> 
EOT;
