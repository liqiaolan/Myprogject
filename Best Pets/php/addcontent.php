<?php
$pid=$_POST['pid'];
$ttitle=$_POST['ttitle'];
$tcon=addslashes(htmlspecialchars($_POST['tcon']));
$oid=$_POST['oid'];
$timg=$_POST['timg'];
$tcontent=isset($_POST['content'])?$_POST['tcontent']:null;
include 'db.php';
$sql="insert into contentnav (ttitle,tcon,pid,oid,timg) values ('{$ttitle}','{$tcon}',{$pid},{$oid},'{$timg}','{$tcontent}')";
if($db->exec($sql)){
    echo "<script>location.href='../index/addcontent.php'</script>";
}
