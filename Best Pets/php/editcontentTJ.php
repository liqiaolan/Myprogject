<?php
  include  'db.php';
  $ttitle=$_POST['ttitle'];
  $tcon=addslashes(htmlspecialchars($_POST['tcon']));
  $tid=$_POST['tid'];
  $pid=$_POST['pid'];
  $timg=$_POST['timg'];
  $tcontent=isset($_POST['tcontent'])?$_POST['tcontent']:null;
  $sql="update contentnav set ttitle='{$ttitle}',tcon='{$tcon}',pid='{$pid}',timg='{$timg}',tcontent='{$tcontent}' where tid=".$tid;
  if($db->exec($sql)){
      echo "<script>location.href='../index/editcontent.php'</script>";
  }