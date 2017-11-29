<?php
include 'db.php';
$tid=$_GET['tid'];
$sql="delete from contentnav where tid=".$tid;
if($db->exec($sql)){
    echo "<script>location.href='../index/delcontent.php'</script>";
}