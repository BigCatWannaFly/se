<?php 
session_start();
require "dbconnect.php";
$i=(int)$_GET["id"];
$newD = date("Y-m-d H:i:s",strtotime("+421 minutes"));
//echo $_SESSION['uid'];
$sql="update machine set expired_date ='$newD' where machine_num = '$i' and user_id = '".$_SESSION['uid']."'";
//echo $sql;
$res=mysqli_query($db,$sql) or die("db error");
echo "<script>window.location='index.php';</script>";
 //newD;
echo $newD;
?>