<?php
/* Smarty version 3.1.31, created on 2017-11-25 18:07:38
  from "D:\WAMP\wamp\www\lqlseven\template\index\comment.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a19a35a930a22_41831272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80aec3d88a8bd03d30a629be4ead9f27946bbdc5' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\comment.html',
      1 => 1511629656,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a19a35a930a22_41831272 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
     <div class="clycontent" mid="<?php echo $_smarty_tpl->tpl_vars['v']->value['mid'];?>
">
        <div class="pinglun">
            <div class="clycauthor">
                <p style="background-image: url('<?php echo IMG_URL;?>
/banner1.jpg')"></p>
                <p>
                    <span><?php echo $_smarty_tpl->tpl_vars['v']->value['uname'];?>
</span>
                    <span><?php echo $_smarty_tpl->tpl_vars['v']->value['mdate'];?>
</span>
                </p>
            </div>
            <div class="clycon">
                <span><?php echo $_smarty_tpl->tpl_vars['v']->value['mcon'];?>
</span>
                <span style="float:right;padding-right:10px;cursor: pointer" id="mstatus"> 举报</span>
            </div>
            <div class="clylike">
                <span class="iconfont icon-dianzan"></span>
                <span class="iconfont icon-huifu showhuifu" indexuname="<?php echo $_smarty_tpl->tpl_vars['indexuname']->value;?>
"></span>
            </div>
        </div>
        <div class="huifu">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['son']) {?>
               <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['v']->value['son'], 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                    <div class="huifuBOX">
                        <div class="clyhuifu">
                            <div class="huifuT"><?php echo $_smarty_tpl->tpl_vars['value']->value['uname'];?>
</div>
                            <div class="huifuC"><?php echo $_smarty_tpl->tpl_vars['value']->value['mcon'];?>
</div>
                            <div class="huifuTime">
                                <span><?php echo $_smarty_tpl->tpl_vars['value']->value['mdate'];?>
</span>
                                <span class="iconfont icon-huifu showhuifu" huifu="<?php echo $_smarty_tpl->tpl_vars['value']->value['uname'];?>
" id="showhuifu"  uid2="<?php echo $_smarty_tpl->tpl_vars['value']->value['uid1'];?>
" indexuname="<?php echo $_smarty_tpl->tpl_vars['indexuname']->value;?>
"></span>
                            </div>
                        </div>
                        <div style="border:0.5px dashed #ccc;margin:8px 0;"></div>
                    </div>
               <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            <?php }?>
             <div class="addComment">
                 <span class="showhuifu" style="color:#777;" indexuname="<?php echo $_smarty_tpl->tpl_vars['indexuname']->value;?>
">添加新评论</span>
                 <span class="cancelhuifu" style="color:#777;cursor: pointer;margin-left:40px;">取消</span>
                 <div class="Messagehid">
                     <textarea placeholder="写下你的评论..." maxlength="200" class="textareaB"></textarea>
                     <div style="display: flex;justify-content: space-between">
                <span class="iconfont icon-xiaolian" style="font-size:26px;color:#777;">
                    <span style="font-size: 16px;vertical-align: middle;padding-left:20px;">留下您足迹吧</span>
                </span>
                         <div>
                             <span class="cancelhuifu" style="display: inline-block;padding: 6px 14px;background:#e41635;color:#fff;border-radius:2px;font-weight: 500;cursor: pointer;margin-right:50px;">取消</span>
                             <span class="addhuifu" style="display: inline-block;padding: 6px 14px;background:#09bb07;color:#fff;border-radius:2px;font-weight: 500;cursor: pointer">发送</span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
    </div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

 <!--评论分页-->
 <div class="commentpage">
     <a href="javascript:;" class="prevmessage" url="index.php?m=index&f=comment&a=pages&pages=<?php echo $_smarty_tpl->tpl_vars['pages']->value-1;?>
&conid=<?php echo $_smarty_tpl->tpl_vars['conid']->value;?>
">上一页</a>
     <a href="javascript:;"  class="nextmessage"  url="index.php?m=index&f=comment&a=pages&pages=<?php echo $_smarty_tpl->tpl_vars['pages']->value+1;?>
&conid=<?php echo $_smarty_tpl->tpl_vars['conid']->value;?>
">下一页</a>
 </div>
<?php }
}
