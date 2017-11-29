<?php
/* Smarty version 3.1.31, created on 2017-11-23 15:44:42
  from "D:\WAMP\wamp\www\lqlseven\template\index\personalCenter.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a16dedabafe61_05692814',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37df9cb7664daee230b9679f980d15da39fcf4f5' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\personalCenter.html',
      1 => 1511239962,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a16dedabafe61_05692814 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo CSS_URL;?>
/personalCenter.css">
    <link rel="stylesheet" href="<?php echo CSS_URL;?>
/personal.css">
    <link rel="stylesheet" href="<?php echo ICONFONT_URL;?>
/iconfont.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/jquery-3.2.1.js"><?php echo '</script'; ?>
>
    <!--<?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/editimg.js"><?php echo '</script'; ?>
>-->
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/personalCenter.js"><?php echo '</script'; ?>
>
    <title>个人中心</title>
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <section class="body">
        <main>
    <!--aside开始-->
            <aside>
                <ul>
                    <li style="background:#f0f0f0;">
                        <span class="iconfont icon-jibenxinxi"></span>
                        <span>基本资料</span>
                    </li>
                    <li>
                        <span class="iconfont icon-wodeshoucang3"></span>
                        <span>我的收藏</span>
                    </li>
                    <li>
                        <span class="iconfont  icon-wodeguanzhu2"></span>
                        <span>我的关注</span>
                    </li>
                    <li>
                        <span class="iconfont  icon-wodebeibeiwodeqianbao"></span>
                        <span>我的钱包</span>
                    </li>
                    <li>
                        <span class="iconfont  icon-wodegouwuche"></span>
                        <span>我的购物</span>
                    </li>
                    <li>
                        <span class="iconfont  icon-wodedingdan1"></span>
                        <span>我的订单</span>
                    </li>
                </ul>
            </aside>
    <!--aside结束-->
            <!--content开始-->
               <div class="content">
                <!--基本资料-->
                <div class="basic">
                    <div class="notice1">
                        上传头像成功
                    </div>
                    <div class="notice2">

                    </div>
                    <div class="photo" style="position: relative">
                        <div class="headimg" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['basic']->value["uphoto"];?>
');">
                        </div>
                        <div class="uname"><?php echo $_smarty_tpl->tpl_vars['basic']->value['uname'];?>
</div>
                        <div class="upload">
                            <span class="iconfont  icon-iconfontpencil"
                            style="margin-right: 8px;"></span>
                            <span>更换头像</span>
                            <input type="file" id="file">
                            <input type="hidden" name="uphoto">
                        </div>
                    </div>
                    <form action="" class="edit">
                        <div class="nicheng">
                            <span>昵称</span>
                            <input type="text"  name="unicheng" value="<?php echo $_smarty_tpl->tpl_vars['basic']->value['unicheng'];?>
" maxlength="20">
                        </div>
                        <hr  size="1" noshade color="#f0f0f0">
                        <div class="upass">
                            <span>修改密码</span>
                            <input type="password"  name="upass">
                        </div>
                        <hr  size="1" noshade color="#f0f0f0">
                        <div class="upass">
                            <span>确认密码</span>
                            <input type="password"  name="upassA" >
                        </div>
                        <hr  size="1" noshade color="#f0f0f0">
                        <div class="uphone">
                            <span>联系方式</span>
                            <input type="text"  name="uphone" value="<?php echo $_smarty_tpl->tpl_vars['basic']->value['uphone'];?>
" maxlength="11">
                        </div>
                        <hr  size="1" noshade color="#f0f0f0">
                        <div class="uinfo">
                            <span>个人介绍</span>
                            <textarea type="text"  name="uinfo" maxlength="200"><?php echo $_smarty_tpl->tpl_vars['basic']->value['uinfo'];?>
</textarea>
                        </div>
                        <button type="button">保存</button>
                    </form>
                </div>
                <!--我的收藏-->
                <div class="store" style="display: none">
                    <div class="storeTitle">
                        <span class="iconfont icon-shoucangdewenzhang"></span>
                        <span>我的收藏文章</span>
                    </div>
                    <div class="storeFix">
                        <span class="iconfont icon-huidaodingbu"></span>
                    </div>
                    <div class="storefoot">
                        <p>
                            ©2016-2017 山西朔州爱因特有限公司 / 简书 / 晋ICP备11018329号-5 / 晋公网安备31010402002252号
                        </p>
                        <p>晋公网安备31010402002252号 / 举报电话：021-34770013</p>
                    </div>
                </div>
                <!--我的关注-->
                <div class="attention" style="display: none">
                    <div class="storeTitle">
                        <span class="iconfont icon-guanzhu3"></span>
                        <span>我的关注信息</span>
                    </div>
                     <div class="attentionNum">
                         <p>关注的作家 <span style="color:#ea6f5a;"></span></p>
                     </div>
                </div>
                <!--我的钱包-->
                <div class="wallet" style="display: none">
                    <div class="walletTitle">赶快来看看你的钱包吧</div>
                    <div class="walletName">
                        <div class="walletimg" style="background-image: url('<?php echo IMG_URL;?>
/01.jpg');"></div>
                        <div class="walletname">lqlseven</div>
                    </div>
                    <div class="wtaccount">
                        <span>账户余额</span>
                        <span>100.90元</span>
                        <br>
                        <button class="recharge">充值</button>
                        <button class="withdrawal">提现</button>
                    </div>
                    <div class="help">
                        <p>每次提现最小额度为￥100.00</p>
                        <p>每次提现收取 5% 手续费</p>
                        <p>提现会在 3-5 个工作日内到账</p>
                    </div>
                    <div class="walletcon">
                        <table>
                            <tbody>
                               <tr>
                                   <th>时间</th>
                                   <th>类型</th>
                                   <th>详情</th>
                                   <th>金额</th>
                                   <th>对方</th>
                               </tr>
                               <tr>
                                   <td>2017-10-11</td>
                                   <td>支付</td>
                                   <td>购买文章<<生命的搏动>>支付</td>
                                   <td>20元</td>
                                   <td>勿忘初心</td>
                               </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--我的购物-->
                <div class="shopcar" style="display: none">
                    <div class="storeTitle">
                        <span class="iconfont icon-gouwuche1"></span>
                        <span>我的购物车</span>
                    </div>
                    <form action="" class="shopcarCon">
                        <table>
                            <tbody>
                               <tr>
                                   <th>选择</th>
                                   <th>文章标题</th>
                                   <th>作者</th>
                                   <th>时间</th>
                                   <th>价格</th>
                                   <th>操作</th>
                               </tr>
                               <tr>
                                    <td><input type="checkbox"></td>
                                    <td>你有最好的年纪，别辜负最好的自己</td>
                                    <td>勿忘初心</td>
                                    <td>2014-10-11</td>
                                    <td class="price">2.34</td>
                                    <td>
                                        <a href="">删除</a>
                                    </td>
                                </tr>
                               <tr>
                                   <td><input type="checkbox"></td>
                                   <td>你有最好的年纪，别辜负最好的自己</td>
                                   <td>勿忘初心</td>
                                   <td>2014-10-11</td>
                                   <td class="price">1.20</td>
                                   <td>
                                       <a href="">删除</a>
                                   </td>
                               </tr>
                               <tr>
                                   <td><input type="checkbox"></td>
                                   <td>你有最好的年纪，别辜负最好的自己</td>
                                   <td>勿忘初心</td>
                                   <td>2014-10-11</td>
                                   <td class="price">12</td>
                                   <td>
                                       <a href="">删除</a>
                                   </td>
                               </tr>
                            </tbody>
                        </table>
                        <div class="checkallBox">
                            <div class="checkall">
                                <input type="checkbox" id="checkAll">
                                <span>全选</span>
                            </div>
                            <span class="allprice">00.00</span>
                            <a href="">去结算</a>
                            <a href="">全部删除</a>
                        </div>
                    </form>
                    <div class="storefoot">
                        <p>
                            ©2016-2017 山西朔州爱因特有限公司 / 简书 / 晋ICP备11018329号-5 / 晋公网安备31010402002252号
                        </p>
                        <p>晋公网安备31010402002252号 / 举报电话：021-34770013</p>
                    </div>
                </div>
                <!--我的订单-->
                <div class="myorder" style="display: none">
                    <ul class="myorderTop">
                       <li>
                           <span class="iconfont icon-finish"></span>&nbsp;已完成订单
                       </li>
                       <li>
                           <span class="iconfont icon-unfinish"></span>&nbsp;未完成订单
                       </li>
                    </ul>
                    <div class="orderfinish">
                        <table>
                            <tbody>
                               <tr>
                                   <th>订单号</th>
                                   <th>订单详情</th>
                                   <th>价格</th>
                                   <th>时间</th>
                                   <th>操作</th>
                               </tr>
                               <tr>
                                   <td>ID78690</td>
                                   <td>我的兵荒马乱</td>
                                   <td>23元</td>
                                   <td>2017-8-9 8:00</td>
                                   <td><a href="">删除</a></td>
                               </tr>
                               <tr>
                                   <td>ID78690</td>
                                   <td>我的兵荒马乱</td>
                                   <td>23元</td>
                                   <td>2017-8-9 8:00</td>
                                   <td><a href="">删除</a></td>
                               </tr>
                               <tr>
                                   <td>ID78690</td>
                                   <td>我的兵荒马乱</td>
                                   <td>23元</td>
                                   <td>2017-8-9 8:00</td>
                                   <td><a href="">删除</a></td>
                               </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="orderunfinish" style="display: none">
                        <table>
                            <tbody>
                            <tr>
                                <th>订单详情</th>
                                <th>价格</th>
                                <th>失败原因</th>
                                <th>时间</th>
                                <th>操作</th>
                            </tr>
                            <tr>
                                <td>我们都很好</td>
                                <td>3元</td>
                                <td>未支付</td>
                                <td>2013-09-03 9:00</td>
                                <td><a href="">删除</a></td>
                            </tr>
                            <tr>
                                <td>我们都很好</td>
                                <td>3元</td>
                                <td>未支付</td>
                                <td>2013-09-03 9:00</td>
                                <td><a href="">删除</a></td>
                            </tr>
                            <tr>
                                <td>我们都很好</td>
                                <td>3元</td>
                                <td>未支付</td>
                                <td>2013-09-03 9:00</td>
                                <td><a href="">删除</a></td>
                            </tr>
                            <tr>
                                <td>我们都很好</td>
                                <td>3元</td>
                                <td>未支付</td>
                                <td>2013-09-03 9:00</td>
                                <td><a href="">删除</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="storefoot">
                        <p>
                            ©2016-2017 山西朔州爱因特有限公司 / 简书 / 晋ICP备11018329号-5 / 晋公网安备31010402002252号
                        </p>
                        <p>晋公网安备31010402002252号 / 举报电话：021-34770013</p>
                    </div>
                </div>
            </div>
            <!--content结束-->
        </main>
    </section>
</body>
</html><?php }
}
