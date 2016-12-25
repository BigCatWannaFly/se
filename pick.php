<?php
 require "dbconnect.php";
 session_start();
 $machine_id=(int)$_GET['id'];
 $sql = "select product from machine where machine_num = '$machine_id' and user_id = '".$_SESSION['uid']."'";
 $res=mysqli_query($db,$sql) or die("search product from machine error");
 $row=mysqli_fetch_array($res);
 $sql = "update machine set status='free', product='' where machine_num = '$machine_id' and user_id = '".$_SESSION['uid']."'";
 $res=mysqli_query($db,$sql) or die("update machine error");
 
 //echo $machine_id;
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title> 首頁 </title>

    <meta name="keywords" content="">
    <meta name="description" content="">

	<script type="text/javascript" src="jquery.js"></script>
    <link rel="shortcut icon" href="favicon.ico"> <link href="hAdmin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="hAdmin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    
    <link href="hAdmin/css/animate.css" rel="stylesheet">
    <link href="hAdmin/css/style.css?v=4.1.0" rel="stylesheet">
	<!-- Sweet Alert -->
    <link href="hAdmin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
	<style type="text/css">
		
		body{font-family:Microsoft JhengHei;}
		.ibox{border:5px solid #733f51;}
		.red-bg{background:#f5f0f0;color:#404040}
		
		
		
	</style>
</head>
<body class="gray-bg red-bg">
	<div class="wrapper wrapper-content ">
		<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
				<div class="ibox animated rubberBand">
					<div class="ibox-content text-center" >
						<?php 
							if($row['product'] == "toast")//分辨麵包
							{
								$bread = "吐司";
								$sell = rand(40,70);
							}
							else if ($row['product'] == "grim")
							{
								$bread = "克林姆麵包";
								$sell = rand(70,90);
							}
							else
							{
								$bread = "牛角麵包";
								$sell = rand(100,125);
							}
						?>
						<i class="fa fa-smile-o" style="font-size:50pt;color:#733f51"></i>
						<h2><?php echo "你的".$bread."賣出了".$sell."元"?></h2>
						<a href='index.php' class='btn btn-danger btn-lg'  style='font-size:18pt;margin-top:5%'> 我知道了 </a>
					</div>
				</div>
				<?php
					$sql = "select * from user_list where uid = '".$_SESSION['uid']."'";
					$res=mysqli_query($db,$sql) or die("find user error");
					$row_u=mysqli_fetch_assoc($res);
					if(($row_u['exp_now']+2)>=$row_u['exp_limit'])
					{
						$exp_now = (($row_u['exp_now']+2)-$row_u['exp_limit']);
						$exp_limit = $row_u['exp_limit'] + 3;
						$lvl = $row_u['level']+1;
						$money = $row_u['money'] + (int)$sell;
						$sql_updated = "update user_list set exp_now='$exp_now', exp_limit='$exp_limit', level='$lvl', money='$money' where uid = '".$_SESSION['uid']."'";
					}
					else
					{
	
						$exp_now = ($row_u['exp_now']+2);
						$money = $row_u['money'] + (int)$sell;
						$sql_updated = "update user_list set exp_now='$exp_now', money='$money' where uid = '".$_SESSION['uid']."'";
					}
					mysqli_query($db,$sql_updated) or die("update user_list error");
					//$sql_record = "insert into user_record (user_id, event, sell)values('".$_SESSION['uid']."','sell ".$row['product']."','$sell')";
					//mysqli_query($db,$sql_record) or die("insert record db error");
				?>
			</div>
			<div class="col-sm-4">
			</div>
		</div>
		
		
	</div>
	
	
	
	<!-- 全局js -->
    <script src="hAdmin/js/jquery.min.js?v=2.1.4"></script>
    <script src="hAdmin/js/jquery-ui-1.10.4.min.js"></script>
    <script src="hAdmin/js/bootstrap.min.js?v=3.3.6"></script>
	
	
    <!-- 自定义js -->
    <script src="js/content.js?v=1.0.0"></script>
	<!-- Sweet alert -->
    <script src="hAdmin/js/plugins/sweetalert/sweetalert.min.js"></script>
	
	
	
</body>
</html>