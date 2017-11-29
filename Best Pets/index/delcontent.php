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
        }
        td{
            padding:5px 5px;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>标题</th>
        <th>所属类别</th>
        <th>所属其他分类</th>
        <th>操作</th>
    </tr>

    <?php
    include '../php/db.php';
    $sql="select * from contentnav";
    $result=$db->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    while($row=$result->fetch()){  ?>
        <tr>
            <td><?php echo $row['ttitle']?></td>
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
            <td>
                <a href="../php/delcontent.php?tid=<?php echo $row['tid']?>"><button>删除</button></a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>