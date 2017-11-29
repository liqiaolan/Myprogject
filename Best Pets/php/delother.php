<?php
  $oid=$_GET['oid'];
  include "db.php";
  $sql="delete from otherclassify where oid={$oid}";
  if($db->exec($sql)){
      echo "<script>location.href='../index/showother.php'</script>";
  }