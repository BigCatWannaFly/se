<?php
 require "dbconnect.php";
 session_start();
 if(!isset($_SESSION['uid']))
 {
	 header("Location: login.php");
 }
 else
 {
	 $sql = "select * from user_list where uid ='".$_SESSION['uid']."'";
	 $result = mysqli_query($db,$sql);
	 $row = mysqli_fetch_array($result);
	 $lvl = $row['level'];
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
	<!--<link href="hAdmin/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">-->
	<link href="ion.rangeSlider-2.1.4/css/ion.rangeSlider.css" rel="stylesheet">
	<link href="ion.rangeSlider-2.1.4/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!--<link href="hAdmin/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">-->
	<style type="text/css">
		.img-adjust{width:180px;height:100px;}
		.red2{background:#733f51;color:white}
		.red-bg{background:#f5f0f0;color:#404040}
		.ibox{border:3px solid #733f51;border-radius:5px;color:#522d3a}
		.ibox .ibox-title{border-bottom:3px solid #733f51;background: #733f51;color:white}
		.img-adjust img{border:1px solid #f6eff1}
		body{font-family:Microsoft JhengHei;}
		.table-hover{font-size:18pt;text-align:center;}
		
		.label-primary{background:#ff9933;color:white}
		.num{font-size:18pt;font-family:Microsoft JhengHei;}
		.table-hover th{text-align:center;font-size:10pt;}
		.table-hover tr{border-top:#f6eff1 3px solid}
		
	</style>
</head>
<body class="red-bg">
	<div class="wrapper wrapper-content animated fadeInRight">
		<div class="row">
			<div class="col-sm-1">
			</div>
			<div class="col-sm-10">
				<div class="col-sm-4">
					<a href="index.php">
					<div class="widget style1 red2">
						<div class="row">
						<div class="col-xs-4 text-center">
							<h2><i class="fa fa-home"></i></h2>
						</div>
						<div class="col-xs-8 text-left">
							<h2>返回首頁</h2>
						</div>
						</div>
					</div>
					</a>
				</div>
				<div class="col-sm-8">
				<div class="widget style1 yellow-bg" style="margin-bottom:2%">
                    <div class="row">
						<div class="col-xs-12 text-center">
							<h2 class="font-bold">現有金額 &nbsp&nbsp<i class="fa fa-usd"></i> <?php echo $row['money']?></h2>
						</div>   
                        
                    </div>
                </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-1">
			</div>
			<div class="col-sm-10">
				
			
				<div class="ibox">
					<div class="ibox-title">
						<h5 class="title"> 我的材料</h5>
					</div>
					<div class="ibox-content">
						<div class="full-height-scroll">
							<div class="table-responsive">
								<table class="table table-striped table-hover">
								<?php
									$sql = "select * from user_ingredient where user_id = '".$_SESSION['uid']."'";
									$res=mysqli_query($db,$sql) or die("find user error");
									$row=mysqli_fetch_array($res);
									$egg_price = rand(3,5);
									
									$flour_price = rand(5,15);
									
									$cheese_price = rand(10,20);
									
									$cream_price = rand(15,25);
									
									$sugar_price = rand(1,3);
									
									$milk_price = rand(10,20);
									
								?>
									<tr >
										<th >
											材料(圖)
										</th>
										<th>
											材料(名字)
										</th>
										<th>
											我擁有的數量（單位）
										</th>
										<th>
											市場販售的價格
										</th>
										<th>
											進貨
										</th>
									</tr>
									<tr>
										<td class='img-adjust'><img src='img/egg2.jpg' class='img-responsive'></td>
										<td>雞蛋</td>
										<td>擁有 <span class='label label-primary num'><?php echo $row['egg'] ?></span></td>
										<td><i class='fa fa-dollar' ></i> <?php echo $egg_price; ?>元 /1單位</td>
										<td><a class='btn btn-danger btn-md' data-toggle='modal' data-target='#ing1' style='font-size:18pt'><i class='fa fa-shopping-cart' style='font-size:25pt'></i> 我要進貨</a></td>
									</tr>
									<tr>
										<td class='img-adjust'><img src='img/flour.jpg' class='img-responsive'></td>
										<td>麵粉</td>
										<td>擁有 <span class='label label-primary num'><?php echo $row['flour'] ?></span></td>
										<td><i class='fa fa-dollar' ></i> <?php echo $flour_price; ?>元 /100單位</td>
										<td><a class='btn btn-danger btn-md' data-toggle='modal' data-target='#ing2' style='font-size:18pt'><i class='fa fa-shopping-cart' style='font-size:25pt'></i> 我要進貨</a></td>
									</tr>
									<tr>
										<td class='img-adjust'><img src='img/cheese.jpg' class='img-responsive'></td>
										<td>起司</td>
										<td>擁有 <span class='label label-primary num'><?php echo $row['cheese'] ?></span></td>
										<td><i class='fa fa-dollar' ></i>  <?php echo $cheese_price; ?>元/ 10單位</td>
										<td><a class='btn btn-danger btn-md' data-toggle='modal' data-target='#ing3' style='font-size:18pt'><i class='fa fa-shopping-cart' style='font-size:25pt'></i> 我要進貨</a></td>
									</tr>
									<tr>
										<td class='img-adjust'><img src='img/cream.jpg' class='img-responsive'></td>
										<td>奶油</td>
										<td>擁有 <span class='label label-primary num'><?php echo $row['cream'] ?></span></td>
										<td><i class='fa fa-dollar' ></i>  <?php echo $cream_price; ?>元/ 100單位</td>
										<td><a class='btn btn-danger btn-md' data-toggle='modal' data-target='#ing4' style='font-size:18pt'><i class='fa fa-shopping-cart' style='font-size:25pt'></i> 我要進貨</a></td>
									</tr>
									<tr>
										<td class='img-adjust'><img src='img/sugar.jpg' class='img-responsive'></td>
										<td>糖</td>
										<td>擁有 <span class='label label-primary num'><?php echo $row['sugar'] ?></span></td>
										<td><i class='fa fa-dollar' ></i>  <?php echo $sugar_price; ?>元/ 10單位</td>
										<td><a class='btn btn-danger btn-md' data-toggle='modal' data-target='#ing5' style='font-size:18pt'><i class='fa fa-shopping-cart' style='font-size:25pt'></i> 我要進貨</a></td>
									</tr>
									<tr>
										<td class='img-adjust'><img src='img/milk.jpg' class='img-responsive'></td>
										<td>牛奶</td>
										<td>擁有 <span class='label label-primary num'><?php echo $row['milk'] ?></span></td>
										<td><i class='fa fa-dollar' ></i>  <?php echo $milk_price; ?>元/ 100單位</td>
										<td><a class='btn btn-danger btn-md' data-toggle='modal' data-target='#ing6' style='font-size:18pt'><i class='fa fa-shopping-cart' style='font-size:25pt'></i> 我要進貨</a></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
					
				
		</div>
	</div>
		

	
	
		<div class="modal inmodal fade" id="ing1" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">購買雞蛋</h4>
                    </div>
					<form action="buy_ing.php" method="post">
                    <div class="modal-body">
						<div class="text-center">
							<h3>請選擇你要購買的數量</h3>
							<p> <strong>一次1單位</strong></p>
						</div>
                        <input type="text" id="ing1_num" name="ing_num" value="" />
						<input type="hidden" id="ing" name="ing" value="egg" />
						<input type="hidden" id="price" name="price" value="<?php echo $egg_price ?>" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                        <button class="btn btn-danger" type="submit">購買</button>
						
                    </div>
					</form>
                </div>
            </div>
        </div>
		
		<div class="modal inmodal fade" id="ing2" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">購買麵粉</h4>
                    </div>
					<form action="buy_ing.php" method="post">
                    <div class="modal-body">
						<div class="text-center">
							<h3>請選擇你要購買的數量</h3>
							<p> <strong>一次100單位</strong></p>
						</div>
                        <input type="text" id="ing2_num" name="ing_num" value="" />
						<input type="hidden" id="ing" name="ing" value="flour" />
						<input type="hidden" id="price" name="price" value="<?php echo $flour_price ?>" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                        <button class="btn btn-danger" type="submit">購買</button>
                    </div>
					</form>
                </div>
            </div>
        </div>
		
		<div class="modal inmodal fade" id="ing3" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">購買起司</h4>
                    </div>
					<form action="buy_ing.php" method="post">
                    <div class="modal-body">
						<div class="text-center">
							<h3>請選擇你要購買的數量</h3>
							<p> <strong>一次10單位</strong></p>
						</div>
                        <input type="text" id="ing3_num" name="ing_num" value="" />
						<input type="hidden" id="ing" name="ing" value="cheese" />
						<input type="hidden" id="price" name="price" value="<?php echo $cheese_price ?>" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                        <button class="btn btn-danger" type="submit">購買</button>
                    </div>
					</form>
                </div>
            </div>
        </div>
		
		<div class="modal inmodal fade" id="ing4" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">購買奶油</h4>
                    </div>
					<form action="buy_ing.php" method="post">
                    <div class="modal-body">
						<div class="text-center">
							<h3>請選擇你要購買的數量</h3>
							<p> <strong>一次100單位</strong></p>
						</div>
                        <input type="text" id="ing4_num" name="ing_num" value="" />
						<input type="hidden" id="ing" name="ing" value="cream" />
						<input type="hidden" id="price" name="price" value="<?php echo $cream_price ?>" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                        <button class="btn btn-danger" type="submit">購買</button>
                    </div>
					</form>
                </div>
            </div>
        </div>
		
		<div class="modal inmodal fade" id="ing5" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">購買糖</h4>
                    </div>
					<form action="buy_ing.php" method="post">
                    <div class="modal-body">
						<div class="text-center">
							<h3>請選擇你要購買的數量</h3>
							<p> <strong>一次10單位</strong></p>
						</div>
                        <input type="text" id="ing5_num" name="ing_num" value="" />
						<input type="hidden" id="ing" name="ing" value="sugar" />
						<input type="hidden" id="price" name="price" value="<?php echo $sugar_price ?>" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                        <button class="btn btn-danger" type="submit">購買</button>
                    </div>
					</form>
                </div>
            </div>
        </div>
		
		<div class="modal inmodal fade" id="ing6" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">購買牛奶</h4>
                    </div>
					<form action="buy_ing.php" method="post">
                    <div class="modal-body">
						<div class="text-center">
							<h3>請選擇你要購買的數量</h3>
							<p> <strong>一次100單位</strong></p>
						</div>
                        <input type="text" id="ing6_num" name="ing_num" value="" />
						<input type="hidden" id="ing" name="ing" value="milk" />
						<input type="hidden" id="price" name="price" value="<?php echo $milk_price ?>" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                        <button class="btn btn-danger" type="submit">購買</button>
                    </div>
					</form>
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
	<script src="hAdmin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- IonRangeSlider -->
    <!--<script src="hAdmin/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>-->
	<script src="ion.rangeSlider-2.1.4/js/ion.rangeSlider.min.js"></script>
	<script>
        $(document).ready(function () {
            $('.contact-box').each(function () {
                animationHover(this, 'pulse');
            });
        });
    </script>
	<?php
		//設定最大值（index的值）
		$test = 5; 
		$sql_user = "select * from user_list where uid = '".$_SESSION['uid']."'";
		$res_user = mysqli_query($db,$sql_user) or die("search user error");
		$row_user = mysqli_fetch_array($res_user);
	?>
	<script>
		$("#ing1_num").ionRangeSlider({
			grid:true,
			from: 0,
			values:["0單位","1單位","2單位","3單位","4單位","5單位","6單位","7單位","8單位","9單位","10單位"],
			from_max: <?php if(($row_user['money']/$egg_price)>=10 ){ echo 10; }else { echo ($row_user['money']/$egg_price)-1;} ?>,
			from_shadow: true
		});
		$("#ing2_num").ionRangeSlider({
			grid:true,
			from: 0,
			values:["0單位","100單位","200單位","300單位","400單位","500單位","600單位","700單位","800單位","900單位","1000單位"],
			from_max: <?php if(($row_user['money']/$flour_price)>=10 ){ echo 10; }else { echo ($row_user['money']/$flour_price)-1;} ?>,
			from_shadow: true
		});
		$("#ing3_num").ionRangeSlider({
			grid:true,
			from: 0,
			values:["0單位","10單位","20單位","30單位","40單位","50單位","60單位","70單位","80單位","90單位","100單位"],
			from_max: <?php if(($row_user['money']/$cheese_price)>=10 ){ echo 10; }else { echo ($row_user['money']/$cheese_price)-1;} ?>,
			from_shadow: true
		});
		$("#ing4_num").ionRangeSlider({
			grid:true,
			from: 0,
			values:["0單位","100單位","200單位","300單位","400單位","500單位","600單位","700單位","800單位","900單位","1000單位"],
			from_max: <?php if(($row_user['money']/$cream_price)>=10 ){ echo 10; }else { echo ($row_user['money']/$cream_price)-1;} ?>,
			from_shadow: true
		});
		$("#ing5_num").ionRangeSlider({
			grid:true,
			from: 0,
			values:["0單位","10單位","20單位","30單位","40單位","50單位","60單位","70單位","80單位","90單位","100單位"],
			from_max: <?php if(($row_user['money']/$sugar_price)>=10 ){ echo 10; }else { echo ($row_user['money']/$sugar_price)-1;} ?>,
			from_shadow: true
		});
		$("#ing6_num").ionRangeSlider({
			grid:true,
			from: 0,
			values:["0單位","100單位","200單位","300單位","400單位","500單位","600單位","700單位","800單位","900單位","1000單位"],
			from_max: <?php if(($row_user['money']/$milk_price)>=10 ){ echo 10; }else { echo ($row_user['money']/$milk_price)-1;} ?>,
			from_shadow: true
		});
	</script>
	
</body>
</html>