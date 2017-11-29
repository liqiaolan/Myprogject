<?php
defined('COME') or exit;
  class login extends main{
      //图片验证码的实现
      public function code(){
          include LIBS_PATH.'/code.class.php';
          $codeObj=new code();
          $codeObj->codeUrl='static/fonts/Scood.ttf';
          $codeObj->width=78;
          $codeObj->height=30;
          $codeObj->tname='admin';
          $codeObj->codesize=array('min'=>20,"max"=>22);
          $codeObj->Out();
      }
      //验证后台登录
      public function logincheck(){
          $smarty=new Smarty();
          $smarty->setTemplateDir('template');
          $smarty->setCompileDir('compile');
          $smarty->setCacheDir('cache');
          $smarty->caching=true;
          //先判断用户名密码是不是和以前的一样 一样不判断验证码  不一样判断验证码
          $aname=$_POST['aname'];
          $apass=$_POST['apassword'];
          //首先验证验证码的口令
          $code=$_POST['code'];
          //初始化数据库对象
          $dbObj=new db('admin');
          $dbObj->setTable('admin');
          $_COOKIE['aname']=isset($_COOKIE["aname"])?$_COOKIE["aname"]:'';
          $_COOKIE['apass']=isset($_COOKIE["apass"])?$_COOKIE["apass"]:'';
          if(!($aname==$_COOKIE['aname'] and $apass==$_COOKIE['apass'])){
              if($_SESSION['adminimgcode']!=$code){
                  echo "<script>alert('图片验证码错误');location.href='index.php?m=admin</script>";
                  exit;
              }
              // 对名字防止sql注入
              $aname=addslashes(htmlspecialchars($_POST['aname']));
              $apass=$_POST['apassword'];
              //对名字进行正则验证 ,对密码进行正则
              if(!(preg_match('/^[\x{4e00}-\x{9fa5} a-z A-Z]{1,9}$/u',$aname)||preg_match('/^[0-9a-zA-Z]\w{5,9}$/',$apass))){
                  echo "<script>alert('登陆名或者密码不符合规则,请重试');";
                  exit;
              }

              //对密码进行加密
              $apass=md5($apass);
              $result= $dbObj->where("aname='".$aname."' and "."apass='".$apass."'")->select();
          }else{
              $result= $dbObj->where("aname='".$aname."' and "."apass='".$apass."'")->select();
          }

          if($result){
              $_SESSION['adminaname']=$aname;
              $_SESSION['alevel']=$result[0]['alevel'];
              $_SESSION['aphoto']=$result[0]['aphoto'];
              //记住密码的实现
              //表单提交事件触发时，如果复选框是勾选状态则保存cookie
              if(P('cookiePass')=='1'){
                  setcookie('aname',$aname,time()+604800); //保存帐号到cookie，有效期7天  3600一小时
                  setcookie('apass',$apass,time()+604800); //保存密码到cookie，有效期7天
              }
              echo "<script>location.href='index.php?m=admin'</script>";
          }else{
              echo "<script>alert('用户名密码不匹配');location.href='index.php?m=admin'</script>";
          }



      }
      //清除cookie记住的用户名和密码
      public function cookiedel(){
          setcookie("aname", "", time()-604800);
          setcookie("apass", "", time()-604800);
          echo "ok";
      }
      //退出
      public function loginout(){
          unset($_SESSION['adminaname']);
          unset($_SESSION['alevel']);
          unset($_SESSION['aphoto']);
          echo "<script>alert('退出成功');location.href='index.php?m=admin'</script>";
      }
  }