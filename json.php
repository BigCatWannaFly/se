<?php 
require "dbconnect.php";
$i=(int)$_POST["id"];
$newD = date("Y-m-d H:i:s",strtotime("+421 minutes"));
$sql="update game set expire ='$newD' where id=$i";
$res=mysqli_query($db,$sql) or die("db error");
 //newD;
echo $newD;
?>
