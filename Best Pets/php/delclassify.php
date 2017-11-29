<?php
include 'db.php';
include "../libs/classify.php";
$cid=$_GET['cid'];
$obj=new trees();
$obj->del($cid,$db,'classify');
