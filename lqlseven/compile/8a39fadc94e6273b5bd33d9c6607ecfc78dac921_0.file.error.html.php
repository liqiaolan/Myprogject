<?php
/* Smarty version 3.1.31, created on 2017-11-24 17:22:24
  from "D:\WAMP\wamp\www\lqlseven\template\index\error.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a184740a861c6_82923110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a39fadc94e6273b5bd33d9c6607ecfc78dac921' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\error.html',
      1 => 1510131231,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a184740a861c6_82923110 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>提示信息</title>
    <link href="<?php echo CSS_URL;?>
/dpl-min.css" rel="stylesheet">
    <link href="<?php echo CSS_URL;?>
/bui-min.css" rel="stylesheet">

</head>
<body>
<div class="demo-content" style="position:fixed; top:36%;left:36%;">
    <div class="doc-content">
        <div class="row">
            <div class="span10">
                <div class="tips tips-large tips-warning">
                    <span class="x-icon x-icon-error">×</span>
                    <div class="tips-content">
                        <h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
                        <p class="auxiliary-text">
                            你可以继续操作以下内容：
                        </p>
                        <p>
                            <a class="direct-lnk" title="配置用户数据权限" href="index.php?m=index" style="margin-right:50px;">返回首页</a>
                            <a class="direct-lnk" title="返回用户管理" href="<?php echo $_smarty_tpl->tpl_vars['uppage']->value;?>
" style="margin-right:50px;">返回上一页</a>
                            <a href=""><span class="time">3</span>s后跳转</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo '<script'; ?>
>
        let time=document.querySelector('.time');
        let timeparent=document.querySelector('.timeparent');
        let t=setInterval(move,1000);
        let num=3;
        function move() {
            num--;
            if(num==0){
                clearInterval(t);
                location.href='<?php echo $_smarty_tpl->tpl_vars['uppage']->value;?>
';
            }
            time.innerText=num;
        }
    <?php echo '</script'; ?>
>
</div>
</body>
</html><?php }
}
