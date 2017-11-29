<?php
  $lname=$_POST['lname'];
  $lemile=$_POST['lemile'];
  $lmobile=$_POST['lmobile'];
  $lmessage=isset($_POST['lmessage'])?$_POST['lmessage']:null;
  include 'db.php';
  $sql="insert into leavemessage (lname,lemile,lmobile,lmessage)values('{$lname}','{$lemile}','{$lmobile}','{$lmessage}')";
  $result=$db->query($sql);
  if($result){
      echo '<script>alert("留言成功");location.href="../best pets/html/Contact.php"</script>';
  }