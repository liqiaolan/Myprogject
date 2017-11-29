<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js/jquery-3.2.1.js"></script>
    <title>Document</title>
    <style>
        .content{
            width:300px;
            height:300px;
            border:1px solid #ccc;
            overflow:scroll;
        }
        *{
            font-size:16px;
            color:#7E7E7E;
            font-family:微软雅黑;
        }
        table{
            border-collapse: collapse;
        }
        th,td,tr{
            border:1px solid dimgrey;
            text-align:center;
            padding:5px 5px;
        }
        img{
            width:50px;
            height:50px;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>图片预览</th>
        <th>所属类别</th>
        <th>所属其他分类</th>
        <th>地址</th>
        <th>操作</th>
    </tr>
<!--    <img src="../php/root/17-10-08/15074336741675g1.jpg" alt="">-->
    <?php
    include '../php/db.php';
    $sql="select * from img";
    $result=$db->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    while($row=$result->fetch()){
//        $str=$row['iaddress'];
//        echo $str;
//        $a=str_split($str);
//        echo $a;
//        echo gettype($row['iaddress']) ;
        ?>

        <tr>
            <td><img src="../php/<?php echo $row['iaddress']?>" alt=""></td>
            <td><?php
                include '../php/db.php';
                $sql="select * from  classify where cid=".$row['pid'];
                $result1=$db->query($sql);
                $result1->setFetchMode(PDO::FETCH_ASSOC);
                $row1=$result1->fetch();
                echo $row1['cname'];
                ?></td>
            <td><?php
                include '../php/db.php';
                $sql="select * from  otherclassify  where oid=".$row['oid'];
                $result2=$db->query($sql);
                $result2->setFetchMode(PDO::FETCH_ASSOC);
                $row2=$result2->fetch();
                echo $row2['oname'];
                ?></td>
            <td>http://localhost/Best Pets/php/<?php echo $row['iaddress']?></td>
            <td>
                <button class="del"><a href="../php/delimg.php?iid=<?php echo $row['iid']?>">删除</a></button>
                <button class="edit"><a href="../index/editimg.php?iid=<?php echo $row['iid']?>">编辑</a></button>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>