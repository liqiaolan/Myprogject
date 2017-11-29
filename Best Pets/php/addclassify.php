<?php
include  'db.php';
//先获取元素
$pid =$_POST['pid'];
$cname=$_POST['cname'];
$classifyimg=$_POST['classifyimg'];
$sql="insert into classify(cname,pid,state,classifyimg)values('{$cname}','{$pid}',0,'{$classifyimg}')";
//$result=$db->exec($sql);
//$result->setFetchMode(PDO::FETCH_ASSOC);
//动态改变state的值  如果插入的元素有父类  则父类的state变为1

if($db->exec($sql)){
    if($pid!=0){
        $sql="update classify set state=1  where cid=".$pid;
        $db->exec($sql);
        echo "<script>alert('有父亲，添加成功');location.href='../index/addclassify.php';</script>";
    }else{
        echo "<script>alert('没有父亲，添加成功');location.href='../index/addclassify.php';</script>";
    }
}
