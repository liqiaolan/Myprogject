<?php
defined('COME') or exit('非法入侵');
   class content extends  main{
       public function init(){
           //初始化smarty;
           $conid=G('conid');
           $dbobj=new db('content');
           $result=$dbobj->select('select content.*,user.uid,uname,uphoto from content,user where content.uid=user.uid and conid='.$conid);
           $this->smartyObj->assign("data",$result);
           $this->smartyObj->assign("conid",$result[0]['conid']);
           $uid1=isset($_SESSION['uid'])?$_SESSION['uid']:'false';
           $this->smartyObj->assign("uid1",$uid1);
           $uid2=$result[0]['uid'];
           if($uid1==$uid2){
               $self=false;
           }else{
               $self=true;
           }
           $this->smartyObj->assign("self",$self);
           $dbobj->setTable('attention');
           $result1=$dbobj->where('uid1='.$uid1.' and uid2='.$uid2)->selectfind();
           $this->smartyObj->assign("atstatus",count($result1));
           $this->smartyObj->assign("header",'index/header.html');
           $this->smartyObj->assign("indexuname",isset($_SESSION["indexuname"])?$_SESSION["indexuname"]:"");
           $dbobj->setTable('user');
           $result2=$dbobj->field('uphoto,uid')->where('uid='.$uid1)->selectfind();
           $this->smartyObj->assign("list",$result2);
           $_SESSION['nearurl']=SELF_URL;
           //点赞实现开始
           //点赞的数量
           $dbobj=new db('givelike');
           $glikeNum=count($dbobj->where('conid='.$conid)->select());
           if(empty($glikeNum)){
               $glikeNum=0;
           }else{
               $glikeNum=$glikeNum;
           }
           $this->smartyObj->assign('glikeNum',$glikeNum);

//            //判断是否已经点赞
               $result3=$dbobj->where('uid='.$uid1.' and conid='.$conid)->selectfind();
               if(count($result3)){
                   $glikeflag=1;
               }else{
                   $glikeflag=0;
               }
           $this->smartyObj->assign('glikeflag',$glikeflag);
           //点赞实现结束

           //收藏实现开始
           //点赞的数量
           $dbobj=new db('store');
           $storeNum=count($dbobj->where('conid='.$conid)->select());
           if(empty($glikeNum)){
               $storeNum=0;
           }else{
               $storeNum=$storeNum;
           }
           $this->smartyObj->assign('storeNum',$storeNum);

//            //判断是否已经收藏
           $result3=$dbobj->where('conid='.$conid.' and uid='.$uid1)->selectfind();
           if(count($result3)){
               $storeflag=1;
           }else{
               $storeflag=0;
           }
           $dbobj=new db('user');
           if(isset($_SESSION['uid'])){
               $selfuid=$_SESSION['uid'];
           }else{
               $selfuid=0;
           }
           $selfdata=$dbobj->where('uid='.$selfuid)->selectfind();
           $this->smartyObj->assign("selfdata",$selfdata);
           $this->smartyObj->assign('storeflag',$storeflag);
           //收藏实现结束
           $this->smartyObj->display('index/content.html');
       }
       //关注的实现
       public function guanzhu(){
           $uid1=P('uid1');
           $uid2=P('uid2');
           $dbobj=new db('attention');
           $arr=array(
               "uid1"=>$uid1,
                "uid2"=>$uid2,
           );
           if($dbobj->insert($arr)){
              echo 'ok';
           }
       }
       //取消关注的实现
       public  function guanzhudel(){
           $uid1=P('uid1');
           $uid2=P('uid2');
           $dbobj=new db('attention');
           if($dbobj->where('uid1='.$uid1.' and uid2='.$uid2)->delete()){
               echo 'ok';
           }
       }
       //点赞的实现
       //       1.点赞
       public function addglike(){
           $uid=P('uid');
           $conid=P('conid');
           $dbobj=new db('givelike');
           if($dbobj->insert(array(
               "uid"=>$uid,
               "conid"=>$conid,
           ))){
               $gid=$dbobj->db->insert_id;
               $dbobj=new db('givelike');
               $dbobj->where('conid='.$conid)->update('gnum=gnum+1');
               $dbobj->where('gid='.$gid)->update('gnum=gnum+1');
               echo 'ok';
           }
       }
       public  function delglike(){
           $uid=P('uid');
           $conid=P('conid');
           $dbobj=new db('givelike');
           if($dbobj->where('conid='.$conid.' and uid='.$uid)->delete()){
               $dbobj->where('conid='.$conid)->update('gnum=gnum-1');
               echo 'ok';
           }
       }

       //       1.收藏
       public function addstore(){
           $uid=P('uid');
           $conid=P('conid');
           $dbobj=new db('store');
           if($dbobj->insert(array(
               "uid"=>$uid,
               "conid"=>$conid,
           ))){
               $gid=$dbobj->db->insert_id;
               $dbobj=new db('store');
               $dbobj->where('conid='.$conid)->update('snum=snum+1');
               $dbobj->where('gid='.$gid)->update('snum=snum+1');
               echo 'ok';
           }
       }
       public  function delstore(){
           $uid=P('uid');
           $conid=P('conid');
           $dbobj=new db('store');
           if($dbobj->where('conid='.$conid.' and uid='.$uid)->delete()){
               $dbobj->where('conid='.$conid)->update('snum=snum-1');
               echo 'ok';
           }
       }
   }