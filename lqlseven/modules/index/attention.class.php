<?php
  class attention extends main{
      //关注汇总页面
      public function gzmore(){
          $_SESSION['nearurl']=SELF_URL;
          $uid1=isset($_SESSION['uid'])?$_SESSION['uid']:'false';
              $dbobj=new db('user');
              $result=$dbobj->select("select uid,uname,uphoto from user limit 0,5");
              $dbobj->setTable('attention');
              foreach ($result as $key=>$value){
                  $attention=$dbobj->where('uid1='.$value['uid'])->select();
                  $fans=$dbobj->where('uid2='.$value['uid'])->select();
                  $result[$key]['attentnum']=count($attention);
                  $result[$key]['fans']=count($fans);
              }
              $dbobj->setTable('content');
              foreach ($result as $key=>$value) {
                  $connum = count($dbobj->where("uid=" . $value['uid'])->select());
                  $result[$key]['connum'] = $connum;
              }
          $this->smartyObj->assign("author",$result);
          $this->smartyObj->assign("uid1",$uid1);
          $this->smartyObj->assign("header",'index/header.html');
          $this->smartyObj->assign('indexuname',isset($_SESSION['indexuname'])?$_SESSION['indexuname']:"");
          $dbobj=new db('user');
          if(isset($_SESSION['uid'])){
              $selfuid=$_SESSION['uid'];
          }else{
              $selfuid=0;
          }
          $selfdata=$dbobj->where('uid='.$selfuid)->selectfind();
          $this->smartyObj->assign("selfdata",$selfdata);
          $this->smartyObj->display('index/gzmore.html');
      }
      //ajax获取数据页面
      public function ajaxadd(){
          $pagenum=P('pagenum');

          $start=P('start');
          $dbobj=new db('user');
          $result=$dbobj->select("select uid,uname,uphoto from user limit ".$start." ,".$pagenum);
          $dbobj->setTable('attention');
          foreach ($result as $key=>$value){
              $attention=$dbobj->where('uid1='.$value['uid'])->select();
              $fans=$dbobj->where('uid2='.$value['uid'])->select();
              $result[$key]['attentnum']=count($attention);
              $result[$key]['fans']=count($fans);
          }
          $dbobj->setTable('content');
          foreach ($result as $key=>$value) {
              $connum = count($dbobj->where("uid=" . $value['uid'])->select());
              $result[$key]['connum'] = $connum;
          }
          echo json_encode($result);
          exit;
      }
  }