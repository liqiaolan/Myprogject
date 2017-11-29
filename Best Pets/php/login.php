<?php
session_start();
if(isset($_SESSION['uname'])){
    echo '<script>
alert("Existing users login");
   </script>';
    exit;
}
include 'db.php';
$uname=$_POST['uname'];
$upassword=md5($_POST['upassword']);
$sql="select * from user where uname='{$uname}' and upassword='{$upassword}'";
$result=$db->query($sql);
if($result->rowCount()){
    $_SESSION['uname']=$uname;
    echo '<script>location.href="../best pets/index.php"</script>';
}else{
    echo '<script>alert("密码错误，请重试");location.href="../best pets/index.php"</script>';
}