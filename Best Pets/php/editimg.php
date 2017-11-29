<?php
 $pid=$_POST['pid'];
 $iid=$_POST['iid'];
 $iaddress=$_POST['iaddress'];
 $oid=$_POST['oid'];
 include 'db.php';
 $sql="update img set pid={$pid},oid={$oid},iaddress='{$iaddress}' where iid=".$iid;
 if($db->exec($sql)){
     echo "<script>location.href='../index/showimg.php'</script>";
 }