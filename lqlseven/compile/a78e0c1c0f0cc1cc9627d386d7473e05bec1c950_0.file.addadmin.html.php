<?php
/* Smarty version 3.1.31, created on 2017-11-25 02:34:40
  from "D:\WAMP\wamp\www\lqlseven\template\admin\addadmin.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a18c8b0e0e813_42840132',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a78e0c1c0f0cc1cc9627d386d7473e05bec1c950' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\admin\\addadmin.html',
      1 => 1509614086,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a18c8b0e0e813_42840132 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加管理员</title>
    <link rel="stylesheet" href="<?php echo CSS_URL;?>
/bootstrap.css">
    <?php echo '<script'; ?>
 src="<?php echo LIBS_URL;?>
/upload.js"><?php echo '</script'; ?>
>
</head>
<style>
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
    <form action="index.php?m=admin&f=admin&a=addadminCheck" method="post">
        <div class="form-group">
            <label for="aname">管理员名称</label>
            <input type="text" class="form-control" id="aname" placeholder="管理员名称" name="aname" required>
        </div>
        <div class="form-group">
            <label for="apass">输入密码</label>
            <input type="password" class="form-control" id="apass" placeholder="密码" name="apass" required>
        </div>
        <div class="form-group">
            <label for="apass">再次输入密码</label>
            <input type="password" class="form-control" id="apassA" placeholder="密码" name="apassA" required>
        </div>
        选择管理员级别 <br> <br>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <label class="radio-inline">
            <input type="radio" name="lid" id="inlineRadio1" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['lid'];?>
" required><?php echo $_smarty_tpl->tpl_vars['v']->value['lname'];?>

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
        <input type="hidden" name="imgpath">
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
        var imgpath=document.querySelector('input[name=imgpath]');
        imgpath.value=e;
    });

<?php echo '</script'; ?>
>
<?php }
}
