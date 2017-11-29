<?php
  class recommend extends main{
      public function init(){
          $dbobj=new db('recommend');
          $result=$dbobj->select();
          $this->smartyObj->assign('lists',$result);
         $this->smartyObj->display('admin/recommend.html');
      }
      //添加推荐位
      public  function addrecommend(){
          $rname=addslashes(htmlspecialchars(P('rname')));
          $dbobj=new db('recommend');
          if($dbobj->insert(array('rname' => "'$rname'"))>0){
              $this->smartyObj->assign('title','添加成功');
              $this->smartyObj->display('admin/alert.html');
              header('refresh:0.5,url=index.php?m=admin&f=recommend&a=init');
          }
      }
      //编辑推荐位
      public function editrecommend(){
          $rname=sql(P('rname'));
          $rid=P('rid');
          $dbobj=new db('recommend');
          if($dbobj->where('rid='.$rid)->update("rname='{$rname}'")){
              echo 'ok';
          }
      }
      //显示修改成功的页面
      public function editshow(){
          $this->smartyObj->assign('title','修改成功');
          $this->smartyObj->display('admin/alert.html');
          header('refresh:0.5,url=index.php?m=admin&f=recommend&a=init');
      }
      //删除推荐位
      public  function delrecommend(){
          $dbobj=new db('recommend');
          if(empty($_POST)){
              $this->smartyObj->assign('title','请选择您要删除的数据');
              $this->smartyObj->display('admin/alert.html');
              header('refresh:0.5,url=index.php?m=admin&f=recommend&a=init');
          }else{
             $all=isset($_POST['all'])?$_POST['all']:'';
             if($all==''){
                 $rids=$_POST['rid'];
                 $rid=implode(',',$rids);
                 if($dbobj->where('rid in ('.$rid.')')->delete()){
                     $this->smartyObj->assign('title','删除成功');
                     $this->smartyObj->display('admin/alert.html');
                     header('refresh:0.5,url=index.php?m=admin&f=recommend&a=init');
                 }else{
                     echo '<script>alert("删除失败")</script>';
                 }
             }elseif ($all=='all'){
                 if($dbobj->delete()){
                     $this->smartyObj->assign('title','全部删除');
                     $this->smartyObj->display('admin/alert.html');
                     header('refresh:0.5,url=index.php?m=admin&f=recommend&a=init');
                 }else{
                     echo '<script>alert("删除失败")</script>';
                 }
             }

          }
      }
  }