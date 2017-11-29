<?php
/* Smarty version 3.1.31, created on 2017-11-24 08:33:39
  from "D:\WAMP\wamp\www\lqlseven\template\index\author.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a17cb53277e76_16734205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0cc8a6fd99de6e23a9b50d0fdc5128fcd6f6ce36' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\author.html',
      1 => 1511284730,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a17cb53277e76_16734205 (Smarty_Internal_Template $_smarty_tpl) {
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
/indexauthor.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/jquery-3.2.1.js"><?php echo '</script'; ?>
>
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
                <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['uphoto'];?>
" alt="">
                <div class="topmiddle">
                    <p><?php echo $_smarty_tpl->tpl_vars['data']->value['uname'];?>
</p>
                    <p>
                        关注 <span><?php echo $_smarty_tpl->tpl_vars['data']->value['atNum'];?>
</span> &nbsp;
                        粉丝 <span><?php echo $_smarty_tpl->tpl_vars['data']->value['fans'];?>
</span>&nbsp;
                        文章 <span><?php echo $_smarty_tpl->tpl_vars['articleNum']->value;?>
</span>
                    </p>
                </div>
                <div class="topright">

                    <?php if ($_smarty_tpl->tpl_vars['self']->value) {?>
                        <?php if ($_smarty_tpl->tpl_vars['atstatus']->value) {?>
                        <a  style="background:#b1b0b0;" class="guanzhuBox" uid1="<?php echo $_smarty_tpl->tpl_vars['uid1']->value;?>
" uid2="<?php echo $_smarty_tpl->tpl_vars['data']->value['uid'];?>
">
                               <span class="guanzhu" style="font-size:18px;letter-spacing: 1px;
                               color: #fff;">已关注</span>
                            <span class="iconfont icon-guanzhu1" style="color:#fff;font-size:18px;"></span>
                        </a>
                        <?php } else { ?>
                        <a  style="background: #ea6f5a;" class="guanzhuBox"   uid1="<?php echo $_smarty_tpl->tpl_vars['uid1']->value;?>
"  uid2="<?php echo $_smarty_tpl->tpl_vars['data']->value['uid'];?>
">
                               <span class="guanzhu" style="font-size:18px;letter-spacing: 1px;
                               color: #fff;">关注</span>
                            <span class="iconfont icon-guanzhu1" style="color:#fff;font-size:18px;"></span>
                        </a>
                        <?php }?>
                    <?php }?>
                </div>
            </div>
            <div class="leftBottom">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lists']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
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
                            <div class="limg" style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['v']->value['conthumb'];?>
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
                            <span>作者:&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['uname'];?>
</span>
                        </a>
                        <a href="javascript:;">
                            <span class="iconfont icon-liulan"></span>
                            <?php echo $_smarty_tpl->tpl_vars['v']->value['hnum'];?>

                        </a>
                        <a href="javascript:;">
                            <span class="iconfont icon-dianzan "></span>
                            <?php echo $_smarty_tpl->tpl_vars['v']->value['glikeNum'];?>

                        </a>
                        <a href="javascript:;">
                            <span class="iconfont icon-shoucangC"></span>
                            <?php echo $_smarty_tpl->tpl_vars['v']->value['storeNum'];?>

                        </a>
                        <a href="javascript:;">
                            <span class="iconfont icon-huifu"></span>
                            <?php echo $_smarty_tpl->tpl_vars['v']->value['messNum'];?>

                        </a>
                    </div>
                </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


            </div>
        </div>
        <div class="right">
            <div class="rightTop">
                <p>BLOG签约作者</p>
                <p style="margin-bottom: 10px;">在这里每个人留下了他的真情</p>
                <p>个人介绍:</p>
                <p>经常讲故事，偶尔讲道理
                    微信公众号：共央君（gongyangjun1995）
                    个人微信号：mgj229711558（欢迎添加好友，请说明来意） </p>
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
            <div class="rightBottom">
                <div class="authorTitle">同类作者</div>
                <div class="authorlist" >
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authorList']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                    <ul class="authorL">
                        <li>
                            <a href="index.php?m=index&f=author&a=authorList&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"><img src="<?php echo IMG_URL;?>
/007.jpg  " alt="图片加载错误"></a>
                        </li>
                        <li>
                            <p><?php echo $_smarty_tpl->tpl_vars['v']->value['uname'];?>
</p>
                            <div class="acontent">
                                <p>关注<span><?php echo $_smarty_tpl->tpl_vars['v']->value['attents'];?>
</span></p>
                                <p>粉丝<span><?php echo $_smarty_tpl->tpl_vars['v']->value['fans'];?>
</span></p>
                                <p>文章<span><?php echo $_smarty_tpl->tpl_vars['v']->value['cons'];?>
</span></p>
                            </div>
                        </li>
                    </ul>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                </div>


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
<?php echo '<script'; ?>
>
    $(function () {
    $('.guanzhuBox').on('click',function () {
        alert($('.guanzhu').text())
        if($('.guanzhu').text()=="关注"){
            that=$(this);
            var uid1=$(this).attr('uid1');
            var uid2=$(this).attr('uid2');
            if(uid1=='false'){
                location.href="index.php?m=index&f=login&a=init";
            }else{
                $.ajax({
                    url:'index.php?m=index&f=content&a=guanzhu',
                    data:{
                        uid1,uid2,
                    },
                    type:'post',
                    success:function (e) {
                        if(e=='ok'){
                            that.css({
                                "background":'#b1b0b0',
                            })
                            $('.guanzhu').text('已关注');
                        }
                    }
                })
            }
            flag=false;
        }else if($('.guanzhu').text()=="取消关注"){
            that=$(this);
            var uid1=$(this).attr('uid1');
            var uid2=$(this).attr('uid2');
            if(uid1=='false'){
                location.href="index.php?m=index&f=login&a=init";
            }else{
                $.ajax({
                    url:'index.php?m=index&f=content&a=guanzhudel',
                    data:{
                        uid1,uid2,
                    },
                    type:'post',
                    success:function (e) {
                        if(e=='ok'){
                            that.css({
                                "background":'#ea6f5a',
                            })
                            $('.guanzhu').text('关注');
                        }
                    }
                })
            }
            flag=true;
        }
    })
    //已经关注后鼠标移入取消关注
    $('.guanzhuBox').hover(function () {
        if($('.guanzhu').text()=="已关注") {
            $('.guanzhu').text('取消关注');
        }
    },function () {
        if($('.guanzhu').text()!="关注") {
            $('.guanzhu').text('已关注');

        }
    })

    })

<?php echo '</script'; ?>
>
</html><?php }
}
