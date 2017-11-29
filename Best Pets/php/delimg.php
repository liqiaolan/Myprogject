<?php
  $iid=$_GET['iid'];
 include 'db.php';
 $sql="delete from img where iid=".$iid;
 if($db->exec($sql)){
     echo '<script>location.href="../index/showimg.php"</script>';
 }