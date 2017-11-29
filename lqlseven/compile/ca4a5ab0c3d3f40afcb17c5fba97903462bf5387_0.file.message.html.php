<?php
/* Smarty version 3.1.31, created on 2017-11-25 03:58:02
  from "D:\WAMP\wamp\www\lqlseven\template\admin\message.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a18dc3a7adfb8_63728718',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca4a5ab0c3d3f40afcb17c5fba97903462bf5387' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\admin\\message.html',
      1 => 1511578681,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a18dc3a7adfb8_63728718 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>查看留言</title>
    <style>
        tr,th,td{
            text-align:center;
        }
        form{
            width:96%;
            height:auto;
            margin:0 auto;
            margin-top:30px;
        }
        .nav>a{
            color:#708fff;
            text-decoration: none;
        }
        .lists>a{
            color:#ea6f5a;
            margin-right:20px;
            text-decoration: none;
        }
    </style>
</head>
<body>
<form action="index.php?m=admin&f=content&a=editcontent" method="post">
    <div class="lists" style="margin-bottom:10px;">
        <a href="index.php?m=admin&f=content&a=init&mstatus=0">正常</a>
        <a href="index.php?m=admin&f=content&a=init&mstatus=1">举报</a>
        <a href="index.php?m=admin&f=content&a=init&mpush=0">发布</a>
        <a href="index.php?m=admin&f=content&a=init&mpush=1">禁用</a>
    </div>
    <table class="table table-bordered" >
        <tr bgcolor="#f0f0f0">
            <th>留言人</th>
            <th>被留言人</th>
            <th>留言文章</th>
            <th>留言状态</th>
            <th>留言内容</th>
            <th>留言时间</th>
            <th>留言反馈</th>
            <th>实时操作</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lists']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['uname1'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['uname2'];?>
</td>
            <td class="nav">
                <a href="index.php?m=admin&f=content&a=showconNav&conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['contitle'];?>
</a>
            </td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['mstate'] == 0) {?>
                评论
                <?php } else { ?>
                回复
                <?php }?>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['mcon'];?>
</td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['v']->value['mdate'];?>

            </td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['mstatus'] == 0) {?>
                  正常
                <?php } else { ?>
                  举报
                <?php }?>
            </td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['mpush'] == 0) {?>
                  发布
                <?php } else { ?>
                  禁用
                <?php }?>
            </td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


    </table>
    <?php echo $_smarty_tpl->tpl_vars['pages']->value;?>

</form>

</body>
<?php echo '<script'; ?>
>

<?php echo '</script'; ?>
>
</html><?php }
}
