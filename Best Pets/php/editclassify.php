<?php
$cid=$_GET['cid'];
$cname=$_GET['cname'];
$pid=$_GET['pid'];
include  'db.php';
include  '../libs/classify.php';

//   判断cid的父亲还有没有子类，没有state变为1
$sql1="select * from classify  where cid=".$cid;
$result=$db->query($sql1);
$result->setFetchMode(PDO::FETCH_ASSOC);
$row=$result->fetch();
$pid1=$row['pid'];


$sql="update classify set cname='{$cname}' ,pid={$pid} where cid=".$cid;
if($db->exec($sql)){
//将cid移入进去的父类state变为1
    $sql2="update classify set state=1 where cid=".$pid;
    $db->exec($sql2);
//   判断cid的父亲还有没有子类，没有state变为1
    $sql3="select count(cid) as num from classify where pid=".$pid1;
    $result1=$db->query($sql3);
    $result1->setFetchMode(PDO::FETCH_ASSOC);
    $row1=$result1->fetch();
    $num=$row1['num'];
    if($num==0){
        $sql="update classify set state=0 where cid=".$pid1;
        echo "<script>alert('修改成功1');location.href='../index/showclassify.php';</script>";
    }else{
        echo "<script>alert('修改成功2');location.href='../index/showclassify.php';</script>";
    }

}