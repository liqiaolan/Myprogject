<?php
/* Smarty version 3.1.31, created on 2017-11-23 17:46:49
  from "D:\WAMP\wamp\www\lqlseven\template\index\articale.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a16fb798affa3_39716654',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb22e4afe5bfe083803c71302eedc88572521e5e' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\articale.html',
      1 => 1510476293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a16fb798affa3_39716654 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>写文章</title>
    <link rel="stylesheet" href="<?php echo ICONFONT_URL;?>
/iconfont.css">
    <link rel="stylesheet" href="<?php echo CSS_URL;?>
/articale.css">
    <link rel="stylesheet" href="<?php echo CSS_URL;?>
/bootstrap.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/jquery-3.2.1.js"><?php echo '</script'; ?>
>
</head>
<body>
   <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

  <!--内容开始-->
   <section class="container">
           <div class="row">
               <div class="col-xs-4 col-md-3 left">
                   <div style="font-size:26px; text-align: center;margin-bottom:20px;">文章分类</div>
                   <?php echo $_smarty_tpl->tpl_vars['tree']->value;?>

               </div>
               <div class="col-xs-8 col-md-9 right">
                   <iframe src="index.php?m=index&f=article&a=showwrite" frameborder="0" name="right">

                   </iframe>
               </div>
           </div>
   </section>
  <!--内容结束-->
</body>
<?php echo '<script'; ?>
>
    let flag=true;
    $('.parent').on('click',function () {
        if(flag){
            $(this).next('ul').css({
                "height":'auto',
            })
            flag=false;
        }else{
            $(this).next('ul').css({
                "height":'0',
            })
            flag=true;
        }
    })
<?php echo '</script'; ?>
>
</html><?php }
}
