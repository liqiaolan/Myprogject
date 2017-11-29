<?php
class index extends main{
    public function init(){
        $_SESSION['nearurl']=SELF_URL;
        //判断是否登录
        $uid=isset($_SESSION["uid"])?$_SESSION["uid"]:"";
        $dbobj=new db('category');
        //推荐位
        $result=$dbobj->where('pid!=0')->select();
        $this->smartyObj->assign('data',$result);
        //文章推荐
        $result=$dbobj->select("select content.*,user.uname from content,user  where content.uid=user.uid and constatus=3 and conpermiss=3 limit 0,4");
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
        $this->smartyObj->assign('lists',$result);
        //点击量排行榜  限制取前2条
        $dbobj=new db('hits');
        $result2=$dbobj->order("hnum desc")->limit("0,2")->select();
        foreach($result2 as $key=>$value){
            $result3=$dbobj->select('select content.contitle,content,condate,user.uid,uname,uphoto from content,user  where content.conid='.$value['conid'].' and content.uid=user.uid');
            $result2[$key]['contitle']=$result3[0]['contitle'];
            $result2[$key]['content']=$result3[0]['content'];
            $result2[$key]['condate']=$result3[0]['condate'];
            $result2[$key]['uid']=$result3[0]['uid'];
            $result2[$key]['uname']=$result3[0]['uname'];
            $result2[$key]['uphoto']=$result3[0]['uphoto'];
        }
        $this->smartyObj->assign('hits',$result2);
        //点赞排行榜   限制取前2条
        $dbobj=new db('givelike');
        $result4=$dbobj->order('gnum desc')->limit("1,2")->select();
        foreach($result4 as $key=>$value){
            $result5=$dbobj->select('select content.contitle,content,condate,user.uid,uname,uphoto from content,user  where content.conid='.$value['conid'].' and content.uid=user.uid');
            $result4[$key]['contitle']=$result5[0]['contitle'];
            $result4[$key]['content']=$result5[0]['content'];
            $result4[$key]['condate']=$result5[0]['condate'];
            $result4[$key]['uid']=$result5[0]['uid'];
            $result4[$key]['uname']=$result5[0]['uname'];
            $result4[$key]['uphoto']=$result5[0]['uphoto'];
        }
        $this->smartyObj->assign('glikes',$result4);

        //推荐作者
        $authorstart=0;
        $authornum=5;
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
            $authorList[$key]['cons']=$cons;

        }
        $this->smartyObj->assign("authnum",$authnum);
        $this->smartyObj->assign("authornum",$authornum);
        $this->smartyObj->assign("authorstart",$authorstart);
        $this->smartyObj->assign("authorList",$authorList);
        //主要分配的值
        $this->smartyObj->assign("indexuname",isset($_SESSION["indexuname"])?$_SESSION["indexuname"]:"");
        $dbobj=new db('user');
        if($uid){
            $selfuid=$uid;
        }else{
            $selfuid=0;
        }
        $selfdata=$dbobj->where('uid='.$selfuid)->selectfind();
        $this->smartyObj->assign("selfdata",$selfdata);
        $this->smartyObj->assign("uid",$uid);
        $this->smartyObj->display('index/index.html');

    }
    //分类页
    public function category(){
        $_SESSION['nearurl']=SELF_URL;
        $cid=G('cid');
        $dbobj=new db('category');
        $result=$dbobj->where('cid='.$cid)->selectfind();
        $this->smartyObj->assign("data",$result);
        $dbobj->setTable('content');
        $result1=$dbobj->where('cid='.$cid.' and constatus=3')->select();
        $connum=count($result1);
        $this->smartyObj->assign("connum",$connum);
        //分配作者的信息
        $dbobj->setTable('user');
        foreach ($result1 as $key=>$value){
            $uname=$dbobj->field('uname')->where('uid='.$value['uid'])->selectfind();
            $result1[$key]['uname']=$uname['uname'];
        }
        foreach ($result1 as $key=>$value){
            $dbobj->setTable('hits');
            $hitnum=$dbobj->field('hnum')->where('conid='.$value['conid'])->selectfind();
            if($hitnum['hnum']){
                $hitnum['hnum']=$hitnum['hnum'];
            }else{
                $hitnum['hnum']=0;
            }
            $result1[$key]['hnum']=$hitnum['hnum'];
        }
        //点赞的数量
        $dbobj=new db('givelike');
        foreach ($result1 as $key=>$value){
            //判断点赞的总数量
            $result2=$dbobj->field('gnum')->where('conid='.$value['conid'])->select();
            if(count($result2)){
                $glikeNum=count($result2);
            }else{
                $glikeNum=0;
            }
            $result1[$key]['glikeNum']=$glikeNum;
        }
        $this->smartyObj->assign('lists',$result);
        //收藏的数量
        $dbobj=new db('store');
        foreach ($result1 as $key=>$value){
            //收藏的总数量
            $result3=$dbobj->field('snum')->where('conid='.$value['conid'])->select();
            if(count($result3)){
                $storeNum=count($result3);
            }else{
                $storeNum=0;
            }
            $result1[$key]['storeNum']=$storeNum;
        }
        //评论的数量
        $dbobj->setTable('message');
        foreach ($result1 as $key=>$value){
            //评论的总数量
            $messages=$dbobj->field('mid')->where('conid='.$value['conid'].' and mstate=0')->select();
            if(count($messages)){
                $mnum=count($messages);
            }else{
                $mnum=0;
            }
            $result1[$key]['mnum']=$mnum;
        }
        $this->smartyObj->assign("lists",$result1);
        $this->smartyObj->assign("header",'index/header.html');
        $this->smartyObj->assign('indexuname',isset($_SESSION['indexuname'])?$_SESSION['indexuname']:"");
        $dbobj=new db('user');
        if(isset($_SESSION['uid'])){
            $selfdata=$dbobj->where('uid='.$_SESSION['uid'])->selectfind();
            $this->smartyObj->assign("selfdata",$selfdata);
        }
        $this->smartyObj->display('index/category.html');
    }
    //查看更多分类
    public function categoryMore(){
        $_SESSION['nearurl']=SELF_URL;
        $dbobj=new db('category');
        $result=$dbobj->where('cid>16 and pid=0')->select();
        $dbobj->setTable('content');
        foreach($result as $key=>$value){
            $result1=$dbobj->where('cid='.$value['cid'].' and constatus=3')->select();
            $connum=count($result1);
            $result[$key]['connum']=$connum;
        }
        $this->smartyObj->assign("data",$result);
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
        $this->smartyObj->display('index/categoryMore.html');
    }
    //作者详情页
    public function  author(){
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
        $this->smartyObj->assign("lists",$result1);
        $dbobj=new db('user');
        if(isset($_SESSION['uid'])){
            $selfuid=$_SESSION['uid'];
        }else{
            $selfuid=0;
        }
        $selfdata=$dbobj->where('uid='.$selfuid)->selectfind();
        $this->smartyObj->assign("selfdata",$selfdata);
        $this->smartyObj->assign("header",'index/header.html');
        $this->smartyObj->assign('indexuname',isset($_SESSION['indexuname'])?$_SESSION['indexuname']:"");
        $this->smartyObj->display('index/author.html');
    }
    //点击量的设置
    public function hits(){
       $conid=P('conid');
       $dbobj=new db('hits');
       $result=$dbobj->where('conid='.$conid)->select();
       if(count($result)){
           $dbobj->where('conid='.$conid)->update("hnum=hnum+1");
       }else{
           $arr=array(
               "conid"=>$conid,
               "hnum"=>1,
           );
           $dbobj->insert($arr);
       }
    }
}


