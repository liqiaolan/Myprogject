<?php
/* Smarty version 3.1.31, created on 2017-11-25 02:40:17
  from "D:\WAMP\wamp\www\lqlseven\template\admin\usermanage.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a18ca017e1757_46275546',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f49e75a40b5f3e2620155c230f71e6f775c3b8d' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\admin\\usermanage.html',
      1 => 1510074041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a18ca017e1757_46275546 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/jquery-3.2.1.js"><?php echo '</script'; ?>
>
    <title>用户管理</title>
</head>
<body>
<div class="container" style="margin-top:30px;">
    <form action="index.php?m=admin&f=user&a=deluser" method="post">
        <table class="table table-hover" style="font-size:14px; ">
            <tr>
                <th>选择</th>
                <th>用户名称</th>
                <th>用户昵称</th>
                <th>用户等级</th>
                <th>用户电话</th>
                <th>操作</th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lists']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
            <tr>
                <td><input type="checkbox" name="uid[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"></td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['uname'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['unicheng'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['rname'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['uphone'];?>
</td>
                <td>
                    <a href="index.php?m=admin&f=user&a=edituser&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" style="text-decoration: none">编辑</a>
                </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            <tr>
              <td colspan="3" align="center"  style="padding:20px 0 0 0;">
                  <span><input type="checkbox" id="checkAll" name="all" value="all"></span>
                  <span>全选</span>
              </td>
              <td colspan="3" align="center"  style="padding:20px 0 0 0;">
                  <button type="submit" style="border:none;background:#ea6f5a;
                color:#fff; font-size:14px;padding:6px 8px;border-radius:4px;">批量删除</button>
              </td>
            </tr>
        </table>
    </form>
    <?php echo $_smarty_tpl->tpl_vars['pages']->value;?>

    <?php echo '<script'; ?>
>
        //多选框的实现
        var  checkboxs=$('input[type=checkbox]:not("#checkAll")');
        $('#checkAll').on('click',function(){
            for(let i=0;i<checkboxs.length;i++){
                checkboxs[i].checked=this.checked;
            }
        })
        checkboxs.on('click',function () {
            var isCheckedAll=true;
            for(let j=0;j<checkboxs.length;j++){
                if(!checkboxs[j].checked){
                    isCheckedAll=false;
                    break;
                }
            }
            $('#checkAll')[0].checked=isCheckedAll;
        })
    <?php echo '</script'; ?>
>
</div>
</body>
</html><?php }
}
