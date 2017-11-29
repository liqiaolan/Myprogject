<?php
  defined('COME') or exit('非法入侵');
  class author extends main{
      //作者详情页
    public function  authorList(){
          $_SESSION['nearurl']=SELF_URL;
          $uid=G('uid');
          $dbobj=new db('user');
          $result=$dbobj->where('uid='.$uid)->selectfind();
          //关注的实现
          $uid1=isset($_SESSION['uid'])?$_SESSION['uid']:'false';
          $this->smartyObj->assign("uid1",$uid1);
          $uid2=$uid;
          if($uid1==$uid2){
              $self=false;
          }else{
              $self=true;
          }
          $this->smartyObj->assign("self",$self);
          $dbobj->setTable('attention');
          $result1=$dbobj->where('uid1='.$uid1.' and uid2='.$uid2)->selectfind();
          $this->smartyObj->assign("atstatus",count($result1));
          //文章总数   关注 粉丝 喜欢的实现
          $atNum=count($dbobj->where('uid1='.$uid)->select());
          $fans=count($dbobj->where('uid2='.$uid)->select());
          $result['atNum']=$atNum;
          $result['fans']=$fans;
          $this->smartyObj->assign("data",$result);

          //文章获取
          $dbobj->setTable('content');
          $result1=$dbobj->where('uid='.$uid)->select();
          $this->smartyObj->assign("articleNum",count($result1));
           //文章的关注的显示
        //阅读量的设置
        foreach ($result1 as $key=>$value){
            $dbobj->setTable('hits');
            $result2=$dbobj->field('hnum')->where('conid='.$value['conid'])->selectfind();
            if($result2['hnum']){
                $result2['hnum']=$result2['hnum'];
            }else{
                $result2['hnum']=0;
            }
            $result1[$key]['hnum']=$result2['hnum'];
        }
        //点赞的数量
        $dbobj=new db('givelike');
        foreach ($result1 as $key=>$value){
            //判断点赞的总数量
            $result3=$dbobj->where('conid='.$value['conid'])->select();
            if(count($result3)){
                $glikeNum=count($result3);
            }else{
                $glikeNum=0;
            }
            $result1[$key]['glikeNum']=$glikeNum;
        }
        //收藏的数量
        //点赞的数量
        $dbobj=new db('store');
        foreach ($result1 as $key=>$value){
            //判断点赞的总数量
            $stores=$dbobj->where('conid='.$value['conid'])->select();
            if(count($stores)){
                $storeNum=count($stores);
            }else{
                $storeNum=0;
            }
            $result1[$key]['storeNum']=$storeNum;
        }
        //评论的数量
        //点赞的数量
        $dbobj=new db('message');
        foreach ($result1 as $key=>$value){
            //判断点赞的总数量
            $messages=$dbobj->where('conid='.$value['conid'])->select();
            if(count($messages)){
                $messNum=count($messages);
            }else{
                $messNum=0;
            }
            $result1[$key]['messNum']=$messNum;
        }
           //文章关注等的显示
          //同类作者显示
        //推荐作者
        $authorstart=0;
        $authornum=6;
        $dbobj=new db('user');
        $authnum=count($dbobj->select());
        $authorList=$dbobj->select("select * from user order by uid asc limit ".$authorstart ."," .$authornum);
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
        $this->smartyObj->assign("authnum",$authnum);
        $this->smartyObj->assign("authornum",$authornum);
        $this->smartyObj->assign("authorstart",$authorstart);
        $this->smartyObj->assign("authorList",$authorList);
          //同类作者显示结束
          $this->smartyObj->assign("lists",$result1);
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
          $this->smartyObj->display('index/author.html');
      }

  }