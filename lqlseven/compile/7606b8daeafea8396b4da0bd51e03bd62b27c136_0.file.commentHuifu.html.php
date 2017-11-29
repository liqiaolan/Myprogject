<?php
/* Smarty version 3.1.31, created on 2017-11-26 00:45:10
  from "D:\WAMP\wamp\www\lqlseven\template\index\commentHuifu.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a199e1617f717_06897345',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7606b8daeafea8396b4da0bd51e03bd62b27c136' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\commentHuifu.html',
      1 => 1510830487,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a199e1617f717_06897345 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="huifuBOX">
    <div class="clyhuifu">
        <div class="huifuT"><?php echo $_smarty_tpl->tpl_vars['indexuname']->value;?>
</div>
        <div class="huifuC"><?php echo $_smarty_tpl->tpl_vars['mcon']->value;?>
</div>
        <div class="huifuTime">
            <span><?php echo $_smarty_tpl->tpl_vars['mdate']->value;?>
</span>
            <span class="iconfont icon-huifu showhuifu" huifu="<?php echo $_smarty_tpl->tpl_vars['uname']->value;?>
" id="showhuifu"  uid2="<?php echo $_smarty_tpl->tpl_vars['uid2']->value;?>
"></span>
        </div>
    </div>
    <div style="border:0.5px dashed #ccc;margin:8px 0;"></div>
</div><?php }
}
