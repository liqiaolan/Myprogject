<?php
  include '../../public/header.php';
  include '../../php/db.php';
  $tid=$_GET['tid'];
?>
<header>
    <link rel="stylesheet" href="<?php echo $cssurlF?>/newsshow.css">
    <link rel="stylesheet" href="<?php echo $cssurlF?>/footer.css">
</header>
<section class="newsshow">
    <main>
        <?php
           $sql="select * from contentnav where tid=".$tid;
           $result=$db->query($sql);
           $result->setFetchMode(PDO::FETCH_ASSOC);
           while($row=$result->fetch()){ ?>
               <div class="ttitle"><?php  echo $row['ttitle']?></div>
               <div class="content">
                    <div class="contentcon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['tcon']?></div>
                    <div class="contentimg" style="background-image:url(<?php echo $phpurl?>/<?php echo $row['timg']?>)">
                        <div class="contentmark"
                             style="background-image:url(<?php echo $phpurl?>/<?php echo $row['timg']?>)" >Best Pets</div>
                    </div>
               </div>
               <div class="Content">
                  <?php echo $row['tcontent']?>
               </div>
          <?php }?>
        <div class="BA">
            <?php
              $sql1="select * from contentnav where tid<{$tid} and pid=7 and oid=6 order by tid desc";
              $result1=$db->query($sql1);
            $result1->setFetchMode(PDO::FETCH_ASSOC);
              if($result1->rowCount()){
                  $row1=$result1->fetch();  ?>
                  <a href="showNews.php?tid=<?php echo $row1['tid']?>">上一篇:
                      <i><?php echo $row1['ttitle']?></i></a>
             <?php }else{ ?>
                  <a href="">上一篇: <i>No news find</i></a>
            <?php } ?>

            <?php
            $sql1="select * from contentnav where tid>{$tid} and pid=7 and oid=6";
            $result1=$db->query($sql1);
            $result1->setFetchMode(PDO::FETCH_ASSOC);
            if($result1->rowCount()){
                $row1=$result1->fetch();  ?>
                <a href="showNews.php?tid=<?php echo $row1['tid']?>">上一篇:
                    <i><?php echo $row1['ttitle']?></i></a>
            <?php }else{ ?>
                <a href="">上一篇: <i>No news find</i></a>
            <?php } ?>
        </div>
    </main>
</section>
<!--footerdh开始-->
<section class="footerdh">
    <main>
        <ul class="footerdhN">
            <li>
                <div class="fdhlogo">
                    <a href="index.php">Best Pets</a>
                </div>
                <p>
                    Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit.
                    Nam eget egestas erat. In hac
                    habitasse platea dictumst.
                </p>
            </li>
            <li>
                <h1>NAVIGATION</h1>
                <ul class='fdhul'>
                    <?php
                    include '../../php/db.php';
                    $sql="select * from classify where pid=0";
                    $result=$db->query($sql);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    while($row=$result->fetch()){
                        if($row['cname']=='Home'){?>
                            <li><a href="../index.php"><?php echo $row['cname']?></a></li>
                        <?php }else if($row['cname']=='Pages'){?>
                            <?php
                            $sql1="select cid from classify where cname='Pages'";
                            $result1=$db->query($sql1);
                            $result1->setFetchMode(PDO::FETCH_ASSOC);
                            $row1=$result1->fetch();
                            $cid=$row1['cid'];
                            $sql2="select * from classify where pid=".$cid;
                            $result2=$db->query($sql2);
                            $result2->setFetchMode(PDO::FETCH_ASSOC);
                            while($row2=$result2->fetch()){ ?>
                                <li> <a href="../html/<?php echo $row2['cname']?>.php"><?php echo $row2['cname']?></a></li>
                            <?php  }?>
                        <?php }else{?>
                            <li><a href="../html/<?php echo $row['cname']?>.php"><?php echo $row['cname']?></a></li>
                        <?php }}?>

                </ul>
            </li>
            <li>
                <h1>LATEST POSTS</h1>
                <ul class='fdhul'>
                    <li>
                        <span class="iconfont icon-jiantou1you"></span>

                        Vestibulum ante ipsum
                    </li>
                    <li>
                        <span class="iconfont icon-jiantou1you"></span>
                        Phasellus at eros
                    </li>
                    <li>
                        <span class="iconfont icon-jiantou1you"></span>
                        Mauris eleifend aliquet
                    </li>
                    <li>
                        <span class="iconfont icon-jiantou1you"></span>
                        Aliquam vitae tristique
                    </li>
                    <li>
                        <span class="iconfont icon-jiantou1you"></span>
                        Pellentesque lobortis
                    </li>
                    <li>
                        <span class="iconfont icon-jiantou1you"></span>
                        Class aptent taciti
                    </li>
                </ul>
            </li>
            <li>
                <h1>TWITTER POSTS</h1>
                <ul class='fdhul'>
                    <li>Ut aut reiciendis voluptatibus </li>
                    <li><a href="">http://example.com</a> alias, ut aut.</li>
                    <li>
                        <span class="iconfont icon-bird"></span>
                        02 days ago</li>
                    <li>Itaque earum rerum hic tenetur a </li>
                    <li>sapiente <a href="">http://example.com</a> ut aut.</li>
                    <li>
                        <span class="iconfont icon-bird"></span>
                        03 days ago</li>
                </ul>
            </li>
        </ul>
    </main>
</section>
<!--footerdh结束-->
<!--footer开始-->
<footer>
    Copyright © 2017.Company Name All Rights Reserved.
</footer>
<!--footer结束-->
 </body>
 </html>
