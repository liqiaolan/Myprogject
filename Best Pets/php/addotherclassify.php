<?php
   include 'db.php';
   $oname=$_POST['oname'];
   $sql="insert into otherclassify (oname) values('{$oname}')";
   if($db->exec($sql)){
       echo "<script>location.href='../index/addotherclassify.php'</script>";
   }