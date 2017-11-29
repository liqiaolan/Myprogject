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
        div{
            margin-top:0;
            margin-left:0;
        }
    </style>
    <title>Document</title>
</head>
<body>
<form action="../php/editclassify.php" method="get">

    所属分类:  <select  name='pid'  >
        <option   value="0">
            一级分类
        </option>
        <?php
        include '../php/db.php';
        include '../libs/classify.php';
        $cid=$_GET['cid'];
        $obj=new trees();
        $obj->tree(0,$db,'classify',0,'-&nbsp;',$cid);
        echo $obj->str;
        $sql="select * from classify where cid=".$_GET["cid"];
        $result=$db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row=$result->fetch();
        ?>
    </select><br><br>
    分类名称: <input type="text" name="cname" value="<?php echo $row['cname']?>"><br><br>
    <input type="hidden" name="cid" value="<?php echo $cid?>">
    <input type="submit" value="修改分类">
</form>
</body>
</html>