<?php
require "dbconnect.php";
session_start();
$ing_num = $_POST['ing_num'];//xx單位
$ing = $_POST['ing'];
$price = $_POST['price'];
$length = mb_strlen( $ing_num, "utf-8");

if($ing == "egg")//轉換成數字
{//個數
	if($length >= 4)
	{
		$price = 10 * $price;
		$ing_num = 10;
	}
	else
	{
		$p_array = str_split($ing_num);
		$price = (int)$p_array[0] * $price;//消費的價格
		$ing_num = (int)$p_array[0];//計算進貨數量
	}
}
else if($ing == "cheese" or $ing == "sugar")
{//十位數
	if($length >= 5)
	{
		$price = 10 * $price;
		$ing_num = 100;
	}
	else
	{
		$p_array = str_split($ing_num);
		$price = (int)$p_array[0] * $price;
		$ing_num = (int)$p_array[0] * 10;
	}
}
else//百位數
{
	if($length >= 6)
	{
		$price = 10 * $price;
		$ing_num = 1000;
	}
	else
	{
		$p_array = str_split($ing_num);
		$price = (int)$p_array[0] * $price;
		$ing_num = (int)$p_array[0] * 100;
	}
}
//echo "進貨數量 :".$ing_num."";
$sql ="select a.*,b.* from user_list a LEFT OUTER JOIN user_ingredient b on a.uid = b.user_id where a.uid = '".$_SESSION['uid']."'";
$res = mysqli_query($db,$sql) or die("search user error");
$row = mysqli_fetch_array($res);
$sum = $row[$ing] + $ing_num;//計算加總數量
//echo "total:".$sum;
$sql = "update user_ingredient set ".$ing." = '".$sum."' where user_id = '".$_SESSION['uid']."'";
$res = mysqli_query($db,$sql) or die("update ingredient error");

$sum = $row['money'] - $price;//減點金錢
$sql = "update user_list set money = '".$sum."' where uid = '".$_SESSION['uid']."'";
$res = mysqli_query($db,$sql) or die("update money error");

//$sql = "insert into user_record (user_id,event,buy_num) values ('".$_SESSION['uid']."','buy ".$ing."','$ing_num')";
//$res = mysqli_query($db,$sql) or die("insert record error");
echo "<script>window.location='ingredient.php';</script>";
?>







