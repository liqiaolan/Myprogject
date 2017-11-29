<?php
 class register extends main{
     public function init(){
          $this->smartyObj->display('index/register.html');
     }
     public function code(){
         include LIBS_PATH.'/code.class.php';
         $codeObj=new code();
         $codeObj->height=40;
         $codeObj->width=106;
         $codeObj->linenum=8;
         $codeObj->codesize=array('min'=>20,"max"=>22);
         $codeObj->codeUrl='static/fonts/Scood.ttf';
         $codeObj->Out();
     }
     //前端验证用户名是否注册
     public function uname(){
         $uname=$_POST['uname'];
         $dbObj=new db('user');
         $result=$dbObj->where("uname='".$uname."'")->selectfind();
         if($result){
//             echo json_encode(false);
                echo "false";
         }else{
//             echo json_encode(true);
                echo "true";
         }
     }
     //验证手机验证码
     public function uphonecode(){
       $uphone=$_POST['uphone'];
       $zhongzi='1234567890';
       $str='';
       for($i=0;$i<4;$i++){
           $code=$zhongzi[mt_rand(0,strlen($zhongzi)-1)];
           $str.=$code;
       }
       echo $str;
       $_SESSION['rphonecode']=$str;

     }
     //验证
     public function check(){
       //1.验证图片验证码
         if(empty($_POST['ucode'])){
             $ucode=1234;
         }else{
             $ucode=$_POST['ucode'];
         }
         $_SESSION['indeximgcode']=isset($_SESSION['indeximgcode'])?$_SESSION['indeximgcode']:'';
         if(!($ucode==$_SESSION['indeximgcode'])){
             $this->smartyObj->assign('title','图片验证码错误');
             $this->smartyObj->assign('uppage','index.php?m=index&f=register&a=init');
             $this->smartyObj->display('index/error.html');
             exit;
         }
       //2.验证手机验证码
         $uphonecode=isset($_POST['uphonecode'])?$_POST['uphonecode']:'';
         $_SESSION['rphonecode']=isset($_SESSION['rphonecode'])?$_SESSION['rphonecode']:'';
         if(!($uphonecode==$_SESSION['rphonecode'])){
             $this->smartyObj->assign('title','手机验证码错误');
             $this->smartyObj->assign('uppage','index.php?m=index&f=register&a=init');
             $this->smartyObj->display('index/error.html');
             exit;
         }

        //3.验证用户名，密码
         $uname=sql(P('uname'));
         $upass=P('upass');
         $upassA=P('upassA');
         if(!(preg_match('/^[\x{4e00}-\x{9fa5} a-z A-Z]{1,9}$/u',$uname)||preg_match('/^[a-zA-Z0-9]\w{5,11}$/',$upass)||preg_match('/^[a-zA-Z0-9]\w{5,11}$/',$upassA))){
             $this->smartyObj->assign('title','用户名或者密码不符合规则');
             $this->smartyObj->assign('uppage','index.php?m=index&f=register&a=init');
             $this->smartyObj->display('index/error.html');
             exit;
         }
         $upass=md5(P('upass'));
         $upassA=md5(P('upassA'));
         if(!($upass==$upassA)){
             $this->smartyObj->assign('title','两次密码不一致');
             $this->smartyObj->assign('uppage','index.php?m=index&f=register&a=init');
             $this->smartyObj->display('index/error.html');
             exit;
         }
         $uphone=$_POST['uphone'];
         $dbObj=new db('user');
         $arr=array(
            "uname"=>"'$uname'",
            "upass"=>"'$upass'",
            "uphone"=>"'$uphone'",
            "uphoto"=>"'static/img/headimg.png'",
             "urid"=>1,
         );
         if($dbObj->insert($arr)){
             $_SESSION['indexuname']=$uname;
             $_SESSION['uid']=$dbObj->db->insert_id;
             $this->smartyObj->assign('title','注册成功');
             $this->smartyObj->assign('uppage','index.php');
             $this->smartyObj->display('index/success.html');
             exit;
         }

     }

 }