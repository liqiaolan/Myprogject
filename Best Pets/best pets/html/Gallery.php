<?php
include '../../public/header.php';
include '../../public/url.php';
?>
<header>
    <link rel="stylesheet" href="<?php echo $cssurlF?>/footer.css">
    <script src="<?php echo $jsurlF?>/header.js"></script>
    <link rel="stylesheet" href="<?php echo $cssurlF?>/news.css" />
    <link rel="stylesheet" href="<?php echo $cssurlF?>/gallery.css">
    <link rel="stylesheet" href="<?php echo $cssurlF?>/galleryshow.css">
    <script src="<?php echo $jsurlF?>/gallery.js"></script>
    <script src="<?php echo $jsurlF?>/galleryshow.js"></script>
</header>
		<!--gallery开始-->
		<section class="gallery">
			<main>
				<div class="galleryTop">GALLERY</div>
				<div class="galleryNav">
                    <?php
                       include '../../php/db.php';
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

                    $sql2="select * from img where pid='{$cid}'and oid={$oid}";
                    $result2=$db->query($sql2);
                    $result2->setFetchMode(PDO::FETCH_ASSOC);
                       for($i=0;$i<3;$i++){
                           $flag=false;?>
                           <ul class="galleryul">
                               <?php
                                   for($j=0;$j<3;$j++){
                                    $row2=$result2->fetch();
                                    ?>

                                        <li iid="<?php echo $row2['iid']?>"  >
                       								<img src="../../php/<?php echo $row2['iaddress']?>" alt="" />
                       								<div class='gallerydiv'>
                       									<p>BEST PETS</p>
                       									<p></p>
                       									<p>Ne nam facilisis adolescens faucibus.</p>
                       								</div>
                       						</li>

                               <?php }?>

                           </ul>
                      <?php }?>

				</div>
			</main>
		</section>
		<!--gallery结束-->
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
    <!--galleryshow开始-->
    <section class="galleryshow">
        <!-- 左右箭头-->
        <div class="iconfont icon-zuoyoujiantouicon-defuben1"></div>
        <div class="iconfont icon-zuoyoujiantouicon-defuben"></div>
        <!--关闭按钮-->
        <div class="iconfont icon-close1"></div>
        <!-- 下载-->
        <div class="setinterval"></div>
        <a href="" onclick="javascript:void(0)" class="download" download="true">
            <div class="iconfont icon-icdownloadmd"></div></a>
        <!-- 顶层展示页数-->
        <div class="gallerypages"></div>
        <?php
        $sql2="select * from img where pid=4  and oid=6";
        echo $sql2;
        $result2=$db->query($sql2);
        $result2->setFetchMode(PDO::FETCH_ASSOC);
        $total=$result2->rowCount();
        while($row2=$result2->fetch()){ ?>
            <div class="show">
                <img src="../../php/<?php echo $row2['iaddress']?>" alt="No image find"
                     total="<?php echo $total?>" first="<?php echo $row2['iaddress']?>">  </div>
        <?php }?>

    </section>
    <!--galleryshow结束-->
	</body>
</html>
