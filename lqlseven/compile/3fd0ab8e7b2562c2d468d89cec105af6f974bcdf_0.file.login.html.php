<?php
/* Smarty version 3.1.31, created on 2017-11-23 17:46:31
  from "D:\WAMP\wamp\www\lqlseven\template\index\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a16fb6733d400_61182522',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3fd0ab8e7b2562c2d468d89cec105af6f974bcdf' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\login.html',
      1 => 1508860952,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a16fb6733d400_61182522 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo CSS_URL;?>
/bootstrap.css">
    <link rel="stylesheet" href="<?php echo CSS_URL;?>
/indexlogin.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/jquery-3.2.1.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/indexlogin.js"><?php echo '</script'; ?>
>
    <title>Login</title>
</head>
<body>
   <header>
       <main>
           <a href="index.php?m=index&f=index&a=init">
               <img src="<?php echo IMG_URL;?>
/logo.png" alt="">
           </a>
       </main>
   </header>
  <!--表单-->
   <section class="loginBox">
       <div class="title">登&nbsp;&nbsp;&nbsp;&nbsp; 录</div>
       <form action="index.php?m=index&f=login&a=check" method="post">
           <div class="uname">
               <span class="glyphicon glyphicon-user"></span>
               <input type="text" placeholder="请输入用户名" name="uname" >
           </div>
           <div class="upass">
               <span class="glyphicon glyphicon-lock"></span>
               <input type="password" placeholder="请输入密码" name="upass">
           </div>
           <div class="uphone">
               <span class="glyphicon glyphicon-earphone"></span>
               <input type="text" placeholder="请输入手机号" name="uphone">
           </div>
           <div class="sendphone">
               <div>发送验证码</div>
           </div>
           <div class="uphonecode">
               <span class="glyphicon glyphicon-wrench"></span>
               <input type="text" placeholder="请输入手机验证码" name="uphonecode" autocomplate="off">
           </div>
           <div class="ucode">
               <span class="glyphicon glyphicon-lock"></span>
               <input type="text" placeholder="请输入验证码" name="ucode" autocomplete="off">
           </div>
           <div class="senducode">
               <a href="" onclick="javascript:void(0);return false;" style="display:inline-block;">
                  <img src="index.php?m=index&f=login&a=code" onclick="this.src='index.php?m=index&f=login&a=code'" >
               </a>
           </div>
           <input type="submit" value="提        交">
       </form>
       <div class="register">
           <a href="index.php?m=index&f=index&a=init">返回首页</a>
           <a href="index.php?m=index&f=register&a=init">没有用户名，去注册</a>
       </div>
   </section>
</body>
</html><?php }
}
