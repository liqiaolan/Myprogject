<?php 
 session_start();
 include '../public/url.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Best Pets</title>
		<link rel="stylesheet" href="iconfont/iconfont.css" />
		<link rel="stylesheet" type="text/css" href="css/footer.css"/>
		<link rel="stylesheet" href="css/login.css" />
		<link rel="stylesheet" href="css/Hmore.css" />
        <link rel="stylesheet" href="css/user.css">
		<link rel="stylesheet" href="css/index.css" />
		<script src="js/animate.js"></script>
        <script src="../js/jquery-3.2.1.js"></script>
        <script src="../js/jquery.validate.js"></script>
        <script src="js/more.js"></script>
        <script src='js/login.js'></script>
        <script src="js/index.js"></script>

	</head>
	<body>
		<!--固定定位开始-->
		<section class="fixed">
			<a class="iconfont icon-arrow-circle-top" href="#"></a>
		</section>
		<!--固定定位结束-->
		<!--定位搜索开始-->
		<section class="searchForm">
			<main>
				<input type="text" />
				<button type="submit">SEARCH</button>
			</main>
		</section>
		<!--定位搜索结束-->
		<!--header开始-->
		<header>
			<div class="headermask">
				<main>
                <!-- 用户信息开始-->
                    <?php
                    if(isset($_SESSION['uname'])){?>
                        <div class="user">
                        <span>Welcome To Best Pets</span>
                        <img src="img/20170903175213.jpg" alt=""style="width:40px;height:40px;border-radius:50%;">
                        <a href='<?php echo $phpurl?>./signout.php'>Sign Out</a>
                        <span>Personal</span>
                        <span class="iconfont icon-love"></span>
                        <span class="iconfont icon-share"></span>
                        <span class="iconfont icon-love1"></span>
                        <span><?php echo $_SESSION['uname']?></span>
                        </div>

                    <?php }?>
                    <?php
                    if(!isset($_SESSION['uname'])){?>
                        <div class="user">
                            <span>Welcome To Best Pets</span>
                            <img src="img/20170903175213.jpg" alt=""style="width:40px;height:40px;border-radius:50%;">
                            <a class="login">SignIn</a>
                            <span>Personal</span>
                            <span class="iconfont icon-love"></span>
                            <span class="iconfont icon-share"></span>
                            <span class="iconfont icon-love1"></span>

                        </div>
                    <?php } ?>

                <!-- 用户信息结束-->
				<!--header的top开始-->
					<div class="bestpets">
						    <div class="logoBox">
								<div class="logo">
									<a href="index.php">Best Pets</a>
								</div>
							</div>	
							<div class="loginBox">
								<div class="login">Login</div>
								<div class="callUs">
									<span>Callus : </span>
									<span>(+00) 123 234</span>
								</div>
							</div>	
						</div>
				<!--header的top结束-->
				<!--nav开始-->
				    <nav>
<!--						<ul class="nav">-->
<!--							<li><a href="" style="color:#F44336">Home</a></li>-->
<!--							<li><a href="html/about.html">About</a></li>-->
<!--							<li>-->
<!--								<span>Pages</span>-->
<!--								<span class="iconfont icon-unie628" id='sjx'></span>-->
<!--						        <div class="page">-->
<!--						        	<a href="html/news.html">News</a>-->
<!--						        	<a href="html/video.html">Videos</a>-->
<!--						        </div>-->
<!--							</li>-->
<!--							<li><a href="html/gallery.html">Gallery</a></li>-->
<!--							<li><a href="html/contact.html">Contact</a></li>-->
<!--						</ul>-->
                        <ul class="nav">
                            <?php
                               include '../php/db.php';
                                $sql="select * from classify where pid=0";
                                $result=$db->query($sql);
                                $result->setFetchMode(PDO::FETCH_ASSOC);
                               while($row=$result->fetch()){
                                   if($row['cname']=='Home'){?>
                                       <li><a href="" style="color:#F44336;"><?php echo $row['cname']?></a></li>
                                     <?php }else if($row['cname']=='Pages'){?>
                                       <li style="position:relative;">
                                           <span>Pages</span>
                                           <span class="iconfont icon-unie628" id='sjx'></span>
                                           <div class="page">

<!--                                    --><?php
                                    $sql1="select cid from classify where cname='Pages'";
                                    $result1=$db->query($sql1);
                                    $result1->setFetchMode(PDO::FETCH_ASSOC);
                                    $row1=$result1->fetch();
                                    $cid=$row1['cid'];
                                    $sql2="select * from classify where pid=".$cid;
                                    $result2=$db->query($sql2);
                                    $result2->setFetchMode(PDO::FETCH_ASSOC);
                                    while($row2=$result2->fetch()){ ?>
                                        <a href="html/<?php echo $row2['cname']?>.php"><?php echo $row2['cname']?></a>
                                      <?php  }?>
                                       </div>
                                       </li>
                                           <?php }else{?>
                                <li><a href="html/<?php echo $row['cname']?>.php"><?php echo $row['cname']?></a></li>

                              <?php }}?>
                        </ul>
					 <div class="minnav">
						<ul class="nav1">
							<div class="nav1-1"></div>
							<div class="nav1-2"></div>
							<div class="nav1-3"></div>
						</ul>
						<div class="navNav">
							<li><a href="" style="color:#F44336">Home</a></li>
							<li><a href="html/about.html">About</a></li>
							<li>
								<span>Pages
									<span class="iconfont icon-unie628" id='sjx'></span>
								</span>
							</li>
							<li>
						        <div class="page">
						        	<a href="html/news.html">News</a>
						        	<a href="html/videos.html">Videos</a>
						        </div>
							</li>
							<li><a href="">Gallery</a></li>
							<li><a href="html/contact.html">Contact</a></li>
						</div>
					 </div>
				    </nav>
				<!--welcome开始-->
				<div class="welcomeBox">
					<div class="welcome">
						<div class="welcomeTop"></div>
						<div class="welcomeCenter">
							<div class="welcomeCP">
								<p>Animals are our best friends</p>
								<p></p>
							</div>	
						</div>
						<div class="welcomeBottom"></div>
					</div>
					<ul class="welcomeF">
						<li class='iconfont icon-f1'></li>
						<li class='iconfont icon-bird'></li>
						<li class='iconfont icon-diqiu'></li>
						<li class='iconfont icon-v'></li>
					</ul>
				</div>
				<!--welcome结束-->
				</main>				
			</div>
		</header>
		
		<!--header结束-->
        <!--free开始-->
        <section class="free">
        	<li>
        		<div class="freeliBox">
        			<div class="freelBleft">
        				<p class="iconfont icon-community"></p>
        				<div></div>
        			</div>
        			<div class="freelBright">
        				<p>Free Consultation</p>
        				<p>Here we will provide you 
        					with the most comprehensive 
        					and detailed information</p>
        			</div>
        		</div>
        	</li>
        	<li>
        		<div class="freeliBox">
        			<div class="freelBleft">
        				<p class="iconfont icon-icon"></p>
        				<div></div>
        				
        			</div>
        			<div class="freelBright">
        				<p>Free Consultation</p>
        				<p>You can ask questions about any pet raising,
        					 animal protection, etc</p>
        			</div>
        		</div>        		
        	</li>
        	<li>
        		<div class="freeliBox">
        			<div class="freelBleft">
        				<p class="iconfont icon-25kongxinpinglun"></p>
        				<div></div>
        			</div>
        			<div class="freelBright">
        				<p>Free Consultation</p>
        				<p>You can also learn more 
        					about animal welfare activities here</p>
        			</div>
        		</div>        		
        	</li>
        </section>
        <!--free结束-->
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
                         <li title="<?php echo $row2['ttitle']?>"  style="background:url('../php/<?php echo $row2['iaddress']?>') no-repeat
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
        		    <p><a href="html/About.php"></a>Learn more</a></p>
        		</div>
        	</main>
        </section>
        <!--About结束-->
        <!--service开始-->
        <section class="service">
        	<main>
        		<div class="serviceHead">OUR SERVICES</div>
        		<ul class="serviceNav">
        			<li>
        				<div></div>        					
        				<p>
        					<span class="iconfont icon-homefill"></span>
        				</p>
        				<p>KNOWLEDGE OF PET</p>
        				<p>Here, we will provide you with a 
        					comprehensive pet breeding knowledge.
        				</p>
        			</li>
        			<li>
        				<div></div>         				
        				<p>
        					<span class="iconfont icon-list"></span>
        				</p>
        				<p>ANIMAL WELFARE</p>
        				<p>Here is the latest 
        					news about animal welfare activities, 
        					you can be at any time.
        				</p>        				
        			</li>
        			<li>
        				<div></div>         				
        				<p>
        					<span class="iconfont icon-evaluate"></span>
        				</p>
        				<p>ONLINE CUSTOMER SERIVICE</p>
        				<p>We have 24 hours online customer 
        					service to solve your problem.
        					 We hope you can offer us your 
        					 proposal at any time 
        				</p>        				
        			</li>
        			<li>
        				<div></div>         				
        				<p>
        					<span class="iconfont icon-diqiu"></span>
        				</p>
        				<p>TOP TEAM SUPPORT</p>
        				<p>We have a top team that can serve you,
        					 help you with pet raising issues and 
        					 animal protection measures
        				</p>        				
        			</li>
        		</ul>
        	</main>
        </section>
        <!--service结束-->
        <!--customer开始-->
        <section class="customer">
        	<main>
        		<div class="customerLeft"></div>
        		<div class="customerRight">
        			<p>Best Pets</p>
        			<p><?php
                        $sql="select * from classify where cname='Home'";
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
                        ?>
        			<p><?php echo $row2['tcon']?></p>
        			<p>Learn more</p>
        		</div>
        	</main>
        </section>
        <!--customer结束-->
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
                            include '../php/db.php';
                            $sql="select * from classify where pid=0";
                            $result=$db->query($sql);
                            $result->setFetchMode(PDO::FETCH_ASSOC);
                            while($row=$result->fetch()){
                                if($row['cname']=='Home'){?>
                                    <li><a href="#"><?php echo $row['cname']?></a></li>
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
                                               <li> <a href="html/<?php echo $row2['cname']?>.php"><?php echo $row2['cname']?></a></li>
                                            <?php  }?>
                                <?php }else{?>
                                    <li><a href="html/<?php echo $row['cname']?>.php"><?php echo $row['cname']?></a></li>
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
        <!--登录注册的实现-->
        <section class='logreg' style='display: none;'>
        	    <div id="login">
        <div class='iconfont icon-close'></div>
        <ul class="classify">
            <li>LOGIN</li>
            <li>REGISTER</li>
        </ul>
        <div class="loginbox">
            <?php  ?>
             <form class="message1" action='../php/login.php' method='post'>
                 <div style="position:relative;">
                     <input type="text"  placeholder='Username' name="uname" id="unameA"/>
                     <span class="iconfont icon-tubiao_biaoqing"></span>
                     <label id="uname-error" class="error" for="uname" ></label>
                 </div>
                 <div style="position:relative;">
                     <input type="password"  placeholder='Password' name="upassword" id="upasswordA"/>
                     <span class="iconfont icon-tubiao_biaoqing"></span>
                     <label id="uname-error" class="error" for="upasswordA"></label>
                 </div>

             	<div class="checkbox">
	             	<label for="" class='label'>
	             	    <input type="checkbox" name='checkbox' />
	             	    <div class="iconfont icon-duihao1"></div>
	             	    <span  class="remember">Remember me?</span>
	             	</label>
             	</div>
             	<input type="submit" value='LOGIN' />
             </form>
             <form class="message2" action='../php/register.php' method='post'>
                  <div style="position:relative;">
                      <input type="text"  placeholder='Username' name="uname" id="unameB" />
                      <label id="uname-error" class="error" for="unameB"></label>
                  </div>
                  <div style="position:relative;">
                      <input type="password"  placeholder='Password' name="upassword" id="upasswordB"/>
                      <label id="uname-error" class="error" for="upasswordB"></label>
                  </div>
                  <div style="position:relative;">
                      <input type="text"  placeholder='Passwordagain' name="upassworda" id="upasswordaB"/>
                      <label id="uname-error" class="error" for="upasswordaB"></label>
                  </div>
             	<div class="checkbox">
	             	<label for="" class='label'>
	             	    <input type="checkbox" name='checkbox' />
	             	    <div class="iconfont icon-duihao1"></div>
	             	    <span  class="remember">I accept the terms of use</span>
	             	</label>
             	</div>
             	<input type="submit" value='REGISTER' />
             </form>
        </div>
    </div>
        </section>     
        <!--about的more-->
        <section class='more'>
            <div class="amore" >
            </div>
        </section>
	</body>
</html>

