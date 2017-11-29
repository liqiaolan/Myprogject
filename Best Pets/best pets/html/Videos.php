<?php
   include '../../public/header.php';
?>
<header>
        <link rel="stylesheet" href="../css/about.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/Hmore.css">
        <script src="../js/animate.js"></script>
        <script src="../js/index.js"></script>
        <link rel="stylesheet" href="../css/videos.css" />
        <script src='../js/gallery.js'></script>
</header>
		<!--profile开始-->
		<section class="profile">
			<main>
                <div class="profileTop">Profile</div>
						&nbsp;&nbsp;<?php
                            include '../../php/db.php';
                    $sql="select * from classify where cname='Videos'";
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
                    while($row2=$result2->fetch()){?>
				<div class="profileNav">
				    <div class="profileNavLeft">
						<div class="profileNavLeft1">
							<div class="box1-1"></div>
						    <div class="box1-img"><img src="../img/2.jpg" alt=""></div>
							<div class="box1-2">BEST PETS!</div>
						</div>
				    </div>
					<div class="profileNavRight">
                        <?php echo $row2['tcon']?>
                        </div>
				</div>
                     <?php }?>

<!--				<div class="profileNav">-->
<!--					<div class="profileNavLeft">-->
<!--						<div class="profileNavLeft2">-->
<!--					    	<div class="box10-img">-->
<!--					    	   <img src="../img/6.jpg" alt="" />-->
<!--					    	   <div class="box10-1"></div>-->
<!--					    	</div>-->
<!--					    	<div class="box10-2">BEST PETS!</div>-->
<!--						</div>-->
<!--				    </div>-->
<!--					<div class="profileNavRight">-->
<!--						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Life-->
<!--						everywhere is full of surprises, but lacking-->
<!--						 the eyes to find beauty, when you for every-->
<!--						 life can be equal to look at, you will find-->
<!--						 life everywhere is a good thing, animals are-->
<!--						  our best friends, we should treat our friends. If one day there is only one world left for us to live, how to talk about beauty.-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="profileNav">-->
<!--					<div class="profileNavLeft">-->
<!--						<div class="profileNavLeft3">-->
<!--					    	<div class="box11-img">-->
<!--					    		<img src="../img/7.jpg" alt="" />-->
<!--					    		<div class="box11-1"></div>-->
<!--					    	</div>-->
<!--					    	<div class="box11-2">BEST PETS!</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="profileNavRight">-->
<!--						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pet-->
<!--						breeding is a very profound knowledge,-->
<!--						 pets are not just gave him food and water,-->
<!--						  and his friends is our pets and the high-->
<!--						  level, animals also have feelings, they-->
<!--						  are more focused than human beings, human-->
<!--						  life can be a lot of pets, but you will only-->
<!--						   recognize you a pet life master, they treat-->
<!--						   affection is very pure, without any-->
<!--						    utilitarian, we should treat our pets-->
<!--						    to treat our friends and relatives.-->
<!--					</div>-->
<!--				</div>-->
			</main>
		</section>
		<!--profile结束-->
		<!--videos开始-->
		<section class="videos">
			<main>
				<div class="videoTop">Videos</div>
				<ul class="video">
					<li>
						<video width="340" height="194" src="../video/n1739vu1b4u.mp4"
							preload='auto' poster='../img/g2-2.jpg' 
							controls="controls">
						</video>
					</li>
					<li>
						<video width="340" height="194" src="../video/s1717pxpd48.mp4"
							preload='auto' poster='../img/g5-5.jpg' 
							controls="controls">
						</video>						
					</li>
					<li>
						<video width="340" height="194" src="../video/x1697qdeknw.mp4"
							preload='auto' poster='../img/g4-4.jpg' 
							controls="controls">
						</video>						
					</li>
				</ul>
			</main>
		</section>
		<!--videos结束-->
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
