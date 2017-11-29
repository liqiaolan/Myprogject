<?php
/* Smarty version 3.1.31, created on 2017-11-24 17:57:05
  from "D:\WAMP\wamp\www\lqlseven\template\index\categoryMore.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a184f61c438d7_71195046',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8501304df020c17fbaace679b5f27cc998ecee5' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\categoryMore.html',
      1 => 1511542624,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a184f61c438d7_71195046 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo CSS_URL;?>
/indexcategoryMore.css">
    <link rel="stylesheet" href="<?php echo ICONFONT_URL;?>
/ICONFONT.css">
    <title>查看更多分类</title>
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <!--内容开始-->
    <section class="content">
        <main>
            <div class="storeTitle">
                <span class="iconfont icon-jiaotongshishilukuangiconfont-"></span>
                <span>热门专题</span>
            </div>
            <div class="contentBottom">
                <ul>
               <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                     <li>
                        <div class="modules">
                            <a href="index.php?m=index&f=index&a=category&cid=<?php echo $_smarty_tpl->tpl_vars['v']->value['cid'];?>
">
                                <img src="<?php echo IMG_URL;?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['cimg'];?>
.png" alt="">
                            </a>
                            <p><?php echo $_smarty_tpl->tpl_vars['v']->value['cname'];?>
</p>
                            <p><?php echo mb_substr($_smarty_tpl->tpl_vars['v']->value['cinfo'],0,30);?>
 </p>
                            <div  class="GZ">
                                <a href="index.php?m=index&f=index&a=category&cid=<?php echo $_smarty_tpl->tpl_vars['v']->value['cid'];?>
">
                                    <span class="iconfont icon-zengjia2"></span>
                                    进入
                                </a>
                            </div>
                            <hr noshade size="1" color="#eaeaea">
                            <p><span><?php echo $_smarty_tpl->tpl_vars['v']->value['connum'];?>
</span>篇文章 · 欢迎进入</p>
                        </div>
                    </li>
               <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                </ul>
            </div>
        </main>
    </section>
    <!--内容结束-->
    <!--footer开始-->
    <footer>
        <main>
            <p>
                ©2016-2017 山西朔州爱因特有限公司 / 简书 / 晋ICP备11018329号-5 / 晋公网安备31010402002252号
            </p>
            <p>晋公网安备31010402002252号 / 举报电话：021-34770013</p>
        </main>
    </footer>
    <!--footer结束-->
</body>
</html><?php }
}
