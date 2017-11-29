<?php
  class myarticle extends main{
      //我的文章
      public function myarticale(){
          $dbobj=new db('content');
          $result=$dbobj->where('uid='.$_SESSION['uid'])->select();
          $dbobj->setTable('user');
          foreach ($result as $key=>$value){
              $uname=$dbobj->field('uname')->where('uid='.$value['uid'])->selectfind();
              $result[$key]['uname']=$uname['uname'];
          }
          foreach ($result as $key=>$value){
              $dbobj->setTable('hits');
              $hitnum=$dbobj->field('hnum')->where('conid='.$value['conid'])->selectfind();
              if($hitnum['hnum']){
                  $hitnum['hnum']=$hitnum['hnum'];
              }else{
                  $hitnum['hnum']=0;
              }
              $result[$key]['hnum']=$hitnum['hnum'];
          }
          //点赞的数量
          $dbobj=new db('givelike');
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
          $this->smartyObj->assign('lists',$result);
          //收藏的数量
          $dbobj=new db('store');
          foreach ($result as $key=>$value){
              //收藏的总数量
              $result3=$dbobj->field('snum')->where('conid='.$value['conid'])->select();
              if(count($result3)){
                  $storeNum=count($result3);
              }else{
                  $storeNum=0;
              }
              $result[$key]['storeNum']=$storeNum;
          }
          //评论的数量
          $dbobj->setTable('message');
          foreach ($result as $key=>$value){
              //评论的总数量
              $messages=$dbobj->field('mid')->where('conid='.$value['conid'].' and mstate=0')->select();
              if(count($messages)){
                  $mnum=count($messages);
              }else{
                  $mnum=0;
              }
              $result[$key]['mnum']=$mnum;
          }
          $this->smartyObj->assign("lists",$result);
          $this->smartyObj->assign("indexuname",$_SESSION['indexuname']);
          $this->smartyObj->assign("header",'index/header.html');
          $this->smartyObj->assign('indexuname',isset($_SESSION['indexuname'])?$_SESSION['indexuname']:"");
          $dbobj=new db('user');
          $selfdata=$dbobj->where('uid='.$_SESSION['uid'])->selectfind();
          $this->smartyObj->assign("selfdata",$selfdata);
          $this->smartyObj->display('index/myarticale.html');
      }

    //正序
      public function asc(){
          $dbobj=new db('content');
          $result=$dbobj->order('condate asc')->where('uid='.$_SESSION['uid'])->select();
          $dbobj=new db('user');
          foreach ($result as $key=>$value){
              $uname=$dbobj->field('uname')->where('uid='.$value['uid'])->selectfind();
              $result[$key]['uname']=$uname['uname'];
          }
          foreach ($result as $key=>$value){
              $dbobj->setTable('hits');
              $hitnum=$dbobj->field('hnum')->where('conid='.$value['conid'])->selectfind();
              if($hitnum['hnum']){
                  $hitnum['hnum']=$hitnum['hnum'];
              }else{
                  $hitnum['hnum']=0;
              }
              $result[$key]['hnum']=$hitnum['hnum'];
          }
          //点赞的数量
          $dbobj=new db('givelike');
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
          $this->smartyObj->assign('lists',$result);
          //收藏的数量
          $dbobj=new db('store');
          foreach ($result as $key=>$value){
              //收藏的总数量
              $result3=$dbobj->field('snum')->where('conid='.$value['conid'])->select();
              if(count($result3)){
                  $storeNum=count($result3);
              }else{
                  $storeNum=0;
              }
              $result[$key]['storeNum']=$storeNum;
          }
          //评论的数量
          $dbobj->setTable('message');
          foreach ($result as $key=>$value){
              //评论的总数量
              $messages=$dbobj->field('mid')->where('conid='.$value['conid'].' and mstate=0')->select();
              if(count($messages)){
                  $mnum=count($messages);
              }else{
                  $mnum=0;
              }
              $result[$key]['mnum']=$mnum;
          }
          echo json_encode($result);
          exit;
      }
      //降序
      public function desc(){
          $dbobj=new db('content');
          $result=$dbobj->order('condate desc')->where('uid='.$_SESSION['uid'])->select();
          $dbobj=new db('user');
          foreach ($result as $key=>$value){
              $uname=$dbobj->field('uname')->where('uid='.$value['uid'])->selectfind();
              $result[$key]['uname']=$uname['uname'];
          }
          foreach ($result as $key=>$value){
              $dbobj->setTable('hits');
              $hitnum=$dbobj->field('hnum')->where('conid='.$value['conid'])->selectfind();
              if($hitnum['hnum']){
                  $hitnum['hnum']=$hitnum['hnum'];
              }else{
                  $hitnum['hnum']=0;
              }
              $result[$key]['hnum']=$hitnum['hnum'];
          }
          //点赞的数量
          $dbobj=new db('givelike');
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
          $this->smartyObj->assign('lists',$result);
          //收藏的数量
          $dbobj=new db('store');
          foreach ($result as $key=>$value){
              //收藏的总数量
              $result3=$dbobj->field('snum')->where('conid='.$value['conid'])->select();
              if(count($result3)){
                  $storeNum=count($result3);
              }else{
                  $storeNum=0;
              }
              $result[$key]['storeNum']=$storeNum;
          }
          //评论的数量
          $dbobj->setTable('message');
          foreach ($result as $key=>$value){
              //评论的总数量
              $messages=$dbobj->field('mid')->where('conid='.$value['conid'].' and mstate=0')->select();
              if(count($messages)){
                  $mnum=count($messages);
              }else{
                  $mnum=0;
              }
              $result[$key]['mnum']=$mnum;
          }
          echo json_encode($result);
          exit;
      }
  }