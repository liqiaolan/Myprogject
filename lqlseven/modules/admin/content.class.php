<?php
  class content extends main{
      public function  init(){
          //分类查看
          $status=isset($_GET['status'])?" and constatus=".$_GET['status']:'';
          $permiss=isset($_GET['permiss'])?" and conpermiss=".$_GET['permiss']:'';
          //分页
          include_once LIBS_PATH.'/pages.class.php';
          $pageobj=new pages();

          $dbobj=new db('content');

          $pageobj->total=count($dbobj->select());
          $pageobj->nums=6;
          $this->smartyObj->assign('pages',$pageobj->show());
          //关联查询   推荐位有多个 分级查询
          $sql="select content.*,user.uname,category.cname from content,user,category where content.cid=category.cid and content.uid=user.uid ".$status."".$permiss." limit ".$pageobj->limit;
          $result=$dbobj->select($sql);
          //组合sql语句查询推荐位的信息
          $dbobj->setTable('recommend');
          $result1=$dbobj->select();
          foreach ($result as $key=>$value){
              //将每篇文章的rid转化为数组  key  下标
              $arr=explode(",",$value['rid']);
              $str='';
              foreach ($result1 as $v){
                  //转化为数组后找每一个rid是否在该数组中
                  //in_array判断数组中是否有某个值，返回boolean
                  if(in_array($v["rid"],$arr)){
                      $str.=$v['rname'].',';
                      $result[$key]['rname']=substr($str,0,-1);;
                  }
              }
          }
          $this->smartyObj->assign('lists',$result);
          $this->smartyObj->display('admin/articles.html');
      }
      //查看文章的详情进行审核

      public function showconNav(){
          $conid=$_GET['conid'];
          $dbobj=new db('content');
          $result=$dbobj->where('conid='.$conid)->selectfind();
          $this->smartyObj->assign('data',$result);
          $this->smartyObj->display('admin/showconNav.html');
      }
      //对文章进行审核
      public function constatus(){
          $conid=P('conid');
          $constatus=P('constatus');
          $dbobj=new db('content');
          if($dbobj->where('conid='.$conid)->update('constatus='.$constatus)){
              echo 'ok';
          }
      }
      //对文章权限进行修改
      public function conpermiss(){
          $conid=P('conid');
          $conpermiss=P('conpermiss');
          $dbobj=new db('content');
          if($dbobj->where('conid='.$conid)->update('conpermiss='.$conpermiss)){
              echo 'ok';
          }
      }

  }