<?php
/* Smarty version 3.1.31, created on 2017-11-24 17:30:08
  from "D:\WAMP\wamp\www\lqlseven\template\index\articleList.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a184910dc07c0_61550903',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59b8eb5d2bf5196b12d494b3a29538843b576112' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\articleList.html',
      1 => 1510333890,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a184910dc07c0_61550903 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link rel="stylesheet" href="<?php echo ICONFONT_URL;?>
/iconfont.css">
    <title>文章列表页</title>
    <style>
        .list{
            margin-left:40px;
            margin-top:20px;
        }
        .write{
            text-decoration: none;
            border:1px solid #ea6f5a;
            border-radius: 30px;
            padding:8px 12px;
        }
        .write:hover{
            text-decoration: none;
        }
        .lists{
            margin-top:30px;
        }
        li{
            list-style: none;
            font-size:18px;
            margin-bottom: 10px;
        }
        li>a{
            color:#333;
            text-decoration: none;
        }
        li>a:hover{
            text-decoration: none;
        }
        .glyphicon-grain{
            color:#ea6f5a;
        }
        .lists>li>span>a{
            font-size:18px;
            text-decoration: none;
        }
        .lists>li>span>a:hover{
             color:#333;
        }
        .lists>li>span{
            margin-left:20px;
        }
    </style>
</head>
<body>
   <section class="list">
       <p>

           <a href="index.php?m=index&f=article&a=write&cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
" class="write">
               <span class="glyphicon glyphicon-plus" style="color:#ea6f5a"></span>
               <span style="font-size:16px; color:#000;margin-left:10px;">新建文章</span>
           </a>
       </p>
       <ul class="lists">
           <?php if (count($_smarty_tpl->tpl_vars['data']->value) > 0) {?>
               <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
               <li>
                   <a href="">
                       <span class="glyphicon glyphicon-grain"></span>
                       <span style="margin-right:20px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['contitle'];?>
</span>
                       <span><?php echo $_smarty_tpl->tpl_vars['v']->value['condate'];?>
</span>
                   </a>
                   <span>
                       <a href="index.php?m=index&f=article&a=delarticle&conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
&cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
" class="iconfont icon-shanchu" style="margin-right:10px;"></a>
                       <a href="index.php?m=index&f=article&a=editarticle&conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
&cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
" class="iconfont icon-iconfontpencil"></a>
                   </span>
               </li>
               <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

           <?php } else { ?>
             <li>没有内容，添加几篇吧！</li>
           <?php }?>

       </ul>
   </section>

</body>
</html><?php }
}
