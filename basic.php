<?php
 require "dbconnect.php";
 session_start();
 if(!isset($_SESSION['uid']))
 {
	 header("Location: login.php");
 }
 else
 {
	 /*$sql = "select * from user_list where uid ='".$_SESSION['uid']."'";
	 $result = mysqli_query($db,$sql);
	 $row = mysqli_fetch_array($result);
	 $lvl = $row['level'];*/
 }
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
		
	</style>
</head>
<body class="gray-bg">
	<div class="wrapper wrapper-content animated fadeInRight">
	
		
	</div>
	
	
	
	<!-- 全局js -->
    <script src="hAdmin/js/jquery.min.js?v=2.1.4"></script>
    <script src="hAdmin/js/jquery-ui-1.10.4.min.js"></script>
    <script src="hAdmin/js/bootstrap.min.js?v=3.3.6"></script>
	
	
    <!-- 自定义js -->
    <script src="js/content.js?v=1.0.0"></script>
	<!-- Sweet alert -->
    <script src="hAdmin/js/plugins/sweetalert/sweetalert.min.js"></script>
	
	<script>
        $(document).ready(function () {
            $('.contact-box').each(function () {
                animationHover(this, 'pulse');
            });
        });
    </script>
	
</body>
</html>