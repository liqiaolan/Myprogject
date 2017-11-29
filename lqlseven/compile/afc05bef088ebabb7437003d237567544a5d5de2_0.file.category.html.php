<?php
/* Smarty version 3.1.31, created on 2017-11-24 18:09:29
  from "D:\WAMP\wamp\www\lqlseven\template\index\category.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a185249caf312_94488620',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afc05bef088ebabb7437003d237567544a5d5de2' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\category.html',
      1 => 1511543368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a185249caf312_94488620 (Smarty_Internal_Template $_smarty_tpl) {
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
/indexcategory.css">
    <title>分类页</title>
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <!--thematic开始-->
    <section class="thematic">
        <main>
            <div class="left">
                <div class="leftTop">
                    <img src="<?php echo IMG_URL;?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['cimg'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['cname'];?>
" style="border:1px solid #f0f0f0">
                    <div class="topmiddle">
                       <p><?php echo $_smarty_tpl->tpl_vars['data']->value['cname'];?>
</p>
                        <p>收录了<span><?php echo $_smarty_tpl->tpl_vars['connum']->value;?>
</span>篇文章 · 谢谢阅览</p>
                    </div>
                    <div class="topright">
                        <?php if ($_smarty_tpl->tpl_vars['indexuname']->value) {?>
                        <a href="index.php?m=index&f=article&a=articaleCheck"><p>投稿</p></a>
                        <?php } else { ?>
                        <a href="index.php?m=index&f=login&a=init"><p>投稿</p></a>
                        <?php }?>
                        <a href="javascript:;"><p>
                            <span class="iconfont icon-zengjia2"></span>&nbsp;欢迎</p></a>
                    </div>
                </div>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lists']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                <div class="leftBottom">
                    <div class="leavemessage">
                        <div class="ltitle">
                            <a href="index.php?m=index&f=content&a=init&conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['contitle'];?>
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
echo $_smarty_tpl->tpl_vars['v']->value["content"];
$_prefixVariable1=ob_get_clean();
echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_prefixVariable1),170,"...",true);?>

                            </div>
                         <div class="lmore"><a href="index.php?m=index&f=content&a=init&conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
">阅读全文</a></div>
                        </div>
                        <div class="lfooter">
                            <a href="index.php?m=index&f=index&a=author&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
">
                                <span>作者:&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value['uname'];?>
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
                </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            </div>
            <div class="right">
               <div class="rightTop">
                   <p>专题公告</p>
                   <p style="margin-bottom: 10px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['cinfo'];?>
</p>
                   <p>投稿须知：</p>
                   <p>读书专题仅收录与读书有关的书评、读书笔记、阅读方法、读书清单等文章。
                       文中不得出现非简书的链接；包括但不限于公众号、二维码、头条号、微博、一点资源等带有广告性质的信息；配图不能带有水印。
                       文章收录字数1000字起（大神请忽略此限制），请不要直接摘抄原文的话就来投稿。
                       请注意排版美观、请不要密集投稿。
                       如有关于文章的收录问题请私信【许境一】，主编个人首页： </p>
               </div>
                <div class="rightMiddle">
                        <span>分享到</span>
                        <a href=""><img src="<?php echo IMG_URL;?>
/qq.png" alt=""></a>
                        <a href=""><img src="<?php echo IMG_URL;?>
/weixin.png" alt=""></a>
                        <a href=""><img src="<?php echo IMG_URL;?>
/weibo.png" alt=""></a>
                        <a href=""><img src="<?php echo IMG_URL;?>
/qqkj.png" alt=""></a>
                </div>
            </div>
        </main>
    </section>
    <!--thematic结束-->
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
