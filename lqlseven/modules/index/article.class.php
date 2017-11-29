<?php
  class article extends  main{
      //显示写文章页面判断
      public function articaleCheck(){
          if(isset($_SESSION["indexuname"])){
              include LIBS_PATH.'/treeA.class.php';
              $db=new db('category');
              $treeobj=new treeA();
              $treeobj->getTree(0,'category',$db);
              $this->smartyObj->assign("tree",$treeobj->str);
              $db->setTable('user');
              if(isset($_SESSION['uid'])){
                  $selfuid=$_SESSION['uid'];
              }else{
                  $selfuid=0;
              }
              $selfdata=$db->where('uid='.$selfuid)->selectfind();
              $this->smartyObj->assign("selfdata",$selfdata);
              $this->smartyObj->assign("header",'index/header.html');
              $this->smartyObj->assign('indexuname',$_SESSION['indexuname']);
              $this->smartyObj->display('index/articale.html');
          }else{
              $_SESSION['nearurl']=SELF_URL;
              $this->smartyObj->assign("header",'index/header.html');
              $this->smartyObj->assign('indexuname',"");
              $this->smartyObj->display('index/login.html');
              header("location:index.php?m=index&f=login");
          }
      }
      //显示文章提示页面
      public function showwrite(){
          $this->smartyObj->display('index/showwrite.html');
      }
      //文章列表
      public function articleList(){
          $cid=$_GET['cid'];
          $uid=$_SESSION['uid'];
          $dbobj=new db('content');
          $result=$dbobj->where('cid='.$cid.' and uid='.$uid)->select();
          $this->smartyObj->assign('data',$result);
          $this->smartyObj->assign('cid',$cid);
          $this->smartyObj->display('index/articleList.html');
      }
      //写文章判断
      public  function write(){
          $dbobj=new db('recommend');
          $result=$dbobj->select();
          $this->smartyObj->assign('data',$result);
          $this->smartyObj->assign('cid',$_GET['cid']);
          $this->smartyObj->display('index/write.html');
      }
      //文章的缩略图
      public function  conthumb(){
          include LIBS_PATH.'/upload.php';
          $uploadObj=new Upload();
          $uploadObj->move();
      }
      //添加文章
      public function addarticle(){
          $contitle=addcslashes(sql(P('contitle')),'s');
          //那个用户发布的
          $uid=$_SESSION['uid'];
          //权限   普通  优秀 精华
          $conpermiss=1;
          //缩略图   修改缩略图在前台
          $conthumb=$_POST['conthumb'];
          //conpid   所属分类
          $cid=P('cid');
          //对于文章的内容防止script和style防止注入
          $content=addcslashes(P('content'),'s');
          $price=isset($_POST['price'])?P('price'):0;
          $price=sql($price);
          //状态
          $constatus=G('constatus');
          if($constatus==1){
              $name='保存成功';
          }else{
              $name='发布成功，等待审核';
          }
          //所属推荐位
          $rid=implode(',',P('rid'));
          $dbobj=new db('content');
          $arr=array(
              'contitle'=>"'{$contitle}'",
              'content'=>"'{$content}'",
              'uid'=>$uid,
              'conpermiss'=>$conpermiss,
              'conthumb'=>"'{$conthumb}'",
              'cid'=>$cid,
              'price'=>"'{$price}'",
              'constatus'=>$constatus,
              'rid'=>"'{$rid}'",
          );
          if($dbobj->insert($arr)){
              $this->smartyObj->assign('title',$name);
              $this->smartyObj->assign('uppage','index.php?m=index&f=article&a=write&cid='.$cid);
              $this->smartyObj->display('index/success.html');
              exit;
          }else{
              $this->smartyObj->assign('title','插入失败');
              $this->smartyObj->assign('uppage','index.php?m=index&f=article&a=write&cid='.$cid);
              $this->smartyObj->display('index/error.html');
              exit;
          }

      }
      //删除文章
      public  function delarticle(){
          $conid=G('conid');
          $cid=G('cid');
          $dbobj=new db('content');
          if($dbobj->where('conid='.$conid)->delete()){
              $this->smartyObj->assign('title','删除文章成功');
              $this->smartyObj->assign('uppage','index.php?m=index&f=article&a=articleList&cid='.$cid);
              $this->smartyObj->display('index/success.html');
              exit;
          }else{
              $this->smartyObj->assign('title','删除文章失败');
              $this->smartyObj->assign('uppage','index.php?m=index&f=article&a=articleList&cid='.$cid);
              $this->smartyObj->display('index/error.html');
              exit;
          }
      }
      //编辑文章
      public  function editarticle(){
          $conid=G('conid');
          $dbobj=new db('content');
          $result=$dbobj->where('conid='.$conid)->selectfind();
          $this->smartyObj->assign('conid',$conid);
          $this->smartyObj->assign('rids',$result['rid']);
          $this->smartyObj->assign('data',$result);
          $dbobj=new db('recommend');
          $lists=$dbobj->select();
          $this->smartyObj->assign('lists',$lists);
          $this->smartyObj->display('index/editarticle.html');
      }
      //编辑文章的检查
      public   function editCheck(){
          $contitle=addcslashes(sql(P('contitle')),'s');
          //那个用户发布的
          $uid=$_SESSION['uid'];
          //权限   普通  优秀 精华
          $conpermiss=1;
          //缩略图   修改缩略图在前台
          $conthumb=$_POST['conthumb'];
          //conpid   所属分类
          $cid=P('cid');
          //对于文章的内容防止script和style防止注入
          $content=addcslashes(P('content'),'s');
          $price=isset($_POST['price'])?P('price'):0;
          $price=sql($price);
          //状态
          $constatus=G('constatus');
          if($constatus==1){
              $name='保存成功';
          }else{
              $name='发布成功，等待审核';
          }
          //所属推荐位
          $rid=implode(',',P('rid'));
          //所属ID
          $conid=G('conid');
          $dbobj=new db('content');
          if($dbobj->where('conid='.$conid)->update("contitle='{$contitle}',content='{$content}',conthumb='{$conthumb}',price='{$price}',constatus={$constatus},rid='{$rid}'")>=0){
              $this->smartyObj->assign('title','修改文章成功');
              $this->smartyObj->assign('uppage','index.php?m=index&f=article&a=articleList&cid='.$cid);
              $this->smartyObj->display('index/success.html');
              exit;
          }else{
              $this->smartyObj->assign('title','修改文章失败');
              $this->smartyObj->assign('uppage','index.php?m=index&f=article&a=articleList&cid='.$cid);
              $this->smartyObj->display('index/success.html');
              exit;
          }
      }
      //不上传图片
      public  function delimg(){
          $conid=$_POST['conid'];
          $dbobj=new db('content');
          //删除文件  删除数据库
          $thumb=$dbobj->field('conthumb')->where('conid='.$conid)->selectfind();
          //删除文件使用unlink   $thumb是一个数组
          unlink($thumb['conthumb']);
          if($dbobj->where('conid='.$conid)->update("conthumb=''")){
              echo 'ok';
              exit;
          }else{
              echo 'no';
              exit;
          }

      }


  }
