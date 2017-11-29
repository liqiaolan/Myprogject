<?php
/* Smarty version 3.1.31, created on 2017-11-25 02:40:31
  from "D:\WAMP\wamp\www\lqlseven\template\admin\userrole.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a18ca0f613b70_79196184',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2128a957925ace42642e464128a34c7b9ac3097' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\admin\\userrole.html',
      1 => 1510208711,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a18ca0f613b70_79196184 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>查看管理员的角色</title>

    <link href="http://g.alicdn.com/bui/bui/1.1.21/css/bs3/dpl.css" rel="stylesheet">
    <link href="http://g.alicdn.com/bui/bui/1.1.21/css/bs3/bui-min.css" rel="stylesheet">
    <style>
        #grid th{
            text-align: center;
        }
        #grid{
            text-align:center;
        }
    </style>
</head>
<body style="margin: 20px 0 0 20px;">
<div class="demo-content">
    <div class="row">
        <div class="span16">
            <div id="grid">
            </div>
        </div>
    </div>
    <!-- 初始隐藏 dialog内容 -->
    <div id="content" class="hide">
        <form class="form-horizontal" method="post">
            <div class="row">
                <div class="control-group span8">
                    <label class="control-label"><s>*</s>角色名称：</label>
                    <div class="controls">
                        <input type="hidden"  name="rid">
                        <input name="rname" type="text" data-rules="{ required:true }" class="input-normal control-text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="control-group span8">
                    <label class="control-label"><s>*</s>发布文章数目：</label>
                    <div class="controls">
                        <input name="connum" type="text" data-rules="{ required:true }" class="input-normal control-text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="control-group span8">
                    <label class="control-label"><s>*</s>关注度：</label>
                    <div class="controls">
                        <input name="attentions" type="text" data-rules="{ required:true }" class="input-normal control-text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="control-group span8">
                    <label class="control-label"><s>*</s>点赞数：</label>
                    <div class="controls">
                        <input name="glnum" type="text" data-rules="{ required:true }" class="input-normal control-text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="control-group span8">
                    <label class="control-label">文章权限：</label>
                    <div class="controls">
                        <select name="conpermiss" class="input-normal">
                            <option value="">请选择</option>
                            <option value="1">普通文章</option>
                            <option value="2">优秀文章</option>
                            <option value="3">精华文章</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php echo '<script'; ?>
 src="http://g.tbcdn.cn/fi/bui/jquery-1.8.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="http://g.alicdn.com/bui/seajs/2.3.0/sea.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="http://g.alicdn.com/bui/bui/1.1.21/config.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo JS_URL;?>
/userrole.js"><?php echo '</script'; ?>
>

</div>
</body>
</html><?php }
}
