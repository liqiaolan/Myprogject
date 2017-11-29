<?php
$iid=$_GET['iid'];
include 'db.php';
$sql="select * from img where iid=".$iid;
$result=$db->query($sql);
$result->setFetchMode(PDO::FETCH_ASSOC);
$arr=array();
if($row=$result->fetch()){
    $arr[]=$row;
}
echo json_encode($arr);

