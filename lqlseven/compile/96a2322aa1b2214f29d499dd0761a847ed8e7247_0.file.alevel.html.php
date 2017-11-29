<?php
/* Smarty version 3.1.31, created on 2017-11-25 02:34:43
  from "D:\WAMP\wamp\www\lqlseven\template\admin\alevel.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a18c8b3de4340_36402662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96a2322aa1b2214f29d499dd0761a847ed8e7247' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\admin\\alevel.html',
      1 => 1510202958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a18c8b3de4340_36402662 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>查看级别</title>

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
                    <label class="control-label"><s>*</s>级别名称：</label>
                    <div class="controls">
                        <input type="hidden"  name="lid">
                        <input name="lname" type="text" data-rules="{ required:true }" class="input-normal control-text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="control-group span12">
                    <label class="control-label">内容权限：</label>
                    <div class="controls bui-form-field-select" data-select="{ multipleSelect:true,items : [{ text:'增',value:'1' },{ text:'删',value:'2' },{ text:'改',value:'3' },{ text:'查',value:'4' }]}">
                        <input type="hidden" name="conpermiss">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="control-group span12">
                    <label class="control-label">留言权限：</label>
                    <div class="controls bui-form-field-select" data-select="{ multipleSelect:true,items : [{ text:'增',value:'1' },{ text:'删',value:'2' },{ text:'改',value:'3' },{ text:'查',value:'4' }]}">
                        <input type="hidden" name="mespermiss">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="control-group span12">
                    <label class="control-label">管理员权限：</label>
                    <div class="controls bui-form-field-select" data-select="{ multipleSelect:true,items : [{ text:'增',value:'1' },{ text:'删',value:'2' },{ text:'改',value:'3' },{ text:'查',value:'4' }]}">
                        <input type="hidden" name="adminpermiss">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="control-group span12">
                    <label class="control-label">管理员级别权限：</label>
                    <div class="controls bui-form-field-select" data-select="{ multipleSelect:true,items : [{ text:'增',value:'1' },{ text:'删',value:'2' },{ text:'改',value:'3' },{ text:'查',value:'4' }]}">
                        <input type="hidden" name="gradepermiss">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php echo $_smarty_tpl->tpl_vars['pages']->value;?>


    <?php echo '<script'; ?>
 src="http://g.tbcdn.cn/fi/bui/jquery-1.8.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="http://g.alicdn.com/bui/seajs/2.3.0/sea.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="http://g.alicdn.com/bui/bui/1.1.21/config.js"><?php echo '</script'; ?>
>

    <!-- script start -->
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo JS_URL;?>
/alevel.js">

    <?php echo '</script'; ?>
>

</div>
</body>
</html><?php }
}
