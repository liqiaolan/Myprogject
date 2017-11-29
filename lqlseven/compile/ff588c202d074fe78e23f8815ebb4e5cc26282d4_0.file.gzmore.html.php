<?php
/* Smarty version 3.1.31, created on 2017-11-24 04:43:13
  from "D:\WAMP\wamp\www\lqlseven\template\index\gzmore.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a17955107bdc3_97287945',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff588c202d074fe78e23f8815ebb4e5cc26282d4' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\gzmore.html',
      1 => 1511494991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a17955107bdc3_97287945 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo CSS_URL;?>
/indexgzmore.css">
    <link rel="stylesheet" href="<?php echo ICONFONT_URL;?>
/iconfont.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/jquery-3.2.1.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/indexgzmore.js"><?php echo '</script'; ?>
>
    <title>更多关注</title>
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

   <section class="gzmore">
       <main>
           <div class="left">
               <div class="gemoreTop">点击关注</div>
               <div class="Box">
               <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['author']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                   <ul class="authorL">
                       <li>
                           <a href="index.php?m=index&f=author&a=authorList&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['uphoto'];?>
" alt="图片加载错误"></a>
                       </li>
                       <li>
                           <p style="font-size:16px;font-weight:bold;"><?php echo $_smarty_tpl->tpl_vars['v']->value['uname'];?>
</p>
                           <div class="acontent">
                               <p>关注<span><?php echo $_smarty_tpl->tpl_vars['v']->value['attentnum'];?>
</span></p>
                               <p>粉丝<span><?php echo $_smarty_tpl->tpl_vars['v']->value['fans'];?>
</span></p>
                               <p>文章<span><?php echo $_smarty_tpl->tpl_vars['v']->value['connum'];?>
</span></p>
                           </div>
                       </li>
                       <li  style="background:#ea6f5a;" class="guanzhuBox" uid1="<?php echo $_smarty_tpl->tpl_vars['uid1']->value;?>
" uid2="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
">
                               <span class="guanzhu" style="font-size:18px;letter-spacing: 1px;
                               color: #fff;">关注</span>
                           <span class="iconfont icon-guanzhu1"></span>
                       </li>
                   </ul>
               <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

               </div>
               <!--加载更多开始-->
               <div class="more" >
                   <main>
                       <a href="javascript:;"><div>加载更多</div></a>
                   </main>
               </div>
               <!--加载更多结束-->
           </div>
           <div class="right">
               <p>我们有最优秀的作者</p>
               <p>我们有最感动的故事</p>
               <p>我们有最真情的告白</p>
               <p>我们有最励志的警言</p>
               <p style="text-indent: 30px;">生活从来就不是容易的，当我们容易的时候必定有人为你承担着你的那份不易，希望我们每个人都能在 生活的舞台上做自己的主角，书写自己的精彩，成为自己希望成为的人,希望你也能认真的生活，对得起自己， 对得起时光.</p>
               <p style="text-indent: 30px;">
                   你一定要知道，努力不一定成功，甚至，你所付出的努力，大部分都是徒劳，根本看不到付出之后的回报。是的，你做对了一切，同样也很努力，可就是差那一点运气，让你总是与成功失之交臂。想象一下，如果是你遇到了这样的情况，你会用什么样的心态去面对生活。

                   是自怨自艾，还是怨天尤人，沉浸在失败的情绪中不能自拔，整天抱怨生活，抱怨生命中的一切，一朝被蛇咬，十年怕井绳，这一次失败之后，就整个摧毁了你，丧失了对自己所有的信心，没有勇气再次重整旗鼓。

                   是不是，还可以有别的选择，一种更好的选择。

               </p>
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
