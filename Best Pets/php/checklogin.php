<?php
$uname=$_GET['uname'];
include 'db.php';
$sql="select * from user where uname = '{$uname}'";
$result=$db->query($sql);
if($result->rowCount()){
    echo json_encode(true);
}else{
    echo json_encode(false);
}
?>