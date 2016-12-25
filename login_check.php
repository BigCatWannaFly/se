<?php
session_start();
require "dbconnect.php";

$username = $_POST['id_name'];
$password = $_POST['password'];
//$userName = mysqli_real_escape_string($db_conn,$userName);
$sql = "SELECT * FROM user_list WHERE id_name='$username'";
$result = mysqli_query($db,$sql);
$row=mysqli_fetch_array($result);
if ($row['password'] == $password)
{
	$_SESSION['uid'] = $row['uid'];
	$_SESSION['login_sucess'] = 1;
	
	echo "<script>window.location='index.php';</script>";
	//header("Location: index.php");
}
else
{
	$_SESSION['login_fail'] = 1;
	echo "<script>alert('登入失敗');</script>";
	//header("Location: login.php");
}
?>