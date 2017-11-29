<?php
  //传入五个参数，$pid   所属分类   $db数据库   $table表  $step分隔符   $flag标志
   class trees{
       //定义一个str属性
       public $str="";
//      在显示的时候使用ul显示
       public $ul="";
       //添加的时候调用
       public function tree($pid,$db,$table,$step,$flag,$currentcid){
           $currentpid="";
           if($currentcid){
               $sql1="select * from ".$table." where cid=".$currentcid;
               $result1=$db->query($sql1);
               $result1->setFetchMode(PDO::FETCH_ASSOC);
               $row1=$result1->fetch();
               $currentpid=$row1['pid'];

           }
           $sql="select * from ".$table." where pid=".$pid;
           //$str保存分隔符
           $step+=1;
           $str=str_repeat($flag,$step);
           $result=$db->query($sql);
           $result->setFetchMode(PDO::FETCH_ASSOC);
           while($row=$result->fetch()){
               //为了将option放在页面中，创建一个数组
                $cid=$row['cid'];
                $cname=$row['cname'];

                if($currentpid==$cid){
                    $this->str .="<option value='".$cid."'selected>".$str.$cname."</option>";
                }else{
                    $this->str .="<option value='".$cid."'>".$str.$cname."</option>";
                }
                //创建的时候需要递归来实现每一层的分隔
               //传入的参数是  $cid
               $this->tree($cid,$db,$table,$step,$flag,$currentcid);
       }
       }

       //显示的时候调用
       public function show($pid,$db,$table,$step,$flag){
           $sql="select * from ".$table." where pid=".$pid;
           $result=$db->query($sql);
           $result->setFetchMode(PDO::FETCH_ASSOC);
           while($row=$result->fetch()){
               $cid=$row['cid'];
               $this->ul.="<ul>";
               $this->ul.="<li>".$row['cname']."
              <a href='../index/editclassify.php?cid=".$cid."'>编辑</a>
              <a href='../php/delclassify.php?cid=".$cid."'>删除</a>
              </li>";
               //递归来实现深层的查找
               $this->show($cid,$db,$table,$step,$flag);
               $this->ul.="</ul>";


           }

       }

       //删除的时候调用
    public function del($cid,$db,$table){
        $sql="select * from ".$table." where pid=".$cid;
        $result=$db->query($sql);
        if($result->rowCount()>0){
            echo "<script>alert('有子分类不能删除');location.href='../index/showclassify.php'</script>";
        }else{

            //根据cid查找pid

            $sql1="select pid from ".$table." where cid=".$cid;
            $result=$db->query($sql1);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row=$result->fetch();
            $pid=$row["pid"];

            $sql="delete from ".$table." where cid=".$cid;
            if($db->exec($sql)){

                $sql="select cname from classify  where pid= ".$pid;
                $result=$db->query($sql);
                if($result->rowCount()==0){
                    $sql="update classify  set state=0 where cid=".$pid;
                    if($db->exec($sql)){
                        echo "<script>alert('删除成功1');location.href='../index/showclassify.php'</script>";
                    }
                }else{
                    echo "<script>alert('删除成功2');location.href='../index/showclassify.php'</script>";
                }


            }
        }
    }


    //图片编辑的时候调用
    public function img($pid,$db,$table,$step,$flag,$currentcid){
        if($currentcid){
            $sql1="select * from ".$table." where cid=".$currentcid;
            $result1=$db->query($sql1);

        }
        $sql="select * from ".$table." where pid=".$pid;
        //$str保存分隔符
        $step+=1;
        $str=str_repeat($flag,$step);
        $result=$db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while($row=$result->fetch()){
            //为了将option放在页面中，创建一个数组
            $cid=$row['cid'];
            $cname=$row['cname'];

            if($currentcid==$cid){
                $this->str .="<option value='".$cid."'selected>".$str.$cname."</option>";
            }else{
                $this->str .="<option value='".$cid."'>".$str.$cname."</option>";
            }
            //创建的时候需要递归来实现每一层的分隔
            //传入的参数是  $cid
            $this->tree($cid,$db,$table,$step,$flag,$currentcid);
        }
    }
   }
