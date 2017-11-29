<?php
$ttitle=$_GET["ttitle"];
include "db.php";
$sql="SELECT * FROM `contentnav` where ttitle='{$ttitle}'";
$result=$db->query($sql);
$result->setFetchMode(PDO::FETCH_ASSOC);
$arr=array();
while($row=$result->fetch()){
    $arr[]=$row;
}
echo json_encode($arr);
?>