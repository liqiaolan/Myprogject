<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/galleryshow.css">
    <link rel="stylesheet" href="../iconfont/iconfont.css">
    <script src="../../js/jquery-3.2.1.js"></script>
    <script src="../js/galleryshow.js"></script>
    <title>Document</title>
</head>
<body>
   <section class="galleryshow">

                <?php
                include '../../php/db.php';
                include '../../public/url.php';
                $iid=$_GET['iid'];

                $sql="select * from classify where cname='Gallery'";
                $result=$db->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $row=$result->fetch();
                $cid=$row['cid'];

                $sql1="select * from otherclassify where oname='con'";
                $result1=$db->query($sql1);
                $result1->setFetchMode(PDO::FETCH_ASSOC);
                $row1=$result1->fetch();
                $oid=$row1['oid'];


                $sql3="select * from img where iid=".$iid;
                $result3=$db->query($sql3);
                $result3->setFetchMode(PDO::FETCH_ASSOC);
                $row3=$result3->fetch();

                $sql2="select * from img where pid='{$cid}'and oid={$oid}";
                $result2=$db->query($sql2);
                $result2->setFetchMode(PDO::FETCH_ASSOC);
                $total=$result2->rowCount();
                while($row2=$result2->fetch()){ ?>
                    <div class="show">
                    <img src="../../php/<?php echo $row2['iaddress']?>" alt="No image find"
                         total="<?php echo $total?>" first="<?php echo $row3['iaddress']?>">  </div>
                <?php }?>

           <div class="show">
           <img src="../../php/<?php echo $row3['iaddress']?>" alt="No image find"
                total="<?php echo $total?>">  </div>


       <!-- 左右箭头-->
       <div class="iconfont icon-zuoyoujiantouicon-defuben1"></div>
       <div class="iconfont icon-zuoyoujiantouicon-defuben"></div>
       <!--关闭按钮-->
       <div class="iconfont icon-close1"></div>
       <!-- 下载-->
       <div class="setinterval"></div>
       <a href="" onclick="javascript:void(0)" class="download">
           <div class="iconfont icon-icdownloadmd"></div></a>
       <!-- 顶层展示页数-->
       <div class="gallerypages"></div>
   </section>
</body>
</html>