<?php
include '../../public/header.php';
include '../../public/url.php';
?>
  <header>
      <link rel="stylesheet" href="<?php echo $cssurlF?>/about.css">
      <link rel="stylesheet" href="<?php echo $cssurlF?>/footer.css">
      <link rel="stylesheet" href="<?php echo $cssurlF?>/Hmore.css">
      <script src="<?php echo $jsurlF?>/animate.js"></script>
      <script src="<?php echo $jsurlF?>/gallery.js"></script>
      <script src="<?php echo $jsurlF?>/index.js"></script>
  </header>
        <!--About开始-->
        <section class="about">
            <main>
                <div class="aboutLeft">
                    <?php
                    $sql="select * from classify where cname='About'";
                    $result=$db->query($sql);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    $row=$result->fetch();
                    $cid=$row['cid'];

                    $sql1="select * from otherclassify where oname='lb'";
                    $result1=$db->query($sql1);
                    $result1->setFetchMode(PDO::FETCH_ASSOC);
                    $row1=$result1->fetch();
                    $oid=$row1['oid'];

                    $sql2="select * from img where pid='{$cid}'and oid={$oid}";
                    $result2=$db->query($sql2);
                    $result2->setFetchMode(PDO::FETCH_ASSOC);
                    $arr=array();
                    while($row2=$result2->fetch()){
                        $arr[]=$row2["ttitle"];
                        ?>
                        <li title="<?php echo $row2['ttitle']?>"  style="background:url('../../php/<?php echo $row2['iaddress']?>') no-repeat
                                center center;background-size: cover;cursor: pointer">
                        </li>

                    <?php }?>
                    <!--左右点击事件-->
                    <div class="aboutBtn">
                        <div class="aboutBback">
                            <span class='iconfont icon-zuojiantou'></span>
                        </div>
                        <div class="aboutBgo">
                            <span class='iconfont icon-youjiantou'></span>
                        </div>
                    </div>
                    <!--小圆点-->
                    <ul class="aboutD">
                        <?php
                        $sql="select * from classify where cname='About'";
                        $result=$db->query($sql);
                        $result->setFetchMode(PDO::FETCH_ASSOC);
                        $row=$result->fetch();
                        $cid=$row['cid'];

                        $sql1="select * from otherclassify where oname='lb'";
                        $result1=$db->query($sql1);
                        $result1->setFetchMode(PDO::FETCH_ASSOC);
                        $row1=$result1->fetch();
                        $oid=$row1['oid'];

                        $sql2="select * from img where pid='{$cid}'and oid={$oid}";
                        $result2=$db->query($sql2);
                        $result2->setFetchMode(PDO::FETCH_ASSOC);
                        while($row2=$result2->fetch()){?>
                            <li></li>
                        <?php }?>
                    </ul>
                    <!--底下的横条-->
                    <div class='abtransform'>
                        <div class="abtransformA"></div>
                    </div>
                </div>
                <div class="aboutRight">
                    <p><?php
                        $sql="select * from classify where cname='About'";
                        $result=$db->query($sql);
                        $result->setFetchMode(PDO::FETCH_ASSOC);
                        $row=$result->fetch();
                        $cid=$row['cid'];

                        $sql1="select * from otherclassify where oname='con'";
                        $result1=$db->query($sql1);
                        $result1->setFetchMode(PDO::FETCH_ASSOC);
                        $row1=$result1->fetch();
                        $oid=$row1['oid'];

                        $sql2="select * from contentnav where pid='{$cid}'and oid={$oid}";
                        $result2=$db->query($sql2);
                        $result2->setFetchMode(PDO::FETCH_ASSOC);
                        $row2=$result2->fetch();
                        echo $row2['ttitle'];
                        ?></p>
                    <p>We are committed to <i>protecting animals</i>
                        and providing you with
                        more knowledge about animals</p>
                    <p><?php echo $row2['tcon']?></p>
                    <p><a href="#"></a>Learn more</a></p>
                </div>
            </main>
        </section>
        <!--About结束-->
        <!--HOPA开始-->
        <section class="hopa">
        	<main>
        		<ul class="hopaNav">
        			<li>
        				<p class='iconfont icon-39'></p>
        				<p>Happy Clients</p>
        				<p style='color:#6495ED;'>157000</p>
        			</li>
        			<li>
        				<p class='iconfont icon-rili'></p>
        				<p>Our Events</p>
        				<p style='color:#6495ED;'>850</p>        				
        			</li>
        			<li>
        				<p class='iconfont icon-bao1'></p>
        				<p>Projects</p>
        				<p style='color:#6495ED;'>8000</p>        				
        			</li>
        			<li>
        				<p class='iconfont icon-2'></p>
        				<p>Awards</p>
        				<p style='color:#6495ED;'>269</p>        				
        			</li>        			
        		</ul>
        	</main>
        </section>
        <!--HOPA结束-->
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
        <!--freeNews开始-->
        <section class="freeNews">
           <div class="freemark">
        	<main>
        		<div class="freeNewsNav">
        			<p>GET OUR FREE NEWSLETTER</p>
        			<p>Nemo enim ipsam voluptatem quia 
        				voluptas sit aspernatur aut odit 
        				aut fugit, sed quia consequuntur 
        				magni dolores eos qui ratione 
        				voluptatem sequi nesciunt. Neque porro 
        				quisquam est consectetur adipisci velit 
        				sed quia non numquam eius.</p>
        			<input type="text" class='email'placeholder="Email Address" />
        			<input type="text" value="SUBSCRIBE" class="sub"/>
        			<p class="freeFooter">We never share your information or use it to spam you</p>
        		</div>
        	</main>
       	  </div>
        </section>
        <!--freeNews结束-->
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
        <!--about的more-->
        <section class='more'>
            <div class="amore" >
            </div>
        </section>
	</body>
    <script>
        $('.aboutLeft li').on('click',function(){
            let cw=innerWidth;
            let ch=innerHeight;
            $('.more').css({width:cw+'px',height:ch+100+'px',display:'block',});
            var ttitle=$(this).attr("title");
            $.ajax({
                url:"../../php/showMore.php",
                data:{ttitle},type:"get",
                accepts:{
                    json:"application/json"
                },
                dataType:"json",
                success:function (data) {
                    $('.amore').html(`
                 <div class="iconfont icon-close" ></div>
                <div class="amoreImg">
                    <img src="../../php/${data[0]['timg']}" alt="" />
                </div>
                <p style="font-size:32px;color:#6495ed;">Dogs have a monologue</p>
                <p style="font-size:16px;color:#999;line-height: 20px;">
                    &nbsp;&nbsp;${data[0]['tcon']}
                </p>
                `);
                }
            })
        })
        $('.more').on('click',".icon-close",function(){
            $('.more').css({display:'none'});
        })
    </script>
</html>
