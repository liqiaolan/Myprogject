<?php
/* Smarty version 3.1.31, created on 2017-11-25 01:41:15
  from "D:\WAMP\wamp\www\lqlseven\template\index\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a18bc2ba4c472_99737800',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fda21e8f301a1f36701fdcb77758e757e680fffb' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\index.html',
      1 => 1511543582,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a18bc2ba4c472_99737800 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\WAMP\\wamp\\www\\lqlseven\\libs\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\WAMP\\wamp\\www\\lqlseven\\libs\\smarty\\plugins\\modifier.truncate.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo CSS_URL;?>
/index.css">
    <link rel="stylesheet" href="<?php echo ICONFONT_URL;?>
/iconfont.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/jquery-3.2.1.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/index.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_URL;?>
/indexglike.js"><?php echo '</script'; ?>
>
    <title>lqlseven</title>
</head>
<body uid="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
">
  <div class="ibody">
       <!--固定定位开始-->
      <section class="fixed">
          <main>
              <form action="" class="searchForm">
                  <div class="index">
                      <a href="index.php?m=index&f=index&a=init" style="display: block;">
                          <img src="<?php echo IMG_URL;?>
/logo.png" alt="图片加载错误"
                               style="width:40px;height:40px;border-radius: 50%;font-size:10px;">
                      </a>
                  </div>
                  <div class="searchBox">
                      <input type="text" placeholder="搜索" class="search">
                      <span class="iconfont icon-icon_search"></span>
                  </div>
              </form>
              <div class="flogo">
                  <?php if ($_smarty_tpl->tpl_vars['indexuname']->value) {?>
                  <div class="login"><a href="index.php?m=index&f=attention&a=gzmore">关注</a></div>
                  <div class="login"><a href="index.php?m=index&f=index&a=categoryMore">话题</a></div>
                  <!--登录成功后头像-->
                  <div class="self"><a href="index.php?m=index&f=article&a=articaleCheck">写点什么吧</a></div>
                  <div class="loginuser">
                      <img src="<?php echo $_smarty_tpl->tpl_vars['selfdata']->value['uphoto'];?>
" alt="">
                      <div class="iconfont icon-arrLeft-fill"></div>
                      <ul>
                          <li>
                              <a href="index.php?m=index&f=personalCenter&a=init">
                                  <span class="iconfont icon-gerenzhongxin_zhuye_gerenziliao"></span>
                                  <span>我的主页</span>
                              </a>
                          </li>
                          <li>
                              <a href="index.php?m=index&f=myarticle&a=myarticale">
                                  <span class="iconfont icon-gerenzhongxin_zhuye_gerenziliao"></span>
                                  <span>我的文章</span>
                              </a>
                          </li>
                          <li>
                              <a href="index.php?m=index&f=login&a=loginout">
                                  <span class="iconfont icon-tuichu-"></span>
                                  <span>我要退出</span>
                              </a>
                          </li>
                      </ul>
                  </div>
                  <?php } else { ?>
                  <div class="login"><a href="index.php?m=index&f=login&a=init" style="color:#ea6f5a;">登录</a></div>
                  <div class="login"><a href="index.php?m=index&f=attention&a=gzmore">关注</a></div>
                  <div class="login"><a href="index.php?m=index&f=index&a=categoryMore">话题</a></div>
                  <div class="register"><a href="index.php?m=index&f=register&a=init">注册</a></div>
                  <div class="self"><a href="index.php?m=index&f=article&a=articaleCheck">写点什么吧</a></div>
                  <?php }?>

              </div>
          </main>
      </section>
       <!--固定定位结束-->
       <!--header开始-->
       <header>
           <main>
                   <!--导语-->
                   <div class="introduction">
                       <p>博主寄语</p>
                       <p>生活从来就不是容易的，当我们容易的时候必定有人为你承担着你的那份不易，希望我们每个人都能在
                       生活的舞台上做自己的主角，书写自己的精彩，成为自己希望成为的人,希望你也能认真的生活，对得起自己，                        对得起时光.</p>
                   </div>
                   <!--logo-->
                   <div class="logo">
                       WELCOME
                       <div class="logow" style="background-image: url('<?php echo IMG_URL;?>
/logo.png')">
                       </div>
                   </div>
                   <!--nav-->
           </main>
       </header>
       <!--header结束-->
       <!--banner开始-->
       <section class="banner">
           <main>
              <ul class="bannerCon">
                  <li style='background-image:url("<?php echo IMG_URL;?>
/banner4.jpg")'>
                      <p>The best life is use of willing attitude, a happy-go-lucky life.</p>
                      <p>最好的生活是用心甘情愿的态度，过随遇而安的生活。</p>
                  </li>
                  <li style='background-image:url("<?php echo IMG_URL;?>
/banner1.jpg")'>
                      <p>You only have to work hard to look effortless.</p>
                      <p>你只有很努力，才能看起来毫不费力。</p>
                  </li>
                  <li style='background-image:url("<?php echo IMG_URL;?>
/banner2.jpg")'>
                      <p>Only the brilliant, not waiting for the brilliant.</p>
                      <p>只有跑出来的精彩，没有等出来的辉煌。</p>
                  </li>

              </ul>
           </main>
       </section>
       <!--banner结束-->
       <!--分类开始-->
      <section class="category">
          <main>
              <ul>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                  <li>
                      <a href="index.php?m=index&f=index&a=category&cid=<?php echo $_smarty_tpl->tpl_vars['v']->value['cid'];?>
">
                          <img src="<?php echo IMG_URL;?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['cname'];?>
.png" alt="">
                          <div><?php echo $_smarty_tpl->tpl_vars['v']->value['cname'];?>
</div>
                      </a>
                  </li>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                  <li>
                      <a href="index.php?m=index&f=index&a=categoryMore">更多热门话题</a>
                  </li>
              </ul>
          </main>
      </section>
       <!--分类结束-->
      <!--推荐文章recommend开始-->
      <section class="recommend">
              <div class="rtitle">
                  <i>推荐</i>文章
              </div>
              <hr width="776px" size="2px" color="#474645">
              <!--留言开始leavemessage开始-->
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lists']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
              <div class="leavemessage" conid="<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
">
                  <div class="ltitle">
                      <a href="index.php?m=index&f=content&a=init&conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['contitle'];?>
</a>
                      <div class="ltime">
                          <div class="ltimeti"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['condate'],'%Y-%m-%d');?>
</div>
                      </div>
                  </div>
                  <div class="lcon">
                      <a href="index.php?m=index&f=content&a=init&conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
" style="display: block;">
                          <div class="limg" style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['v']->value["conthumb"];?>
')"></div>
                      </a>

                      <div class="lcontent">
                          <?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value["content"];
$_prefixVariable1=ob_get_clean();
echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_prefixVariable1),170,"......",true);?>

                      </div>
                      <div class="lmore"><a href="index.php?m=index&f=content&a=init&conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
">阅读全文</a></div>
                  </div>
                  <div class="lfooter">
                      <a href="index.php?m=index&f=author&a=authorList&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
">
                          <span>作者:&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value['uname'];?>
</span>
                      </a>
                      <a href="javascript:;">
                          <span class="iconfont icon-liulan"></span>
                          <?php echo $_smarty_tpl->tpl_vars['v']->value['hnum'];?>

                      </a>
                      <a href="javascript:;">
                          <span class="iconfont icon-dianzan "></span>
                         <?php echo $_smarty_tpl->tpl_vars['v']->value['glikeNum'];?>

                      </a>
                      <a href="javascript:;">
                          <span class="iconfont icon-shoucangC"></span>
                         <?php echo $_smarty_tpl->tpl_vars['v']->value['storeNum'];?>

                      </a>
                      <a href="javascript:;">
                          <span class="iconfont icon-huifu"></span>
                          <?php echo $_smarty_tpl->tpl_vars['v']->value['mnum'];?>

                      </a>
                  </div>
              </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

              <!--留言开始leavemessage结束-->
      </section>
      <!--推荐文章recommend结束-->
      <!--侧边栏aside开始-->
      <aside>
          <!--排行榜-->
         <div class="leaderboard">
             排行榜
             <p>The best you deserve is the best</p>
         </div>
          <div class="hits">
              <a href="">点击量 <span class="iconfont icon-up"></span></a>
              <div class="hitCon">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hits']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                  <ul class="hitConul">
                      <li>
                          <a href="index.php?m=index&f=author&a=authorList&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" style="display:inline-block"><span class="hitheadimg" style="background-image:url('<?php echo IMG_URL;?>
/s8.jpg')"></span></a>
                          <span><?php echo $_smarty_tpl->tpl_vars['v']->value['uname'];?>
</span>
                          <span><?php echo $_smarty_tpl->tpl_vars['v']->value['condate'];?>
</span>
                      </li>
                      <li>
                          <div class="htitle"><a href="index.php?m=index&f=content&a=init&conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['contitle'];?>
</a></div>
                          <div class="hcon"><a href="index.php?m=index&f=content&a=init&conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
">
                              <?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['content'];
$_prefixVariable2=ob_get_clean();
echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_prefixVariable2),90,"...",true);?>

                          </a></div>
                      </li>
                  </ul>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

              </div>
          </div>
          <div class="givelikes">
              <a href="">点赞榜 <span class="iconfont icon-dianzan"></span></a>
              <div class="hitCon">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['glikes']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                  <ul class="hitConul">
                      <li>
                          <a href="index.php?index.php?m=index&f=author&a=authorList&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" style="display:inline-block"><span class="hitheadimg" style="background-image:url('<?php echo IMG_URL;?>
/s8.jpg')"></span></a>
                          <span><?php echo $_smarty_tpl->tpl_vars['v']->value['uname'];?>
</span>
                          <span><?php echo $_smarty_tpl->tpl_vars['v']->value['condate'];?>
</span>
                      </li>
                      <li style="padding-left:0">
                          <div class="htitle" ><a href="index.php?m=index&f=content&a=init"><?php echo $_smarty_tpl->tpl_vars['v']->value['contitle'];?>
</a></div>
                          <div class="hcon"><a href="">
                              <div class="htitle"><a href="index.php?m=index&f=content&a=init&conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['contitle'];?>
</a></div>
                              <div class="hcon" style="padding-left: 0"><a href="index.php?m=index&f=content&a=init&conid=<?php echo $_smarty_tpl->tpl_vars['v']->value['conid'];?>
">
                                  <?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['content'];
$_prefixVariable3=ob_get_clean();
echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_prefixVariable3),90,"...",true);?>

                              </a>
                              </div>
                          </a></div>
                      </li>
                  </ul>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

              </div>
          </div>
          <div class="rauthor">
              <div class="rauthorcon">
                <span>推荐作者</span>
                <span class="iconfont icon-huanyipi"></span>
                <span class="TJauthor" authorstart="<?php echo $_smarty_tpl->tpl_vars['authorstart']->value;?>
"
                      authornum="<?php echo $_smarty_tpl->tpl_vars['authornum']->value;?>
" authnum="<?php echo $_smarty_tpl->tpl_vars['authnum']->value;?>
">换一批</span>
              </div>
              <div class="authorlist" style="height:320px;overflow: hidden">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authorList']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                  <ul class="authorL">
                      <li>
                          <a href="index.php?m=index&f=author&a=authorList&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['uphoto'];?>
" alt="图片加载错误"></a>
                      </li>
                      <li>
                          <p><?php echo $_smarty_tpl->tpl_vars['v']->value['uname'];?>
</p>
                          <div class="acontent">
                              <p>关注<span><?php echo $_smarty_tpl->tpl_vars['v']->value['attents'];?>
</span></p>
                              <p>粉丝<span><?php echo $_smarty_tpl->tpl_vars['v']->value['fans'];?>
</span></p>
                              <p>文章<span><?php echo $_smarty_tpl->tpl_vars['v']->value['cons'];?>
</span></p>
                          </div>
                      </li>
                  </ul>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

              </div>
          </div>

      </aside>
      <!--侧边栏aside结束-->

      <!--加载更多开始-->
      <section class="more" >
          <main>
              <span class="moreajax">
                  <div>加载更多</div>
              </span>
          </main>
      </section>
      <!--加载更多结束-->
      <!--footer开始-->
      <footer>
          <main>
            <ul class="footernav">
                <li>关于我们</li>
                <li>联系我们</li>
                <li>加入我们</li>
                <li>帮助中心</li>
            </ul>
            <div class="trademark">
               <p>©2016-2017 山西朔州爱因特有限公司  / 简书 / 晋ICP备11018329号-5 / 晋公网安备31010402002252号</p>
                <p>晋公网安备31010402002252号 /     举报电话：021-34770013</p>
            </div>
          </main>
      </footer>
      <!--footer结束-->
  </div>
</body>
</html><?php }
}
