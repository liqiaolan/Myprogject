<?php
/* Smarty version 3.1.31, created on 2017-11-25 02:34:38
  from "D:\WAMP\wamp\www\lqlseven\template\admin\adminmanage.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a18c8aeec1c18_31490513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cdb2c8d626f3b6cca16e95519b9299f80e036353' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\admin\\adminmanage.html',
      1 => 1510064401,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a18c8aeec1c18_31490513 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/jquery-3.2.1.js"><?php echo '</script'; ?>
>
    <title>管理员管理</title>
</head>
<body>
<div class="container" style="margin-top:30px;">
<table class="table table-hover" style="font-size:14px; ">
    <tr>
        <th>管理员名称</th>
        <th>管理员级别</th>
        <th>管理员头像</th>
        <th>操作</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lists']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
    <tr>
        <th><?php echo $_smarty_tpl->tpl_vars['v']->value['aname'];?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['v']->value['lname'];?>
</th>
        <th><img src="<?php echo APP_URL;?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['aphoto'];?>
" alt="" style="width:30px;height:30px;border-radius: 50%;"></th>
        <th>
            <a href="index.php?m=admin&f=admin&a=del&aid=<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
" style="text-decoration: none">删除</a>
            <a href="index.php?m=admin&f=admin&a=editadmin&aid=<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
" style="text-decoration: none">编辑</a>
        </th>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

</table>
    <?php echo $_smarty_tpl->tpl_vars['pages']->value;?>

</div>
</body>
</html><?php }
}
