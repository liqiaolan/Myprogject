<?php
/* Smarty version 3.1.31, created on 2017-11-27 14:33:48
  from "D:\WAMP\wamp\www\lqlseven\template\index\content.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a1c143cc0a157_35891275',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5e6e14c176019281d53d2ed463abf3b5c2e67d4' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\content.html',
      1 => 1511789626,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1c143cc0a157_35891275 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo CSS_URL;?>
/indexcontent.css">
    <link rel="stylesheet" href="<?php echo ICONFONT_URL;?>
/iconfont.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/jquery-3.2.1.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/indexcontent.js"><?php echo '</script'; ?>
>
    <title>内容页</title>
</head>
<body conid="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['conid'];?>
" uid2="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['uid'];?>
">
<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<!--回复成功的提示-->
<div class="success">
    回复成功
</div>
<!--评论不能为空提示-->
<div class="notice">
    回复内容不能为空
</div>
   <!--content开始-->
   <section class="con">
       <main>
           <div class="left">
               <div class="title"><?php echo $_smarty_tpl->tpl_vars['data']->value[0]['contitle'];?>
</div>
               <div class="author">
                   <a href="index.php?m=index&f=index&a=author&uid=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['uid'];?>
"}><img src="<?php echo IMG_URL;?>
/banner3.jpg" alt=""></a>
                   <span>
                       <a href="index.php?m=index&f=index&a=author&uid=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['uid'];?>
"}><?php echo $_smarty_tpl->tpl_vars['data']->value[0]['uname'];?>
</a>
                   </span>
                   <?php if ($_smarty_tpl->tpl_vars['self']->value) {?>
                       <?php if ($_smarty_tpl->tpl_vars['atstatus']->value) {?>
                       <a  style="background:#b1b0b0;padding:6px 14px;border-radius: 30px;line-height: 40px;cursor: pointer;" class="guanzhuBox"   uid1="<?php echo $_smarty_tpl->tpl_vars['uid1']->value;?>
">
                           <span class="guanzhu" style="font-size:18px;letter-spacing: 1px;
                           color: #fff;">已关注</span>
                           <span class="iconfont icon-guanzhu1"></span>
                       </a>
                       <?php } else { ?>
                       <a  style="background: #ea6f5a;padding:6px 14px;border-radius: 30px;line-height: 40px;cursor: pointer;" class="guanzhuBox"   uid1="<?php echo $_smarty_tpl->tpl_vars['uid1']->value;?>
">
                           <span class="guanzhu" style="font-size:18px;letter-spacing: 1px;
                           color: #fff;">关注</span>
                           <span class="iconfont icon-guanzhu1"></span>
                       </a>
                       <?php }?>
                   <?php } else { ?>
                   <a  style="display:inline-block;background:#b1b0b0;width:108px;height:34px;border-radius: 30px;opacity: 0" uid1="<?php echo $_smarty_tpl->tpl_vars['uid1']->value;?>
" class="guanzhuBox"></a>
                   <?php }?>
               </div>
               <div class="content">
                   <?php ob_start();
echo $_smarty_tpl->tpl_vars['data']->value[0]['conthumb'];
$_prefixVariable1=ob_get_clean();
if ($_prefixVariable1) {?>
                   <div class="cimg" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['conthumb'];?>
');"></div>
                   <?php }?>
                   <div class="Con">
                       <?php echo $_smarty_tpl->tpl_vars['data']->value[0]['content'];?>

                   </div>
                </div>
           </div>
           <div class="cbottom">
               <!--点赞，分享-->
               <div class="clike">
                   <div class="givelike" uid1="<?php echo $_smarty_tpl->tpl_vars['uid1']->value;?>
">
                       <span class="iconfont icon-dianzan" style="cursor: pointer"
                             glikeflag="<?php echo $_smarty_tpl->tpl_vars['glikeflag']->value;?>
" indexuname="<?php echo $_smarty_tpl->tpl_vars['indexuname']->value;?>
"></span>
                       <span><?php echo $_smarty_tpl->tpl_vars['glikeNum']->value;?>
</span>
                   </div>
                   <div class="givelike" uid1="<?php echo $_smarty_tpl->tpl_vars['uid1']->value;?>
">
                       <span class="iconfont icon-shoucangC"  style="cursor: pointer"
                             storeflag="<?php echo $_smarty_tpl->tpl_vars['storeflag']->value;?>
" indexuname="<?php echo $_smarty_tpl->tpl_vars['indexuname']->value;?>
"></span>
                       <span><?php echo $_smarty_tpl->tpl_vars['storeNum']->value;?>
</span>
                   </div>
                   <div class="share">
                       <div>
                           <a class="jiathis_button_tools_1">
                               <img src="<?php echo IMG_URL;?>
/qq.png" alt="">
                           </a>
                           <a class="jiathis_button_weixin">
                               <img src="<?php echo IMG_URL;?>
/weixin.png" alt="">
                           </a>
                           <a class="jiathis_button_tsina">
                               <img src="<?php echo IMG_URL;?>
/weibo.png" alt="">
                           </a>
                           <a class="jiathis_button_qzone">
                               <img src="<?php echo IMG_URL;?>
/qqkj.png" alt="">
                           </a>
                       </div>
                       <?php echo '<script'; ?>
 type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"><?php echo '</script'; ?>
>

                   </div>
               </div>
               <!--评论-->
               <form class="commentaries">
                   <span class="crest">剩余<span>200</span>个字</span>
                   <?php if ($_smarty_tpl->tpl_vars['indexuname']->value) {?>
                   <?php if ($_smarty_tpl->tpl_vars['list']->value['uphoto']) {?>
                   <a href="index.php?m=index&f=index&a=author&uid=<?php echo $_smarty_tpl->tpl_vars['list']->value['uid'];?>
">
                       <div class="authorimg"
                            style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['data']->value[0]["uphoto"];?>
')" ></div>
                   </a>
                   <?php } else { ?>
                   <a href="index.php?m=index&f=index&a=author&uid=<?php echo $_smarty_tpl->tpl_vars['list']->value['uid'];?>
">
                       <div class="authorimg"
                            style="background-image: url('<?php echo IMG_URL;?>
/headimg.png')" >
                       </div>
                   </a>
                   <?php }?>
                   <textarea placeholder="写下你的评论..." maxlength="200" class="textareaA"></textarea>
                   <div class="button">
                       <button type="button">发送</button>
                       <button type="reset">重置</button>
                   </div>
                   <?php } else { ?>
                   <a href="index.php?m=index&f=login&a=init">
                       <div class="authorimg"
                            style="background-image: url('<?php echo IMG_URL;?>
/headimg.png')" >
                       </div>
                   </a>
                   <a href="index.php?m=index&f=login&a=init" style="display:inline-block;position:absolute; top:32%;left:30%;cursor: pointer;border-radius: 30px;background: #ea6f5a;color:#fff;padding:8px 16px;letter-spacing: 2px;">请登录</a>
                   <textarea placeholder="写下你的评论..." maxlength="200" class="textareaA" disabled></textarea>
                   <div class="button">
                       <button type="button" disabled>发送</button>
                       <button type="reset" disabled>重置</button>
                   </div>
                   <?php }?>
               </form>
           <!--留言内容区-->
           <div class="commentBOX">

           </div>
           </div>
       </main>
   </section>
   <!--content结束-->

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
