 <?php
 include '../../public/header.php';
?>
        <header>
            <link rel="stylesheet" href="../css/footer.css">
            <script src="../js/header.js"></script>
            <link rel="stylesheet" href="../css/contact.css">
            <script src='../js/node.js'></script>
            <script src='../js/contact.js'></script>
        </header>
		<!--contact开始-->
		<section class="contact">
			<main>
				<div class="contactTop">CONTACT US</div>
				<ul class="contactway">
					<li>
						<p><span class='iconfont icon-homefill'></span></p>
				    	<h3>Visit Us</h3>
				    	<h4>Beijing,Shanghai,Guangzhou</h4>
					</li>
					<li>
						<p><span class='iconfont icon-duanxin'></span></p>
				    	<h3>Mail Us</h3>
				    	<h4><a href="mailto:info@example.com"> mail@example.com</a></h4>
					</li>
					<li>
						<p><span class='iconfont icon-mobile'></span></p>
				    	<h3>Call Us</h3>
				    	<h4>+01 222 333 4444</h4>
					</li>
				</ul>
			    <ul class="contactNav">
			    	<li>
                        <ul class="subinfor">
                            <li>
                                <div class="headpicture">
                                    <img src="../img/6.jpg" alt="" />
                                </div>
                                <div class="look">
                                        <h2>HOSETER</h2>
                                        <h3>mail@example.com &nbsp; +01 222 333 4444</h3>
                                        <h4>Because of your Suggestions, we will be
                                            better. You are welcome to leave your suggestion,
                                            and we hope you will join in the animal protection team.
                                        </h4>
                                </div>
                            </li>

                                <?php
                                   include '../../php/db.php';
                                   $sql="select * from leavemessage  order by lid desc limit 0,2";
                                   $result=$db->query($sql);
                                   $result->setFetchMode(PDO::FETCH_ASSOC);
                                   while($row=$result->fetch()){ ?>
                                       <li>
                                           <div class="headpicture">
                                               <img src="../img/9.jpg" alt="" />
                                           </div>
                                           <div class="look">
                                               <h2><?php echo $row['lname']?></h2>
                                               <h3><?php echo $row['lemile']?> &nbsp; <?php echo $row['lmobile']?></h3>
                                               <h4><?php echo $row['lmessage']?></h4>
                                           </div>
                                       </li>
                                   <?php } ?>
			    		</ul>
			    	   <div class="pw">Please feel free to give us any comments</div>
			    	</li>
			    	<li>
                        <form action="<?php echo $phpurl?>/leavemessage.php" id="register" method="post">
                            <?php
                            if(isset($_SESSION['uname'])){?>
                                <input type="text" placeholder='User Name' required="required" form="register"
                                   value="<?php echo $_SESSION['uname']?>" id="uname" name="lname" readonly />
                            <?php }else if(!isset($_SESSION['uname'])){?>
                                <input type="text" placeholder='User Name' required="required" form="register"
                                   value="" id="uname"/>
                            <?php }?>
                            <input type="email" placeholder='User Email' required='required' form="register" name="lemile"/>
                            <input type="text" placeholder='Mobile Number' required='required' form="register"name="lmobile"/>
                            <!--<input type="file" placeholder='Head port'/>-->
                            <textarea  id="message" cols="30" rows="10"
                                placeholder='请留下您的足迹' maxlength='200'  name="lmessage"></textarea>
                           <?php
                             if(isset($_SESSION['uname'])) {?>
                            <button type="submit" class="submit"
                                    form="register" lname="<?php echo $_SESSION['uname']?>">Submit</button>
                            <?php }else if(!isset($_SESSION['uname'])){?>
                            <button class="submit" onclick="javascript:alert('Please Login');return false;">Submit</button>
                           <?php  } ?>
                        </form>

                    </li>
			    </ul>

			</main>
		</section>
		<!--contact结束-->
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
