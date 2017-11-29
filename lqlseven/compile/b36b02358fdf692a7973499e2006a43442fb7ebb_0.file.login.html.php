<?php
/* Smarty version 3.1.31, created on 2017-11-25 02:34:33
  from "D:\WAMP\wamp\www\lqlseven\template\admin\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a18c8a9eff241_90727087',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b36b02358fdf692a7973499e2006a43442fb7ebb' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\admin\\login.html',
      1 => 1509693449,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a18c8a9eff241_90727087 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo CSS_URL;?>
/adminlogin.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/jquery-3.2.1.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/adminlogo.js"><?php echo '</script'; ?>
>
    <title>lqlseven后台管理系统</title>
</head>
<body>
<div class="title">博客后台管理系统</div>
<div class="login">
    <p>登录信息页</p>
    <form action="index.php?m=admin&f=login&a=logincheck" method="post">
        <label for="">
            <input type="text" name="aname" placeholder="用户名" autocomplete="off" autofocus value="<?php echo $_smarty_tpl->tpl_vars['cookieaname']->value;?>
">
        </label>
        <label for="">
            <input type="password" name="apassword" placeholder="输入密码" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['cookieapass']->value;?>
">
        </label>
        <label for="" id="imgyzm" cookie="<?php echo $_smarty_tpl->tpl_vars['cookieaname']->value;?>
" style="display: none">
            <input type="text" name="code" id="lyzm" placeholder="验证码" autocomplete="off">
            <div class="code">
                <img src="index.php?m=admin&f=login&a=code" alt="加载出错" title="点击换下一张"  onclick="this.src='index.php?m=admin&f=login&a=code'">
            </div>
        </label>
        <div class="lfooter">
            <button type="submit" >确认</button>
        </div>
        <div class="link">
            <span><input type="checkbox" checked >记住密码</span>
            <span><a href="index.php?m=index&f=index&a=init">回首页</a></span>
            <input type="hidden" name="cookiePass">
        </div>
    </form>

</div>
</body>
<?php echo '<script'; ?>
>
    if($('#imgyzm').attr('cookie')==""){
        $('#imgyzm').css({
            display:'flex',
        })
    }
    //复选框勾选状态发生改变时，如果未勾选则清除cookie
    $('input[type=checkbox]').on('change',function(){
        if(!this.checked){
           $.ajax({
               url:'index.php?m=admin&f=login&a=cookiedel',
               type:'post',
               success:function(e){
                  if(e=='ok'){
                      $('#imgyzm').css({
                          display:'flex',
                      })
                  }
               }
           })
        }
    });
    $('input[name=aname],input[name=apassword]').on('keydown',function () {
        $.ajax({
            url:'index.php?m=admin&f=login&a=cookiedel',
            type:'post',
            success:function(e){
                if(e=='ok'){
                    $('#imgyzm').css({
                        display:'flex',
                    })
                }
            }
        })
    })
    //设置记住密码的value值
    var checkboxs=document.querySelector('input[type=checkbox]');
      $("form").submit(function () {
          if(checkboxs.checked){
              $('input[type=hidden]').val('1')
          }else if(!checkboxs.checked){
              $('input[type=hidden]').val('0')
          }
      })


<?php echo '</script'; ?>
>
</html><?php }
}
