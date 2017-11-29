<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../iconfont/iconfont.css" />
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/login.css">
    <script src="../../js/jquery-3.2.1.js"></script>
    <script src="../../js/jquery.validate.js"></script>
    <script src='../js/loginclassify.js'></script>
    <script src="../js/header.js"></script>
</head>
<style>
    *{
        margin:0;
        padding:0;
    }
    .aboutRight>p:nth-child(4)>a{
        color:#212121;
    }
    .aboutRight>p:nth-child(4):hover{
        transition:all .5s ease;
        border:1px solid #6495ed;
    }
    .aboutRight>p:nth-child(4)>a:hover{
        color:#6495ed;
    }
</style>
<body>
<!--header开始-->
<header>
    <div class="headermask">
        <main>
            <!-- 用户信息开始-->
            <?php
            include '../../public/url.php';
            if(isset($_SESSION['uname'])){?>
                <div class="user">
                    <span>Welcome To Best Pets</span>
                    <img src="../img/20170903175213.jpg" alt=""style="width:40px;height:40px;border-radius:50%;">
                    <a href='../../php/signout.php'>Sign Out</a>
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
                    <img src="../img/20170903175213.jpg" alt=""style="width:40px;height:40px;border-radius:50%;">
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
                        <a href="../index.php">Best Pets</a>
                    </div>
                </div>
                <div class="loginBox">
                    <div class="login" style="color:#fff;">Login</div>
                    <div class="callUs">
                        <span>Callus : </span>
                        <span>(+00) 123 234</span>
                    </div>
                </div>
            </div>
            <!--header的top结束-->
            <!--nav开始-->
            <nav>
                <ul class="nav">
                    <?php
                    include '../../php/db.php';
                    $sql="select * from classify where pid=0";
                    $result=$db->query($sql);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    while($row=$result->fetch()){
                        if($row['cname']=='Home'){ ?>
                            <li><a href="../index.php" style="color:#F44336">Home</a></li>
                        <?php }else if($row['cname']=='Pages'){?>
                            <li style="position:relative;">
                                <span>Pages</span>
                                <span class="iconfont icon-unie628" id='sjx'></span>
                                <div class="page">
                                    <?php
                                      $sql1="select * from classify  where pid=".$row['cid'];
                                      $result1=$db->query($sql1);
                                      $result1->setFetchMode(PDO::FETCH_ASSOC);
                                      while($row1=$result1->fetch()){?>
                                          <a href="<?php echo $row1['cname']?>.php"><?php echo $row1['cname']?></a>
                                      <?php } ?>


                                </div>
                            </li>
                        <?php }else{ ?>
                            <li><a href="<?php echo $row['cname']?>"><?php echo $row['cname']?></a></li>
                        <?php } }?>
                </ul>
                <div class="minnav">
                    <ul class="nav1">
                        <div class="nav1-1"></div>
                        <div class="nav1-2"></div>
                        <div class="nav1-3"></div>
                    </ul>
                    <div class="navNav">
                        <li><a href="../index.php" style="color:#F44336">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li>
								<span>Pages
									<span class="iconfont icon-unie628" id='sjx'></span>
								</span>
                        </li>
                        <li>
                            <div class="page">
                                <a href="News.php">News</a>
                                <a href="Videos.php">Videos</a>
                            </div>
                        </li>
                        <li><a href="Gallery.php">Gallery</a></li>
                        <li><a href="Contact.php">Contact</a></li>
                    </div>
                </div>
            </nav>
        </main>
    </div>
</header>
<!--header结束-->
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
            <form class="message1" action='../../php/login.php' method='post'>
                <div style="position:relative;">
                    <input type="text"  placeholder='Username' name="uname" id="unameA"/>
                    <span class="iconfont icon-tubiao_biaoqing"></span>
                    <label id="uname-error" class="error" for="unameA" ></label>
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
            <form class="message2" action='../../php/register.php' method='post'>
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