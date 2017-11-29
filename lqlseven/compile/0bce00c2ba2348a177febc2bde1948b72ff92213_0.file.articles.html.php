<?php
/* Smarty version 3.1.31, created on 2017-11-25 02:34:50
  from "D:\WAMP\wamp\www\lqlseven\template\admin\articles.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a18c8ba76d6c3_99831157',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0bce00c2ba2348a177febc2bde1948b72ff92213' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\admin\\articles.html',
      1 => 1510498319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a18c8ba76d6c3_99831157 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>查看文章</title>
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
          <a href="index.php?m=admin&f=content&a=init&status=1">保存</a>
          <a href="index.php?m=admin&f=content&a=init&status=3">发布</a>
          <a href="index.php?m=admin&f=content&a=init&status=2">审核</a>
          <a href="index.php?m=admin&f=content&a=init&status=4">禁用</a>
          <a href="index.php?m=admin&f=content&a=init&permiss=1">普通文章</a>
          <a href="index.php?m=admin&f=content&a=init&permiss=2">优秀文章</a>
          <a href="index.php?m=admin&f=content&a=init&permiss=3">精华文章</a>
      </div>
      <table class="table table-bordered" >
          <tr bgcolor="#f0f0f0">
              <th>文章ID</th>
              <th>作者</th>
              <th>文章标题</th>
              <th>权限</th>
              <th>价格</th>
              <th>状态</th>
              <th>所属分类</th>
              <th>发布时间</th>
              <th>所属推荐位</th>
              <th>缩略图</th>
          </tr>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lists']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
              <tr>
                  <td><?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['v']->value['uname'];?>
</td>
                  <td class="nav">
                      <a href="index.php?m=admin&f=content&a=showconNav&conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['contitle'];?>
</a>
                  </td>
                  <td>
                      <?php if ($_smarty_tpl->tpl_vars['v']->value['conpermiss'] == 1) {?>
                       普通
                      <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['conpermiss'] == 2) {?>
                         优秀
                      <?php } else { ?>
                         精华
                      <?php }?>
                  </td>
                  <td><?php echo $_smarty_tpl->tpl_vars['v']->value['price'];?>
</td>
                  <td>
                      <?php if ($_smarty_tpl->tpl_vars['v']->value['constatus'] == 1) {?>
                         保存
                      <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['constatus'] == 2) {?>
                         审核
                      <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['constatus'] == 3) {?>
                         发布
                      <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['constatus'] == 4) {?>
                         禁用
                      <?php }?>
                  </td>
                  <td><?php echo $_smarty_tpl->tpl_vars['v']->value['cname'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['v']->value['condate'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['v']->value['rname'];?>
</td>
                  <td>
                      <img src="<?php echo APP_URL;?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['conthumb'];?>
" alt="" style="width:30px;height:30px;">
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
