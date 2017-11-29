<?php
include '../../public/header.php';
include '../../public/url.php';
?>
<header>
    <link rel="stylesheet" href="<?php echo $cssurlF?>/footer.css">
    <script src="<?php echo $jsurlF?>/animate.js"></script>
    <script src="<?php echo $jsurlF?>/header.js"></script>
    <script src="<?php echo $jsurlF?>/news.js"></script>
    <link rel="stylesheet" href="<?php echo $cssurlF?>/news.css" />
</header>
	    <!--new开始-->	
	<section class="new">
		<main>
		<!--newTop和showTop样式一样-->
		<div class="newTop">News</div>
            <?php
            include '../../php/db.php';
            $sql="select * from classify where cname='News'";
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
            $num=1;
            while($row2=$result2->fetch()){?>
                <ul class="newNav">
                       <a href="<?php echo $htmlurlF?>/showNews.php?tid=<?php echo $row2['tid']?>">
                            <li style="background-image:url(<?php echo $phpurl?>/<?php echo $row2['timg']?>)">
                              <div class="newNavmask">
                                  <?php echo $row2['ttitle']?>
                              </div>
                            </li>
                       </a>
                        <li>
                            <div class="new01">
                                <?php
                                  echo '0'.($num++);
                                ?>
                                <div class="new01word">
                                    <?php echo $row2['ttitle']?><br />
                                     <span>THE ANIMAL</span>
                                     <span>KINGDOM </span>
                                </div>
                            </div>
                            <div class="mainli">
                                <div class='newzs'>
                                    <p></p>
                                </div>
                                <div class="newtd">
                                    <p><?php echo $row2['tcon']?></p>
                                </div>
                                <a href="<?php echo $htmlurlF?>/showNews.php?tid=<?php echo $row2['tid']?>">
                                <div class="more">
                                    MORE
                                </div>
                                </a>
                            </div>
                        </li>
                </ul>
            <?php }?>
		</main>
	</section>	     
	    <!--new结束-->	
		
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
	</body>
</html>
