<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table{
            width:200px;
            height:200px;
            border:1px solid dimgrey;
            border-collapse:collapse;
            margin-top:30px;
            margin-left:20px;
        }
        th,td,tr{
            text-align:center;
            border:1px solid dimgrey;
            color:dimgrey;
        }
        a{
            text-decoration:none;
            font-size:16px;
            color:dimgrey;
            font-family:微软雅黑;
        }
    </style>
    <title>查看其他分类</title>
</head>
<body>
    <table>
        <tbody>
           <tr>
               <th>OID</th>
               <th>ONAME</th>
               <th>OPERATION</th>
           </tr>
           <?php
               include '../php/db.php';
               $sql="select * from otherclassify";
               $result=$db->query($sql);
               $result->setFetchMode(PDO::FETCH_ASSOC);
              while($row=$result->fetch()) {  ?>
                  <tr>
                      <td><?php echo $row['oid']?></td>
                      <td><?php echo $row['oname']?></td>
                      <td>
                          <button><a href="../php/delother.php?oid=<?php echo $row['oid']?>">删除</a></button>
                          <button><a href="editother.php?oid=<?php echo $row['oid']?>">编辑</a></button>
                      </td>
                  </tr>
              <?php }?>
        </tbody>
    </table>
</body>
</html>