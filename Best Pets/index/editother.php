<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        *{
            margin:0;
            padding:0;
            font-size:16px;
            color:#7E7E7E;
            font-family:微软雅黑;
            margin-left:20px;
            margin-top:10px;
        }
        input[type=text]{
            border-radius:2px;
            border:1px solid #ccc;
            line-height:30px;
            padding-left:5px;
        }
        input[type=submit]{
            width:80px;
            height:30px;
            border-radius:2px;
            border:none;
            color:dimgrey;
        }
    </style>
    <title>添加其他分类</title>
</head>
<body>
<form action="../php/editother.php" method="post">
    <?php
    $oid=$_GET['oid'];
    include '../php/db.php';
    $sql="select oname from otherclassify where oid={$oid}";
    $result=$db->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row=$result->fetch();
    $oname=$row['oname'];
    ?>
    其他分类<input type="text" name="oname" value="<?php echo $oname?>">
    <br><br>
    <input type="hidden" name="oid" value="<?php echo $oid?>">
    <input type="submit" value="添加">
</form>
</body>
</html>