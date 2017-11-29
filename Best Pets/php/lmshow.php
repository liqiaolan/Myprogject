<?php
include 'db.php';
$lname=$_GET['lname'];
$sql="select * from leavemessage where lname='{$lname}'";
$result=$db->query($sql);
$row=$result->rowCount();
$arr=array();
if($row=$result->fetch()){
    $arr[]=$row;
    echo json_encode($arr);
}
