<?php
require "dbconnect.php";
session_start();
$username = $_POST['id_name'];
$nickname = $_POST['nickname'];
$password = $_POST['password'];
$register_date = date("Y-m-d H:i:s");
//$uid = $_SESSION['uid'];

$sql_total = "select count(*) from user_list where id_name ='".$username."'";
$result_total = mysqli_query($db,$sql_total);
$total = mysqli_fetch_row($result_total);
$total = ceil($total[0]);
echo $total;
if($total > 0)
{
	echo "<script>alert('ID重複');</script>";
	$_SESSION['same_id'] = 1;
	header("Location: register.php");
}
else
{
	$sql = "insert into user_list(id_name, nickname, password, level, money) values ('$username', '$nickname', '$password', '1', '1000')"; 
	if(mysqli_query($db,$sql))
	{
		$sql = "select * from user_list where id_name ='".$username."' and password ='".$password."'";
		$res=mysqli_query($db,$sql) or die("find user error");
		$row=mysqli_fetch_assoc($res);
		$uid = $row['uid'];
		$sql_m = "insert into machine(user_id, expired_date) values ('$uid','$register_date')" ;
		mysqli_query($db,$sql_m) or die("insert machine error");
		$sql_i = "insert into user_ingredient(user_id) values ('$uid')";
		mysqli_query($db,$sql_i) or die("insert user_ing error");
		//echo "<script>alert('修改成功');</script>";
		//$_SESSION['register_sucess'] =1;
		header("Location: login.php");
		//echo '<meta http-equiv=REFRESH CONTENT=0.1;url=login.html>';
	}
	else
	{
		echo "<script>alert('註冊失敗');</script>";
		//$_SESSION['register_sucess'] =1;
		header("Location: login.php");
		//echo '<meta http-equiv=REFRESH CONTENT=0.1;url=login.html>';
	}
}


?>