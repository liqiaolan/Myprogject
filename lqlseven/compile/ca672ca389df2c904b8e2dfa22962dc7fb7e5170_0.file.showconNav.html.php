<?php
/* Smarty version 3.1.31, created on 2017-11-25 03:58:10
  from "D:\WAMP\wamp\www\lqlseven\template\admin\showconNav.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a18dc42784cc3_45934162',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca672ca389df2c904b8e2dfa22962dc7fb7e5170' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\admin\\showconNav.html',
      1 => 1510493639,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a18dc42784cc3_45934162 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文章详情</title>
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/jquery-3.2.1.js"><?php echo '</script'; ?>
>
    <style>
        .main{
            width:96%;
            margin:0 auto;
            margin-top:30px;
        }
        .form{
            display: flex;
            justify-content: space-around;
        }
        .form span{
            color:#708fff;
            padding-right:20px;
        }
        .form label{
            cursor: pointer;
        }
        .content{
            text-align: center;
            margin-top:40px;
        }
        .content>h1{
            font-style: normal;
            font-weight: 500;
            font-size:26px;
        }
        .connav{
            width:80%;
            margin:0 auto;
        }
    </style>
</head>
<body conid="<?php echo $_smarty_tpl->tpl_vars['data']->value['conid'];?>
">
    <!--文章的详细信息-->
    <section class="main">
        <div class="form">
             <div class="check">
                 <span>去审核</span>
                 <label>保存<input type="radio" value="1"
                                 name="constatus" <?php if ($_smarty_tpl->tpl_vars['data']->value['constatus'] == 1) {?> checked <?php }?>></label>
                 <label>发布<input type="radio" value="3"
                        name="constatus" <?php if ($_smarty_tpl->tpl_vars['data']->value['constatus'] == 3) {?> checked <?php }?>></label>
                 <label>审核<input type="radio" value="2"
                        name="constatus" <?php if ($_smarty_tpl->tpl_vars['data']->value['constatus'] == 2) {?> checked <?php }?>></label>
                 <label>禁用<input type="radio" value="4"
                        name="constatus" <?php if ($_smarty_tpl->tpl_vars['data']->value['constatus'] == 4) {?> checked <?php }?>></label>

             </div>
             <div class="permiss">
                 <span>去阅读</span>
                 <label>普通<input type="radio" value="1"
                          name="conpermiss" <?php if ($_smarty_tpl->tpl_vars['data']->value['conpermiss'] == 1) {?> checked <?php }?>></label>
                 <label>优秀<input type="radio" value="2"
                         name="conpermiss" <?php if ($_smarty_tpl->tpl_vars['data']->value['conpermiss'] == 2) {?> checked <?php }?>></label>
                 <label>精华<input type="radio" value="3"
                         name="conpermiss" <?php if ($_smarty_tpl->tpl_vars['data']->value['conpermiss'] == 3) {?> checked <?php }?>></label>
             </div>
        </div>
        <div class="content">
            <h1><?php echo $_smarty_tpl->tpl_vars['data']->value['contitle'];?>
</h1>
            <div class="connav">
                <?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>

            </div>
        </div>
    </section>
</body>
<?php echo '<script'; ?>
>
    $(function () {
        $('input[name=constatus]').on('change',function () {
            var conid=$('body').attr('conid');
            var constatus=$(this).val();
            $.ajax({
                url:'index.php?m=admin&f=content&a=constatus',
                data:{
                    conid,constatus,
                },
                type:'post',
                success:function (e) {
                   if(e=='ok'){
                       alert('修改审核成功');
                   }
                }
            })
        })
        $('input[name=conpermiss]').on('change',function () {
            var conid=$('body').attr('conid');
            var conpermiss=$(this).val();
            $.ajax({
                url:'index.php?m=admin&f=content&a=conpermiss',
                data:{
                    conid,conpermiss,
                },
                type:'post',
                success:function (e) {
                    if(e=='ok'){
                        alert('修改权限成功');
                    }
                }
            })
        })
    })
<?php echo '</script'; ?>
>
</html><?php }
}
