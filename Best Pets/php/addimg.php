<?php
  include 'db.php';
  $pid=$_POST['pid'];
  $oid=$_POST['oid'];
  $iaddress=$_POST['iaddress'];
  $sql="insert into img(pid,oid,iaddress,ttitle)values('{$pid}','{$oid}','{$iaddress}','')";
    if($db->exec($sql)){
            echo "<script>location.href='../index/addimg.php';</script>";
    }


