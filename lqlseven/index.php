<?php
session_start();
//设置头信息
header("content-type:text/html;charset=utf-8");
//只能从本页面进入，需要设置常量come 单入口文件
define("COME",'YES');
//路径分为文件路径和web路径
//1.文件路径    include中识别文件路径
//服务器根目录
define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']);
//项目根目录
define('APP_PATH',substr($_SERVER['SCRIPT_FILENAME'],0,strrpos($_SERVER['SCRIPT_FILENAME'],'/')));
//核心文件libs目录
define('LIBS_PATH',APP_PATH.'/libs');
define('SMARTY_PATH',LIBS_PATH.'/smarty');
//模块modules目录
define('MODULES_PATH',APP_PATH.'/modules');
//静态网页修饰static目录
define('STATIC_PATH',APP_PATH.'/static');
//模板template目录
define('TEMPLATE_PATH',APP_PATH.'/template');
define('TINDEX_PATH',TEMPLATE_PATH.'/index');
define('TADMIN_PATH',TEMPLATE_PATH.'/admin');
//下载upload目录
define('UPLOAD_PATH',APP_PATH.'/upload');



//2.web路径   a链接等写web路径
//协议
//  define('PROTOCOL',strtolower(substr($_SERVER['SERVER_PROTOCOL'],0,strrpos($_SERVER['SERVER_PROTOCOL'],'/'))));
define('PROTOCOL',strtolower(strchr($_SERVER['SERVER_PROTOCOL'],'/',true)));
//主机地址
define('HOST',$_SERVER['HTTP_HOST']);
//项目地址[从根目录以下找]
define('APP_URL',substr($_SERVER['SCRIPT_NAME'],0,strrpos($_SERVER['SCRIPT_NAME'],'/')));
//当前地址
define("SELF_URL",PROTOCOL . "://" . HOST .$_SERVER["REQUEST_URI"]);
//服务器的项目路径
define('ROOT_URL',PROTOCOL.'://'.HOST.APP_URL);
define('LIBS_URL',ROOT_URL.'/libs');
define('UDITOR_URL',ROOT_URL.'/uditor');
//服务器中项目的static路径
define('STATIC_URL',ROOT_URL.'/static');
//static中各文件的路径
define('CSS_URL',STATIC_URL.'/css');
define('JS_URL',STATIC_URL.'/js');
define('IMG_URL',STATIC_URL.'/img');
define('ICONFONT_URL',STATIC_URL.'/iconfont');
//template中的路径
define('TEMPLATE_URL',ROOT_URL.'/template');
define('TINDEX_URL',TEMPLATE_URL.'/index');
define('TADMIN_URL',TEMPLATE_URL.'/admin');
//实例化对象
include_once LIBS_PATH."/route.class.php";
include_once LIBS_PATH."/function.class.php";
include_once SMARTY_PATH."/Smarty.class.php";
include_once LIBS_PATH."/main.class.php";
$config= include_once APP_PATH.'/config.class.php' ;
include_once LIBS_PATH.'/db.class.php';


$routeObj=new route();
$routeObj->set();

