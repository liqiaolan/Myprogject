<?php
/* Smarty version 3.1.31, created on 2017-11-24 18:13:43
  from "D:\WAMP\wamp\www\lqlseven\template\index\header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a185347a8e599_51561030',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '016ea56d529a5ee269861f29575179bb960661e6' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\header.html',
      1 => 1511543582,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a185347a8e599_51561030 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!--header开始-->
    <header>
        <main>
            <form action="" class="searchForm">
                <div class="index">
                    <a href="index.php?m=index&f=index&a=init" style="display: block;">
                        <img src="<?php echo IMG_URL;?>
/logo.png" alt="图片加载错误"
                             style="width:40px;height:40px;border-radius: 50%;font-size:10px;">
                    </a>
                </div>
                <div class="searchBox">
                    <input type="text" placeholder="搜索" class="search">
                    <span class="iconfont icon-icon_search"></span>
                </div>
            </form>
            <div class="flogo">
                <?php if ($_smarty_tpl->tpl_vars['indexuname']->value) {?>
                <div class="login"><a href="index.php?m=index&f=attention&a=gzmore">关注</a></div>
                <div class="login"><a href="index.php?m=index&f=index&a=categoryMore">话题</a></div>
                <!--登录成功后头像-->
                <div class="self"><a href="index.php?m=index&f=article&a=articaleCheck">写点什么吧</a></div>
                <div class="loginuser">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['selfdata']->value['uphoto'];?>
" alt="">
                    <div class="iconfont icon-arrLeft-fill"></div>
                    <ul>
                        <li>
                            <a href="index.php?m=index&f=personalCenter&a=init">
                                <span class="iconfont icon-gerenzhongxin_zhuye_gerenziliao"></span>
                                <span>我的主页</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?m=index&f=myarticle&a=myarticale">
                                <span class="iconfont icon-gerenzhongxin_zhuye_gerenziliao"></span>
                                <span>我的文章</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?m=index&f=login&a=loginout">
                                <span class="iconfont icon-tuichu-"></span>
                                <span>我要退出</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php } else { ?>
                <div class="login"><a href="index.php?m=index&f=login&a=init" style="color:#ea6f5a;">登录</a></div>
                <div class="login"><a href="index.php?m=index&f=attention&a=gzmore">关注</a></div>
                <div class="login"><a href="index.php?m=index&f=index&a=categoryMore">话题</a></div>
                <div class="register"><a href="index.php?m=index&f=register&a=init">注册</a></div>
                <div class="self"><a href="index.php?m=index&f=article&a=articaleCheck">写点什么吧</a></div>
                <?php }?>

            </div>
        </main>
    </header>
    <!--header结束-->
</body>
</html><?php }
}
