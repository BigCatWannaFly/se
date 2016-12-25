<?php
 require "dbconnect.php";
 session_start();
 $machine_id=(int)$_GET['id'];//記錄是哪台機器
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
	<script>
        $(document).ready(function () {
            $('.demo1').click(function () {
                swal({
                    title: "欢迎使用SweetAlert",
                    text: "Sweet Alert 是一个替代传统的 JavaScript Alert 的漂亮提示效果。"
                });
            });

            $('.demo2').click(function () {
                swal({
                    title: "太帅了",
                    text: "小手一抖就打开了一个框",
                    type: "success"
                });
            });

            $('.demo3').click(function () {
                swal({
                    title: "材料不足，不能夠烘烤",
                    text: "快去買多點材料吧！",
                    type: "warning",
                    showCancelButton: false,
                    closeOnConfirm: false
                });
            });

            $('.demo4').click(function () {
                swal({
                        title: "您确定要删除这条信息吗",
                        text: "删除后将无法恢复，请谨慎操作！",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "是的，我要删除！",
                        cancelButtonText: "让我再考虑一下…",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            swal("删除成功！", "您已经永久删除了这条信息。", "success");
                        } else {
                            swal("已取消", "您取消了删除操作！", "error");
                        }
                    });
            });


        });
    </script>
	<style type="text/css">
		body{font-family:Microsoft JhengHei;}
		.red2{background:#733f51;color:white}
		.ibox-content{border:1px solid #733f51}
		.red2 h2{font-size:20pt}
		.green{color:#39ac73;}
		.red{color:#ac3939}
		.red-bg{background:#f5f0f0;color:#404040}
		.ibox{border:5px solid #733f51;border-radius:5px;}
		 img{border:5px dashed #733f51}
		 h1{color:#522d3a;font-weight:700}
	</style>
	
</head>
<body class="red-bg">
	<div class="wrapper wrapper-content animated fadeInRight">
	<?php
	$sql = "select * from user_ingredient where user_id = '".$_SESSION['uid']."'";
	$res_i = mysqli_query($db,$sql) or die("search ing error");
	$row_i = mysqli_fetch_array($res_i);
	$bread1 = array('2','100','0','0','20','0');//record bread ingredient num
	$bread2 = array('1','150','0','100','50','0');
	$bread3 = array('2','200','30','0','0','50');
	$j = 0;
	$can_bake1 = true;
	$can_bake2 = true;
	$can_bake3 = true;
	for($i = 2;$i < 8;$i++)//計算材料夠不夠
	{
		if($row_i[$i] < $bread1[$j] and $bread1[$j] != 0)
		{
			$can_bake1 = false;
							
		}
		if($row_i[$i] < $bread2[$j] and $bread2[$j] != 0)
		{
			$can_bake2 = false;
							
		}
		if($row_i[$i] < $bread3[$j] and $bread3[$j] != 0)
		{
			$can_bake3 = false;
							
		}
		$j = $j +1;		
	}			
	?>
		<div class="col-sm-1">
		</div>
		
		<div class="col-sm-10">
			<div class="row">
				<div class="col-sm-4">
					<div class="ibox ">
						<a href="index.php">
						<div class="red2">
						<div class="ibox-content red2">
						
							<div class="row" >
								<div class="col-xs-4 text-center">
									<h2 ><i class="fa fa-home"></i></h2>
								</div>
								<div class="col-xs-8 text-left">
									<h2>返回首頁</h2>
								</div>
							</div>
						</div>
						</div>
						</a>
					</div>
					
					
				</div>
				<div class="col-sm-8">
					
				</div>
				
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="ibox">
					<?php
						if($can_bake1)
						{
							$link1 = "href='bake_insertdb.php?machine_id=$machine_id&bread=toast'";
						}
						else
						{
							$link1 = "class='demo3'";
						}
					?>
						<a <?php echo $link1 ?>>
						<div class="ibox-content">
							<div class="text-center">
								<?php if(!$can_bake1){ $style="opacity:0.5"; }else{ $style="opacity:1"; } ?>
									<img alt="" class=" m-t-xs img-responsive img-rounded" src="img/toast.jpg" width="80%" style="margin:10px auto;<?php echo $style; ?>">
                                <div class="m-t-xs font-bold"><h1>吐司</h1></div>
								<?php if($can_bake1){ echo "<h3 class='green'>可以烤咯！</h3>"; } else{ echo "<h3 class='red'>材料不足..</h3>"; } ?>
                            </div>
						</div>
						</a>
					</div>
					
				</div>
				<div class="col-sm-4">
					<div class="ibox">
					<?php
						if($can_bake2)
						{
							$link2 = "href='bake_insertdb.php?machine_id=$machine_id&bread=grim'";
						}
						else
						{
							$link2 = "class='demo3'";
						}
					?>
					<a <?php echo $link2 ?>>
						<div class="ibox-content">
							<div class="text-center">
							<?php if(!$can_bake2){ $style="opacity:0.5"; }else{ $style="opacity:1"; } ?>
									<img alt="" class=" m-t-xs img-responsive img-rounded" src="img/grim2.jpg" width="80%" style="margin:10px auto;<?php echo $style; ?>">
                                <div class="m-t-xs font-bold"><h1>克林姆麵包</h1></div>
								<?php if($can_bake2){ echo "<h3 class='green'>可以烤咯！</h3>"; } else{ echo "<h3 class='red'>材料不足..</h3>"; } ?>
                            </div>
						</div>
					</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="ibox">
					<?php
						if($can_bake3)
						{
							$link3 = "href='bake_insertdb.php?machine_id=$machine_id&bread=cow'";
						}
						else
						{
							$link3 = "class='demo3'";
						}
					?>
					<a <?php echo $link3 ?>>
						<div class="ibox-content">
							<div class="text-center">
							<?php if(!$can_bake3){ $style="opacity:0.5"; }else{ $style="opacity:1"; } ?>
									<img alt="" class=" m-t-xs img-responsive img-rounded" src="img/cow.jpg" width="80%" style="margin:10px auto;<?php echo $style; ?>">
                                <div class="m-t-xs font-bold"><h1>牛角麵包</h1></div>
								<?php if($can_bake3){ echo "<h3 class='green'>可以烤咯！</h3>"; } else{ echo "<h3 class='red'>材料不足..</h3>"; } ?>
                            </div>
						</div>
					</a>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="ibox">
						<div class="ibox-content">
							<div class="text-center">
								<h1 style="color:#522d3a" ><i class="fa fa-hand-pointer-o"></i><strong>請選擇想要烤的麵包</strong></h1>
							</div>
							
						</div>
					</div>
				</div>
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
	
	<script>
        $(document).ready(function () {
            $('.contact-box').each(function () {
                animationHover(this, 'pulse');
            });
        });
    </script>
	
</body>
</html>