<?php
header('content-type:text/html;charset=utf-8');
$config=include_once  APP_PATH.'/config.class.php';
  class treeA{
      public $str="";
      public function getTree($pid,$table,$db){
          $sql="select * from ".$table." where pid=".$pid;
          $result=$db->db->query($sql);
          $this->str.='<ul>';
          while($row=$result->fetch_assoc()){
              $sql1="select * from ".$table." where pid=".$row['cid'];
              $result1=$db->db->query($sql1);
              if(($result1->num_rows)>0){
                  $this->str.="<li class='parent'><span class='glyphicon glyphicon-tag'></span>".$row['cname']."</li>";
              }else{
                  $this->str.="<li><span class='glyphicon glyphicon-tags'></span><a href='index.php?m=index&f=article&a=articleList&cid=".$row["cid"]."'  target='right' id='son' style='color:#333'>".$row['cname']."</a></li>";
              }
              $this->getTree($row['cid'],$table,$db);
          }
         $this->str.="</ul>";

      }
  }

