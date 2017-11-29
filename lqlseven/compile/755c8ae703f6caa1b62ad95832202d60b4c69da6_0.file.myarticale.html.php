<?php
/* Smarty version 3.1.31, created on 2017-11-24 18:38:02
  from "D:\WAMP\wamp\www\lqlseven\template\index\myarticale.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a1858fae5cd19_90950578',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '755c8ae703f6caa1b62ad95832202d60b4c69da6' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\myarticale.html',
      1 => 1511544895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1858fae5cd19_90950578 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\WAMP\\wamp\\www\\lqlseven\\libs\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\WAMP\\wamp\\www\\lqlseven\\libs\\smarty\\plugins\\modifier.truncate.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo ICONFONT_URL;?>
/iconfont.css">
    <link rel="stylesheet" href="<?php echo CSS_URL;?>
/myarticale.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/jquery-3.2.1.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/myarticale.js"><?php echo '</script'; ?>
>
    <title>我的文章</title>
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <section class="content">
        <main>
            <ul class="articles">
               <li>我的文章 <span><?php echo count($_smarty_tpl->tpl_vars['lists']->value);?>
</span></li>
               <li>
                   <span style="color:#ea6f5a;" class="asc">按时间正序</span>
                   <span class="desc">按时间倒序</span>
               </li>
            </ul>
            <ul class="Con">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lists']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                <li>
                    <div class="leavemessage">
                        <div class="ltitle">
                            <a href=""><?php echo $_smarty_tpl->tpl_vars['v']->value['contitle'];?>
</a>
                            <div class="ltime">
                                <div class="ltimeti"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['condate'],'%Y-%m-%d');?>
</div>
                            </div>
                        </div>
                        <div class="lcon">
                            <a href="index.php?m=index&f=content&a=init&conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
" style="display: block;">
                                <div class="limg" style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['v']->value["conthumb"];?>
')"></div>
                            </a>

                            <div class="lcontent">
                                <?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['content'];
$_prefixVariable1=ob_get_clean();
echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_prefixVariable1),170,"......",true);?>

                            </div>
                        <div class="lmore"><a href="index.php?m=index&f=content&a=init&conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
">阅读文章</a></div>
                        </div>
                        <div class="lfooter">
                            <a href="">
                                <span>作者:&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['indexuname']->value;?>
</span>
                            </a>
                            <a href="">
                                <span class="iconfont icon-liulan"></span>
                                <?php echo $_smarty_tpl->tpl_vars['v']->value['hnum'];?>

                            </a>
                            <a href="">
                                <span class="iconfont icon-dianzan"></span>
                                <?php echo $_smarty_tpl->tpl_vars['v']->value['glikeNum'];?>

                            </a>
                            <a href="">
                                <span class="iconfont icon-shoucangC"></span>
                                <?php echo $_smarty_tpl->tpl_vars['v']->value['storeNum'];?>

                            </a>
                            <a href="">
                                <span class="iconfont icon-huifu"></span>
                                <?php echo $_smarty_tpl->tpl_vars['v']->value['mnum'];?>

                            </a>
                        </div>
                    </div>
                </li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            </ul>
        </main>
    </section>
</body>
</html><?php }
}
