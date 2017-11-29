<?php
include 'db.php';
$uname=$_POST['uname'];
$upassword=md5($_POST['upassword']);
$checkbox=$_POST['checkboxB'];
$sql="insert into user (uname,upassword)values('{$uname}','{$upassword}')";
if($db->exec($sql)){
    echo '<script>alert("ok");location.href="../best pets/index.php"</script>';
}
