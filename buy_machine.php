<?php 
session_start();
require "dbconnect.php";
$machine_num=(int)$_GET["machine_num"];
//echo $machine_num;
$date = date("Y-m-d H:i:s");
$uid = $_SESSION['uid'];
//echo $_SESSION['uid'];
//增加新機器
$sql = "insert into machine(user_id, machine_num, expired_date)values('$uid','$machine_num','$date')";
//echo $sql;
mysqli_query($db,$sql) or die("insert machine db error");

$sql = "select * from user_list where uid = '".$uid."'";
$res=mysqli_query($db,$sql) or die("find user error");
$row=mysqli_fetch_assoc($res);
//更改經驗值
if(($row['exp_now']+3)>=$row['exp_limit'])
{
	$exp_now = (($row['exp_now']+3)-$row['exp_limit']);
	$exp_limit = $row['exp_limit'] + 3;
	$lvl = $row['level']+1;
	$money = $row['money'] - 200;
	$sql_updated = "update user_list set exp_now='$exp_now', exp_limit='$exp_limit', level='$lvl', money='$money' where uid = '".$uid."'";
}
else
{
	
	$exp_now = ($row['exp_now']+3);
	$money = $row['money'] - 200;
	$sql_updated = "update user_list set exp_now='$exp_now', money='$money' where uid = '".$uid."'";
}
mysqli_query($db,$sql_updated) or die("update error");
//echo $sql_updated;
//活動記錄
//$sql_record = "insert into user_record (user_id, event)values('$uid','buy machine')";
//mysqli_query($db,$sql_record) or die("insert record db error");
echo "<script>window.location='index.php';</script>";
 //newD;

?>