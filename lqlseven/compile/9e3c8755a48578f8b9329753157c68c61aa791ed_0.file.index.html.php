<?php
/* Smarty version 3.1.31, created on 2017-11-25 02:34:38
  from "D:\WAMP\wamp\www\lqlseven\template\admin\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a18c8ae2a4044_62449392',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e3c8755a48578f8b9329753157c68c61aa791ed' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\admin\\index.html',
      1 => 1510124379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a18c8ae2a4044_62449392 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>BLOG后台管理系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo CSS_URL;?>
/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_URL;?>
/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_URL;?>
/main-min.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="header">

    <div class="dl-title">
        <a href="http://www.builive.com" title="文档库地址" target="_blank"><!-- 仅仅为了提供文档的快速入口，项目中请删除链接 -->
            BLOG后台管理系统
        </a>
    </div>
    <div class="dl-log"><img src="<?php echo APP_URL;?>
/<?php echo $_smarty_tpl->tpl_vars['aphoto']->value;?>
" alt="" style="width:30px;height:30px;border-radius: 50%;margin-right:20px;">欢迎您<span class="dl-log-user">&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['adminname']->value;?>
&nbsp;&nbsp;</span><a href="index.php?m=admin&f=login&a=loginout" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
</div>
<div class="content">
    <div class="dl-main-nav">
        <div class="dl-inform"></div>
        <ul id="J_Nav"  class="nav-list ks-clear">
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">管理员管理</div></li>
            <li class="nav-item"><div class="nav-item-inner nav-order">用户管理</div></li>
            <li class="nav-item"><div class="nav-item-inner nav-inventory">用户操作</div></li>
            <li class="nav-item"><div class="nav-item-inner nav-supplier">分类管理</div></li>
            <li class="nav-item"><div class="nav-item-inner nav-marketing">推荐位</div></li>
        </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten" style="position: relative">

    </ul>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo JS_URL;?>
/jquery-1.8.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo JS_URL;?>
/bui-min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo JS_URL;?>
/config-min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo JS_URL;?>
/admin.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
