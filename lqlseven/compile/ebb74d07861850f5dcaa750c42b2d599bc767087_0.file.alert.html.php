<?php
/* Smarty version 3.1.31, created on 2017-11-25 03:06:05
  from "D:\WAMP\wamp\www\lqlseven\template\admin\alert.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a18d00d3d85b5_17812745',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ebb74d07861850f5dcaa750c42b2d599bc767087' => 
    array (
      0 => 'D:\\WAMP\\wamp\\www\\lqlseven\\template\\admin\\alert.html',
      1 => 1510124518,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a18d00d3d85b5_17812745 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>提示信息</title>
    <style>
        .Box{
            width:300px;
            height:300px;
            box-shadow:0px 0px 8px 1px #3c4c87;
            position: absolute;
            top:20%;
            left:30%;
        }
        .box1{
            width:80%;
            height:100px;
            margin:0 auto;
            line-height:100px;
            font-size:30px;
            text-align:center;
            letter-spacing:2px;
            color:#0e0f0f;
        }
        .box2{
            width:88%;
            height:150px;
            margin:0 auto;
            text-align:center;
            font-size:20px;
            color:#3c4c87;
            font-weight:600;
            letter-spacing: 4px;
            line-height: 150px;
        }
    </style>
</head>
<body>
     <div class="Box">
         <div class="box1">提示信息</div>
         <div class="box2"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</div>
     </div>
</body>
</html><?php }
}
