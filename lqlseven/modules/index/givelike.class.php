<?php
error_reporting(E_ALL ^ E_NOTICE);
   defined('COME') or exit('非法入侵');
   class givelike{
       //首页的详细设计
       //换一批作者
      public function author(){
          $authorstart=P('authorstart');
          $authornum=P('authornum');
          $dbobj=new db('user');
          $authorList=$dbobj->select("select * from user order by uid asc limit ".$authorstart ."," .$authornum);
          foreach ($authorList as $key=>$value){
              $authorList[$key]['img']=IMG_URL;
          }
          foreach ($authorList as $key=>$value){
              $dbobj=new db('attention');
              $attents=count($dbobj->field('attid')->where('uid1='.$value['uid'])->select());
              $fans=count($dbobj->field('attid')->where('uid2='.$value['uid'])->select());
              $authorList[$key]['attents']=$attents;
              $authorList[$key]['fans']=$fans;
          }
          foreach ($authorList as $key=>$value){
              $dbobj=new db('content');
              $cons=count($dbobj->field('conid')->where('uid='.$value['uid'])->select());
              $authorList[$key]['cons']=$attents;
          }
        echo json_encode($authorList);
      }
      //首页的按需加载
       public function ajaxindex(){
           $pagenum=P('pagenum');
          $start=P('start');
          $dbobj=new db('user');
          $result=$dbobj->select("select content.*,user.uname from content,user  where content.uid=user.uid and constatus=3 and conpermiss=3 limit ".$start." ,".$pagenum);
           //阅读量的设置
           foreach ($result as $key=>$value){
               $dbobj->setTable('hits');
               $result1=$dbobj->field('hnum')->where('conid='.$value['conid'])->selectfind();
               if($result1['hnum']){
                   $result1['hnum']=$result1['hnum'];
               }else{
                   $result1['hnum']=0;
               }
               $result[$key]['hnum']=$result1['hnum'];
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