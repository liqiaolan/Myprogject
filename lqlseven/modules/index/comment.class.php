<?php
defined('COME') or exit('非法入侵');
   class comment extends main{
       //添加留言
       public function addmessage(){
          $uid1=P('uid1');
          $uid2=P('uid2');
          $conid=P('conid');
          $mcon=P('mcon');
          $mstate=P('mstate');
          $arr=array(
              "uid1"=>$uid1,
              "uid2"=>$uid2,
              "conid"=>$conid,
              "mcon"=>"'{$mcon}'",
              "mstate"=>$mstate,
          );
          $dbobj=new db('message');
          $result=$dbobj->insert($arr);
          if($result){
              date_default_timezone_set('Asia/Shanghai');
              $this->smartyObj->assign('mdate',date('Y-m-d H:i:s',time()));
              $this->smartyObj->assign('mcon',$mcon);
              $this->smartyObj->assign('indexuname',isset($_SESSION['indexuname'])?$_SESSION['indexuname']:'');
              $this->smartyObj->assign('mstate',$dbobj->db->insert_id);
              $this->smartyObj->display('index/commentMessage.html');
          }

       }
       //添加回复
       public  function addhuifu(){
           $uid1=P('uid1');
           $uid2=P('uid2');
           $conid=P('conid');
           $mcon=P('mcon');
           $mstate=isset($_POST['mstate'])?P('mstate'):0;
           $arr=array(
               "uid1"=>$uid1,
               "uid2"=>$uid2,
               "conid"=>$conid,
               "mcon"=>"'{$mcon}'",
               "mstate"=>$mstate,
           );
           $dbobj=new db('message');
           if($dbobj->insert($arr)){
               $this->smartyObj->assign('indexuname',$_SESSION['indexuname']);
               $this->smartyObj->assign('mcon',$mcon);
               $this->smartyObj->assign('uid2',$uid1);
               //设置时区
               $dbobj->setTable('user');
               $result1=$dbobj->field('uname')->where('uid='.$uid1)->selectfind();
               $this->smartyObj->assign('uname',$result1['uname']);
               date_default_timezone_set('Asia/Shanghai');
               $this->smartyObj->assign('mdate',date("Y-m-d H:i:s",time()));
               $this->smartyObj->display('index/commentHuifu.html');
           }
       }
       //显示留言回复
       public function  showmessage(){
           $dbobj=new db('message');
           $conid=P('conid');
           //分页
           $pages=isset($_POST["pages"])?$_POST["pages"]+1:0;
           $num=3;
           $start=$pages*$num;
           $result=$dbobj->select("select message.*,user.uname from message,user where mstate=0 and conid=".$conid ." and user.uid=message.uid1  order by mdate desc limit ".$start." ,".$num);

           foreach ($result as $k=>$v){
               $arr=$dbobj->select("select message.*,user.uname from message,user where mstate={$v['mid']} and conid=".$conid ." and user.uid=message.uid1");
               if(!isset($result[$k]["son"])){
                   $result[$k]["son"]=array();
               }
               foreach ($arr as $v){
                   $result[$k]["son"][]=$v;
               }
           }
           //分配评论区
           $this->smartyObj->assign('data',$result);
           $this->smartyObj->assign('pages',1);
           $this->smartyObj->assign('conid',$conid);
           $uid=isset($_SESSION['uid'])?$_SESSION['uid']:'';
           $this->smartyObj->assign('indexuname',isset($_SESSION['indexuname'])?$_SESSION['indexuname']:'');
           $this->smartyObj->display('index/comment.html');

       }
       //分页
       public  function pages(){
           //评论分页的page
           $dbobj=new db('message');
           $pages=($_GET["pages"]<0)?0:$_GET["pages"];
           $num=3;
           /*总的条数/每页显示=页数
           控制点击的次数
           */
           $conid=$_GET["conid"];
           $total=count($dbobj->where('conid='.$conid.' and mstate=0')->select());
           $page=ceil($total/$num);
           if($pages>$page-1){
               $pages=0;
           }elseif ($pages<0){
               $pages=$page;
           }
           $start=$pages*$num;

           //显示分页页面
           $result=$dbobj->select("select message.*,user.uname from message,user where mstate=0 and conid=".$conid ." and user.uid=message.uid1  order by mdate desc limit ".$start." ,".$num);

           foreach ($result as $k=>$v){
               $arr=$dbobj->select("select message.*,user.uname from message,user where mstate={$v['mid']} and conid=".$conid ." and user.uid=message.uid1");
               if(!isset($result[$k]["son"])){
                   $result[$k]["son"]=array();
               }
               foreach ($arr as $v){
                   $result[$k]["son"][]=$v;
               }
           }
           $uid=isset($_SESSION['uid'])?$_SESSION['uid']:'';
           $this->smartyObj->assign('indexuname',isset($_SESSION['indexuname'])?$_SESSION['indexuname']:'');
           $this->smartyObj->assign("data",$result);
           $this->smartyObj->assign("pages",$pages);
           $this->smartyObj->assign("conid",$conid);
           $this->smartyObj->display("index/comment.html");
       }
   }