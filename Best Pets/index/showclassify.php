<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        li{
            line-height:26px;
            font-size:18px;
            color:dimgrey;
            font-family:微软雅黑;
        }
        a{
            font-size:16px;
            color:#ccc;
            font-family:微软雅黑;
            text-decoration:none;
        }
    </style>
</head>
<body>
  
</body>
</html>
<?php
include '../php/db.php';
include '../libs/classify.php';
$obj=new trees();
$obj->show(0,$db,'classify',0,'');
echo $obj->ul;