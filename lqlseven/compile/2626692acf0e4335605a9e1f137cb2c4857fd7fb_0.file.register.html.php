<?php
/* Smarty version 3.1.31, created on 2017-11-24 17:15:13
  from "D:\WAMP\wamp\www\lqlseven\template\index\register.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a184591d525b2_93920730',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2626692acf0e4335605a9e1f137cb2c4857fd7fb' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\register.html',
      1 => 1511076426,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a184591d525b2_93920730 (Smarty_Internal_Template $_smarty_tpl) {
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
/indexregister.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/jquery-3.2.1.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/jquery.validate.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/indexregister.js"><?php echo '</script'; ?>
>
    <title>Register</title>
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
    <div class="title">注 &nbsp;&nbsp;&nbsp; &nbsp;册</div>
    <form action="index.php?m=index&f=register&a=check" method="post">
        <div class="uname">
            <span class="glyphicon glyphicon-user"></span>
            <input type="text" placeholder="请输入用户名" name="uname" autocomplete="off"  id="uname">
            <label id="uname-error" class="error" for="uname"></label>
        </div>
        <div class="upass">
            <span class="glyphicon glyphicon-lock"></span>
            <input type="password" placeholder="请输入密码" name="upass" autocomplete="off" id="upass">
            <label id="upass-error" class="error"  for="upass" ></label>
        </div>
        <div class="upassA">
            <span class="glyphicon glyphicon-lock"></span>
            <input type="password" placeholder="请再次输入密码" name="upassA" autocomplete="off"  id="upassA">
            <label id="upassA-error" class="error" for="upassA"></label>
        </div>
        <div class="uphone">
            <span class="glyphicon glyphicon-earphone"></span>
            <input type="text" placeholder="请输入手机号" name="uphone" autocomplete="off">
            <label id="uphone-error" class="error" for="uphone"></label>
        </div>
        <div class="sendphone">
            <div>发送验证码</div>
        </div>
        <div class="uphonecode">
            <span class="glyphicon glyphicon-wrench"></span>
            <input type="text" placeholder="请输入手机验证码" name="uphonecode" autocomplete="off">
            <label id="uphonecode-error" class="error" for="uphonecode"></label>
        </div>
        <div class="ucode">
            <span class="glyphicon glyphicon-lock"></span>
            <input type="text" placeholder="请输入验证码" name="ucode" autocomplete="off">
            <label id="ucode-error" class="error" for="ucode"></label>
        </div>
            <div class="senducode">
                <a href="" onclick="javascript:void(0);return false;" style="display:inline-block;">
                    <img src="index.php?m=index&f=register&a=code" onclick="this.src='index.php?m=index&f=register&a=code'" >
                </a>
            </div>
            <input type="submit" value="注        册">
    </form>
    <div class="register">
        <a href="index.php?m=index&f=index&a=init">返回首页</a>
        <a href="index.php?m=index&f=login&a=init">有用户名，去登录</a>
    </div>
</section>
</body>
</html><?php }
}
