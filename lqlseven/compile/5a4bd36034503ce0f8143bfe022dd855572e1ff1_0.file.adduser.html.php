<?php
/* Smarty version 3.1.31, created on 2017-11-25 02:40:27
  from "D:\WAMP\wamp\www\lqlseven\template\admin\adduser.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a18ca0bc68022_82921684',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a4bd36034503ce0f8143bfe022dd855572e1ff1' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\admin\\adduser.html',
      1 => 1510124794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a18ca0bc68022_82921684 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加用户</title>
    <link rel="stylesheet" href="<?php echo CSS_URL;?>
/bootstrap.css">
    <?php echo '<script'; ?>
 src="<?php echo LIBS_URL;?>
/upload.js"><?php echo '</script'; ?>
>
</head>
<style>
    body{
        padding:0 0 30px 0;
    }
    .container{
        margin-top:30px;
        width:60%;
        margin-bottom:30px;
    }
    .parent{
        color:#333;
    }
</style>
<body>
<div class="container">
    <form action="index.php?m=admin&f=user&a=adduserCheck" method="post">
        <div class="form-group">
            <label for="uname">用户名称</label>
            <input type="text" class="form-control" id="uname" placeholder="用户名称" name="uname" required>
        </div>
        <div class="form-group">
            <label for="upass">输入密码</label>
            <input type="password" class="form-control" id="upass" placeholder="密码" name="upass" required>
        </div>
        <div class="form-group">
            <label for="upassA">再次输入密码</label>
            <input type="password" class="form-control" id="upassA" placeholder="密码" name="upassA" required>
        </div>
        <div class="form-group">
            <label for="unicheng">用户昵称</label>
            <input type="text" class="form-control" placeholder="用户昵称" id="unicheng" name="unicheng">
        </div>
        <div class="form-group">
            <label for="uphone">用户电话</label>
            <input type="text" class="form-control" placeholder="用户电话" id="uphone" name="uphone">
        </div>
        选择用户角色 <br> <br>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lists']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <label class="radio-inline">
            <input type="radio" name="rid" id="inlineRadio1" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['rid'];?>
" required><?php echo $_smarty_tpl->tpl_vars['v']->value['rname'];?>

        </label>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

        <br> <br>
        上传头像
        <br>
        <div class="parent">

        </div>
        <input type="hidden" name="uphoto">
        <br>
        <button type="submit" class="btn btn-default">添加</button>
    </form>
</div>
</body>
</html>
<?php echo '<script'; ?>
>
    let upload=new Upload();
    upload.selectBtnStyle="width:130px;height:40px;background:#6d6d73;" +
        "border-radius:5px;";
    upload.upBtnStyle="width:130px;height:40px;background:#3c4c87;" +
        "border-radius:5px;clear:both;";
    upload.createView({
        parent:document.querySelector('.parent'),
    });
    upload.up('index.php?m=admin&f=admin&a=Upload',function (e) {
        var uphoto=document.querySelector('input[name=uphoto]');
        uphoto.value=e;
    });

<?php echo '</script'; ?>
>
<?php }
}
