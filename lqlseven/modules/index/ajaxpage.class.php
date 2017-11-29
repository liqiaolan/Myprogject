<?php
  class ajaxpage extends  main{
      function init(){
          $dbobj=new db('category');
          $result=$dbobj->limit("0,4")->select();
          $this->smartyObj->assign("list",$result);
          $this->smartyObj->display('index/ajaxpage.html');
      }
      function ajax(){
          sleep(3);
          $num=4;
          $page=$_GET['page'];
          $pages=$page*$num;
          $db=new db('category');
          $result=$db->limit($pages.','.$num)->select();
          echo  json_encode($result);
      }
  }