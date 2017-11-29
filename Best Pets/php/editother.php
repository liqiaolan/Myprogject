<?php
include 'db.php';
$oname=$_POST['oname'];
$oid=$_POST['oid'];
$sql="update otherclassify set oid={$oid},oname='{$oname}' where oid=".$oid;
if($db->exec($sql)){
    echo "<script>location.href='../index/showother.php'</script>";
}