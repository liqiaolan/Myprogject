<?php
header('content-type:text/html;charset=utf-8');
if(!defined('COME')){
    echo '非法访问';
    exit;
}
//使用route来解决多入口   路由类
class route{
    //php的属性不写在construct中
    //MVC架构  controler控制器->路由->地址栏
    //$m找文件夹，$f找文件   $a找方法
    //$m是找像modules下的index或者admin文件夹
    //static是静态变量  用于自己访问自己  self::$a
    private static $m;
    private static $f;
    private static $a;

    //获取信息
    private function getInfo(){
        //获取传递过来的值  $_GET和$_post有排他性只能获取指定的数值，使用$_REQUEST获取
        //判断是否传递了值，若没有或者传过来的是空值，默认指向index
        //$m默认为index文件夹   $f默认为index.class.php  $a默认是init方法
        self::$m=isset($_REQUEST['m'])&&!empty($_REQUEST['m'])?$_REQUEST['m']:"index";
        self::$f=isset($_REQUEST['f'])&&!empty($_REQUEST['f'])?$_REQUEST['f']:"index";
        self::$a=isset($_REQUEST['a'])&&!empty($_REQUEST['a'])?$_REQUEST['a']:"init";
    }

    //设置信息
    public function set(){
        //一级一级的找目录
        //调用getInfo方法
        $this->getInfo();
        //找modules下的文件
        $murl=MODULES_PATH.'/'.self::$m;
        //先判断有没有文件夹
        if(is_dir($murl)){
            //判断有没有f文件
            $furl=$murl.'/'.self::$f.'.class.php';
            if(is_file($furl)){
                //判断有没有$a方法
                //因为文件名称和类一样所以可以直接判断类是否存在
                include_once $furl;
                if(class_exists(self::$f)){
                    //判断有没有a方法
                    //先通过f实例化一个对象   然后调用a方法
                    $obj=new self::$f();
                    $method=self::$a;
                    if(method_exists($obj,$method)){
                        $obj->$method();
                    }else{
                        echo $method.'没有这个方法';
                    }

                }else{
                    echo  self::$f.'没有这个类';
                }
            }else{
                echo $furl.'没有该文件';
            }
        }else{
            echo $murl.'没有该文件夹';
        }
    }
}
?>