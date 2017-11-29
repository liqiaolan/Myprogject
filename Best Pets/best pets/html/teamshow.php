<?php
 include '../../public/header.php';
 include '../../public/url.php';
 include  '../../php/db.php';
?>
<header>
    <link rel="stylesheet" href="<?php echo $cssurlF?>/teamshow.css">
    <link rel="stylesheet" href="<?php echo $cssurlF?>/about.css">
    <link rel="stylesheet" href="<?php echo $cssurlF?>/footer.css">
    <link rel="stylesheet" href="../iconfont/iconfont.css">
    <title>Team Show</title>
</header>
<!--人物介绍-->
<section class="teamshow">
    <main>
        <?php
           $tid=$_GET['tid'];
           $sql="select * from contentnav where tid=".$tid;
           $result=$db->query($sql);
           $result->setFetchMode(PDO::FETCH_ASSOC);
           $row=$result->fetch();
        ?>
        <div class="Name"><?php echo $row['ttitle']?></div>
        <div class="personCon">
           <div class="Headimg" style="background:url(<?php echo $phpurl?>/<?php echo $row['timg']?>)">
             <div class="HeadimgMark">
                 <?php echo $row['ttitle']?>
             </div>
           </div>
            <div class="content">
                <div class="motto">Motto :  You just do it, God has it!</div>
                Aenean pulvinar ac enimet posuere tincidunt velit Utin tincidunt
                <p>
                    Master message:This world, this time, as long as we think we
                    can do a lot of things, change a lot of things, because believe
                    so see, believe our dream, the future will be better.
                </p>
            </div>
        </div>
        <div class="Content">
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['tcontent']?>
        </div>
    </main>
</section>
<!--team开始-->
<section class="team">
    <main>
        <div class="teamTop">OUR TEAM</div>
        <ul class="teamNav">
            <?php
            $sql="select * from classify where cname='About'";
            $result=$db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row=$result->fetch();
            $cid=$row['cid'];

            $sql1="select * from otherclassify where oname='footer'";
            $result1=$db->query($sql1);
            $result1->setFetchMode(PDO::FETCH_ASSOC);
            $row1=$result1->fetch();
            $oid=$row1['oid'];

            $sql2="select * from contentnav where pid='{$cid}'and oid={$oid}";
            $result2=$db->query($sql2);
            $result2->setFetchMode(PDO::FETCH_ASSOC);
            while($row2=$result2->fetch()){?>
                <li style="background: url('../../php/<?php echo $row2['timg']?>')
                    no-repeat center center/contain;">
                    <a href="teamshow.php?tid=<?php echo $row2['tid']?>" >
                        <div class="teamPart">
                            <h2><?php echo $row2['ttitle']?></h2>
                            <h3><?php echo $row2['tcon']?></h3>
                            <h4>
                                <ul class="h4">
                                    <li class='iconfont icon-f1'></li>
                                    <li class='iconfont icon-bird'></li>
                                    <li class='iconfont icon-songqiu'></li>
                                </ul>
                            </h4>
                        </div>
                    </a>
                </li>
            <?php  }?>
        </ul>
    </main>
</section>
<!--team结束-->
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
