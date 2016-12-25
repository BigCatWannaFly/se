<?php
 require "dbconnect.php";
 session_start();
 $machine_id=(int)$_GET['machine_id'];//記錄是哪台機器
 $bread = $_GET['bread'];//麵包的種類
 $sql = "select * from user_ingredient where user_id = '".$_SESSION['uid']."'";//記錄現有多少ing
 $res_i = mysqli_query($db,$sql) or die("search ing error");
 $row_i = mysqli_fetch_array($res_i);
 $bread1 = array('2','100','0','0','20','0');//record bread ingredient num
 $bread2 = array('1','150','0','100','50','0');
 $bread3 = array('2','200','30','0','0','50');
 $ing_left = array();
 $j = 0;
 
 if(!isset($_SESSION['uid']))
 {
	 header("Location: login.php");
 }
 //echo $machine_id;
 echo "<br/>";
 //echo $bread;
 echo "<br/>";
 if($bread == "toast")
 {
	 $newD = date("Y-m-d H:i:s",strtotime("+25215 seconds"));
	 $k = 0;
	 for($i = 2;$i < 8;$i++)
	 {
		 if($bread1[$j]!=0)
		 {
			 $ing_left[$k] = $row_i[$i] - $bread1[$j];
			 $k = $k + 1;
		 }
		 $j = $j + 1;
		 //echo $ing_left[$k]."---";
	 }
	 $sql = "update user_ingredient set egg='$ing_left[0]', flour='$ing_left[1]', sugar='$ing_left[2]' where user_id = '".$_SESSION['uid']."'";
	 $res=mysqli_query($db,$sql) or die("update ing error");
 }
 else if ($bread == "grim")
 {
	 $newD = date("Y-m-d H:i:s",strtotime("+25220 seconds"));
	 $k = 0;
	 for($i = 2;$i < 8;$i++)
	 {
		 if($bread2[$j]!=0)
		 {
			 $ing_left[$k] = $row_i[$i] - $bread2[$j];
			 $k = $k + 1;
		 }
		 $j = $j + 1;
		 
	 }
	 $sql = "update user_ingredient set egg='$ing_left[0]', flour='$ing_left[1]', cream='$ing_left[2]', sugar='$ing_left[3]' where user_id = '".$_SESSION['uid']."'";
	 $res=mysqli_query($db,$sql) or die("update ing error");
 }
 else if ($bread == "cow")
 {
	 $newD = date("Y-m-d H:i:s",strtotime("+25235 seconds"));
	 $k = 0;
	 for($i = 2;$i < 8;$i++)
	 {
		 if($bread3[$j]!=0)
		 {
			 $ing_left[$k] = $row_i[$i] - $bread3[$j];
			 $k = $k + 1; 
		 }
		 $j = $j + 1;
		 
	 }
	 
	 $sql = "update user_ingredient set egg='".$ing_left[0]."', flour='".$ing_left[1]."', cheese='".$ing_left[2]."', milk='".$ing_left[3]."' where user_id = '".$_SESSION['uid']."'";
	 $res=mysqli_query($db,$sql) or die("update ing error");
 }
 $sql="update machine set expired_date ='$newD', status='bake', product='$bread'  where machine_num = '$machine_id' and user_id = '".$_SESSION['uid']."'";
 $res=mysqli_query($db,$sql) or die("db error");
 echo "<script>window.location='index.php';</script>";
?>