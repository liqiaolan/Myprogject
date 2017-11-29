<?php
/* Smarty version 3.1.31, created on 2017-11-24 17:30:10
  from "D:\WAMP\wamp\www\lqlseven\template\index\write.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a18491241ff24_71313542',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bb7a62b6dc4437731c22d2df036e47d49a85394' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\index\\write.html',
      1 => 1510365808,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a18491241ff24_71313542 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo ICONFONT_URL;?>
/iconfont.css">
    <?php echo '<script'; ?>
 src="<?php echo LIBS_URL;?>
/upload.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="<?php echo UDITOR_URL;?>
/ueditor.config.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="<?php echo UDITOR_URL;?>
/ueditor.all.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="<?php echo UDITOR_URL;?>
/lang/zh-cn/zh-cn.js"><?php echo '</script'; ?>
>
    <title>写文章</title>
    <style>
        *{
            margin:0;
            padding:0;
            list-style: none;
            text-decoration: none;
        }
        /*百度编辑器*/
        #container{
            width:98%;
            height:300px;
        }
        .contitle{
            height: auto;
        }
        .contitle>input{
            width: 98%;
            height:40px;
            background: #f0f0f0;
            border:none;
            font-size:16px;
            outline:none;
            padding:4px 0px 4px 30px;
            box-sizing: border-box;
        }
        ::-webkit-input-placeholder{
            color:#ea6f5a;
        }
        button[type=submit]{
            padding:10px 16px;
            background: #fff;
            border-radius: 20px;
            border:2px solid rgb(234, 111, 90);
            color:rgb(234, 111, 90);
            outline: none;
            letter-spacing: 2px;
            font-weight: 500;
            cursor:pointer;
        }
        .parent{
            margin-top:10px;
        }
        .save{
            margin-right:20px;
        }
        .checkBox{
            font-size:14px;
            color:#333;
            margin:30px 0 0 0;
        }
        .checkBox>span{
            margin-right:16px;
        }
        .checkBox>span>input{
            vertical-align:middle;
            margin-right: 6px;
        }
        .price{
            width:160px;
            height:30px;
            display:flex;
            justify-content: space-between;
            border:1px solid #ccc;
            border-radius: 30px;
            background: #f2f2f2;
            margin:30px 0;
        }
        .price>input{
            height:100%;
            width:80%;
            border:none;
            outline:none;
            background: #f2f2f2;
            border-bottom-right-radius: 30px;
            border-top-right-radius: 30px;
            padding-left:6px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <section class="box">
        <form method="post">
            <!--文章标题-->
            <label class="contitle">
              <input type="text" name="contitle" placeholder="请输入标题" autofocus required>
            </label>
            <!--文章的缩略图-->
            <div class="parent">
            </div>
            <input type="hidden" name="conthumb" >
            <!--所属分类-->
            <input type="hidden" name="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
            <!--所属推荐位-->
            <div class="checkBox">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                    <span>
                        <input type="checkbox" name="rid[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['rid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['rname'];?>

                    </span>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            </div>
            <!--价格-->
            <div class="price">
                <img src="<?php echo IMG_URL;?>
/yuan.png" alt="" style="width:30px;height:30px;">
                <input type="text" name="price" autofocus placeholder="请输入价格" >
            </div>
            <!--状态-->
            <button type="submit" formaction="index.php?m=index&f=article&a=addarticle&constatus=1" class="save">我要保存</button>
            <button type="submit" formaction="index.php?m=index&f=article&a=addarticle&constatus=2" style="margin-bottom:40px;">我要发布</button>
            <!--文章内容-->
            <?php echo '<script'; ?>
 id="container" name="content" type="text/plain">
                这里写你的初始化内容
            <?php echo '</script'; ?>
>
        </form>
    </section>
</body>
<?php echo '<script'; ?>
>

    var ue = UE.getEditor('container', {
        toolbars: [
            [
                'undo', //撤销
                'redo', //重做
                'bold', //加粗
                'indent', //首行缩进
                'print', //打印
                'preview', //预览
                'horizontal', //分隔线
                'cleardoc', //清空文档
                'fontfamily', //字体
                'fontsize', //字号
                'paragraph', //段落格式
                'simpleupload', //单图上传
                'insertimage', //多图上传
                'link', //超链接
                'map', //Baidu地图
                'gmap', //Google地图
                'justifyleft', //居左对齐
                'justifyright', //居右对齐
                'justifycenter', //居中对齐
                'justifyjustify', //两端对齐
                'forecolor', //字体颜色
                'backcolor', //背景色
                'fullscreen', //全屏
                'imagenone', //默认
                'imageleft', //左浮动
                'imageright', //右浮动
                'lineheight', //行间距
                'touppercase', //字母大写
                'tolowercase', //字母小写
            ]
        ],
        autoHeightEnabled: true,
        autoFloatEnabled: true
    });
    <!--对缩略图进行设置-->
    var upload=new Upload();
    upload.selectBtnStyle="width:130px;height:40px;background:rgb(234, 111, 90);" +
        "border-radius:5px;";
    upload.upBtnStyle="width:130px;height:40px;background:#777;" +
        "border-radius:5px;clear:both;";
    upload.createView({
        parent:document.querySelector('.parent'),
    })
    upload.up('index.php?m=index&f=article&a=conthumb',function (e) {
        var imgpath=document.querySelector('input[name=conthumb]');
        imgpath.value=e;
    })
<?php echo '</script'; ?>
>
</html><?php }
}
