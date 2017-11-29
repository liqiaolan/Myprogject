<?php
  class login extends main{
      public function init(){
          if(isset($_SESSION['indexuname'])){
              header("location:index.php");
              exit;
          }
          $this->smartyObj->display('index/login.html');
      }
      //验证码的方法
      public function code(){
          include LIBS_PATH.'/code.class.php';
          $codeObj=new code();
          $codeObj->height=40;
          $codeObj->width=106;
          $codeObj->linenum=8;
          $codeObj->codesize=array('min'=>20,"max"=>26);
          $codeObj->codeUrl='static/fonts/Scood.ttf';
          $codeObj->Out();
      }
      //手机验证
      public function phone(){
          require_once LIBS_PATH.'/Ucpaas.class.php';

//初始化必填
          $options['accountsid']='5898b971ad3a34bf686af5db01b8a4b7';
          $options['token']='e452f84d32d2a5492ff5073f26337f55';


//初始化 $options必填
          $ucpass = new Ucpaas($options);

//开发者账号信息查询默认为json或xml
          header("Content-Type:text/html;charset=utf-8");

//短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
          $appId = "d7225db8c5174c48a7a6066b07a991dc";   //你的应用ID
          $to = "18734969043";   //给谁发
          $templateId = "";
          $param="";    //发送的验证码

//          echo '<script>'.$ucpass->templateSMS($appId,$to,$templateId,$param).'</script>';
      }
      //手机验证
      public  function uphonecode(){
          $uphone=P('uphone');
          if(!preg_match('/^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/',$uphone)){
              $_SESSION['nearurl']=isset($_SESSION['nearurl'])?$_SESSION['nearurl']:'index.php';
              $this->smartyObj->assign('title','输入的手机格式不正确');
              $this->smartyObj->assign('uppage','inde.php?m=index&f=login&a=init');
              $this->smartyObj->display('index/error.html');
              exit;
          }
          $phonezhongzi='23456789';
          $str='';
          for($i=0;$i<4;$i++){
              $uphonecode=$phonezhongzi[mt_rand(0,strlen($phonezhongzi)-1)];
              $str.=$uphonecode;
          }
          echo $str;
          $_SESSION['uphonecode']=$str;
      }
      //对数据进行验证
      public function check(){
          $_SESSION['nearurl']=isset($_SESSION['nearurl'])?$_SESSION['nearurl']:'index.php';
          //1.判读图片验证码
          $ucode=isset($_POST['ucode'])?$_POST['ucode']:'';
          $ucode=strtolower($ucode);

          if($ucode!=$_SESSION['indeximgcode']){
              $this->smartyObj->assign('title','图片验证码错误');
              $this->smartyObj->assign('uppage','index.php?m=index&f=login&a=init');
              $this->smartyObj->display('index/error.html');
              exit;
          }
          //2.判断手机验证码
          $uphonecode=P('uphonecode');
          if(!($uphonecode==$_SESSION['uphonecode'])){
              $this->smartyObj->assign('title','手机验证码错误');
              $this->smartyObj->assign('uppage','index.php?m=index&f=login&a=init');
              $this->smartyObj->display('index/error.html');
              exit;
          }
          //3.判断用户名，密码等
            $uname=sql(P('uname'));
            $upass=P('upass');
            if(!(preg_match('/^[\x{4e00}-\x{9fa5} a-z A-Z]{1,9}$/u',$uname)||preg_match('/^[a-zA-Z0-9]\w{5,11}$/',$upass))){
                $this->smartyObj->assign('title','用户名或者密码不符合规则');
                $this->smartyObj->assign('uppage','index.php?m=index&f=login&a=init');
                $this->smartyObj->display('index/error.html');
                exit;
            }
            $upass=md5(P('upass'));
            $dbObj=new db('user');
            $result=$dbObj->where("uname='".$uname."' and upass='".$upass."'")->selectfind();
          if($result){
              //返回上一级页面  $_SERVER['HTTP_REFERER']
              $_SESSION['indexuname']=$uname;
              $_SESSION['uid']=$result['uid'];
              echo "<script>location.href='".$_SESSION['nearurl']."';</script>";
              exit;
            }else{
                $this->smartyObj->assign('title','用户名密码不匹配');
                $this->smartyObj->assign('uppage','index.php?m=index&f=login&a=init');
                $this->smartyObj->display('index/error.html');
                exit;
            }
      }
      //退出
      public function  loginout(){
          foreach ($_SESSION as $k=>$v){
              unset($_SESSION[$k]);
          }
          echo '<script>location.href="index.php?m=index&f=index&a=init"</script>';
      }
      //登录的时候实现跳回到原来页面

  }
?>