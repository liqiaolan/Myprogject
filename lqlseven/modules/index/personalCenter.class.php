<?php
  class personalCenter extends main{
      //个人主页
      public function init(){
          $_SESSION['nearurl']=SELF_URL;
          //初始化smarty;
          $this->smartyObj->assign("header",'index/header.html');
          $this->smartyObj->assign('indexuname',isset($_SESSION['indexuname'])?$_SESSION['indexuname']:"");
          //显示个人资料的信息
          $dbobj=new db('user');
          $basic=$dbobj->where('uid='.$_SESSION['uid'])->selectfind();
          $this->smartyObj->assign("basic",$basic);
          $dbobj=new db('user');
          if(isset($_SESSION['uid'])){
              $selfuid=$_SESSION['uid'];
          }else{
              $selfuid=0;
          }
          $selfdata=$dbobj->where('uid='.$selfuid)->selectfind();
          $this->smartyObj->assign("selfdata",$selfdata);
          $this->smartyObj->display('index/personalCenter.html');
      }

      //基本资料修改图片
      public function editimg(){
          include_once LIBS_PATH.'/upload.php';
          $upload=new Upload();
          $upload->move();
      }
      public function imgCheck(){
          $uid=$_SESSION['uid'];
          $dbobj=new db('user');
          $uphoto=$dbobj->field('uphoto')->where('uid='.$uid)->selectfind();
          if($uphoto['uphoto']!='static/img/headimg.png'){
              unlink($uphoto['uphoto']);
          }
          $uphoto=$_POST['uphoto'];
          //删除文件使用unlink   $thumb是一个数组
          if($dbobj->where('uid='.$uid)->update('uphoto='."'$uphoto'")>0){
              echo 'ok';
              exit;
          }
      }
      //修改基本资料
      public  function basic(){
          $unicheng=isset($_POST['unicheng'])?sql(P('unicheng')):'';
          $upass=isset($_POST['upass'])?P('upass'):'';
          $upassA=isset($_POST['upassA'])?P('upassA'):'';
          $uphone=isset($_POST['uphone'])?P('uphone'):'';
          $uinfo=isset($_POST['uinfo'])?sql(P('uinfo')):'';
          //判断密码
          if(($upass&&$upassA)==''){
              echo '密码不能为空';
              exit;
          }
          if(!(preg_match('/^[a-zA-Z0-9]\w{5,11}$/',$upass)||preg_match('/^[a-zA-Z0-9]\w{5,11}$/',$upassA))){
              echo '密码不符合规则';
              exit;
          }
          $upass=md5(P('upass'));
          $upassA=md5(P('upassA'));
          if(!($upass==$upassA)){
              echo '两次密码不一致';
              exit;
          }
          if(!(preg_match( '/^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/',$uphone))){
              echo '请填写正确的手机号';
              exit;
          }
         $dbobj=new db('user');
         if($dbobj->where('uid='.$_SESSION['uid'])->update('unicheng='."'$unicheng'".', upass='."'$upass'".' ,uphone='.$uphone.' ,uinfo='."' $uinfo'")){
             echo 'ok';
         }

      }
      //我的关注
      public function attention(){
          $uid1=$_SESSION['uid'];  //关注者
          $dbobj=new db('attention');
          $result=$dbobj->select('select attention.*,user.uname,uphoto  from attention,user where attention.uid1='.$uid1.' and attention.uid2=user.uid');
          foreach ($result as $key=>$value){
              $attention=count($dbobj->where("uid1=".$value['uid2'])->select());
              $fans=count($dbobj->where("uid2=".$value['uid2'])->select());
              $result[$key]['attention']=$attention;
              $result[$key]['fans']=$fans;
          }
          $dbobj->setTable('content');
          foreach ($result as $key=>$value){
              $connum=count($dbobj->where('uid='.$value['uid2'])->select());
              $result[$key]['connum']=$connum;
          }
          echo json_encode($result);
      }
      //收藏文章
      public function store(){
          $uid1=$_SESSION['uid'];  //收藏者
          $dbobj=new db('store');
          $result=$dbobj->field('conid')->where('uid='.$uid1)->select();
          $dbobj=new db('content');
          foreach ($result as $key=>$value){
              $cons=$dbobj->where("conid=".$value['conid'])->select();
              $result[$key]['contitle']=$cons[0]['contitle'];
              $result[$key]['content']=$cons[0]['content'];
              $result[$key]['conthumb']=$cons[0]['conthumb'];
              $result[$key]['condate']=$cons[0]['condate'];
              $result[$key]['uid']=$cons[0]['uid'];
          }
          $dbobj=new db('user');
          foreach ($result as $key=>$value){
              $cons=$dbobj->where("uid=".$value['uid'])->select();
              $result[$key]['uname']=$cons[0]['uname'];
          }
          $dbobj=new db('hits');
          foreach ($result as $key=>$value){
              $hits=$dbobj->field('hnum')->where("conid=".$value['conid'])->selectfind();
              $result[$key]['hits']=$hits['hnum'];
          }
          $dbobj->setTable('givelike');
          foreach ($result as $key=>$value){
              //判断点赞的总数量
              $result2=$dbobj->field('gnum')->where('conid='.$value['conid'])->select();
              if(count($result2)){
                  $glikeNum=count($result2);
              }else{
                  $glikeNum=0;
              }
              $result[$key]['glikeNum']=$glikeNum;
          }
          $dbobj->setTable('store');
          foreach ($result as $key=>$value){
              //判断收藏的总数量
              $result2=$dbobj->field('snum')->where('conid='.$value['conid'])->select();
              if(count($result2)){
                  $storeNum=count($result2);
              }else{
                  $storeNum=0;
              }
              $result[$key]['storeNum']=$storeNum;
          }
          $dbobj->setTable('message');
          foreach ($result as $key=>$value){
              //评论总数
              $result2=$dbobj->field('mid')->where('conid='.$value['conid'].' and mstate=0')->select();
              if(count($result2)){
                  $messageNum=count($result2);
              }else{
                  $messageNum=0;
              }
              $result[$key]['messageNum']=$messageNum;
          }
          echo json_encode($result);
      }
  }