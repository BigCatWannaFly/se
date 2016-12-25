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
	 $money = $row['money'];
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
	<link href="hAdmin/css/login.css" rel="stylesheet">
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
                    title: "哎呀！你的等級暫無法購買機器",
                    text: "你需要升級以後才能購買",
                    type: "warning",
                    showCancelButton: false,
                    closeOnConfirm: false
                });
            });

            $('.demo4').click(function () {
                swal({
                        title: "金錢不够",
                        text: "你現有金額不足以購買多一台機器",
                        type: "error",
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "我知道了！",
                    });
            });


        });
    </script>
	<script language="javascript">

function handleBomb(bombID) {
	now= new Date(); //get the current time
	tday=new Date(myArray[bombID]['expire'])
	console.log(now, tday)
	if (tday <= now) {
		//alert('exploded');
		//use jQuery ajax to reset timer
		$.ajax({
			url: "json.php",
			dataType: 'html',
			type: 'POST',
			data: { id: myArray[bombID]['id']}, //optional, you can send field1=10, field2='abc' to URL by this
			error: function(response) { //the call back function when ajax call fails
				alert('Ajax request failed!');
				},
			success: function(txt) { //the call back function when ajax call succeed
				alert("Bomb" + bombID + ": " + txt);
				myArray[bombID]['expire'] = txt;
				}
		});
	
	} else {
		alert("counting down, be patient.")
	}
}
function handleMachine(machine){
	
	now= new Date(); //get the current time
	tday=new Date(myArray[machine-1]['expired_date'])//machine-1 array從0開始的關係
	
	status = myArray[machine-1]['status']//記錄machine的狀態
	
	if (tday <= now && status == "free") {
		window.location.assign('baking.php?id='+machine);
		//alert(machine);
	}
	else if (tday <= now && status == "bake") {
		
		window.location.assign('pick.php?id='+machine);
		//alert(machine);
	}
	else
	{
		swal({
                    title: "正在烤麵包中",
                    text: "請耐性等待一下",
                    type: "warning"
        });
	}
}
function checkBomb() {
	now= new Date(); //get the current time
	
	//check each bomb with a for loop
	//array length: number of items in the global array: myArray
	for (i=0; i < myArray.length;i++) {	
		tmp = i+1;
		tday=new Date(myArray[i]['expired_date']); //convert the date string into date object in javascript
		status = myArray[i]['status'];//記錄machine的狀態
		product = myArray[i]['product'];
		if (tday <= now && status == "free") { 
			//expired, set the explode image and text
			$("#img" + tmp).attr('src',"img/microwave.png");
			$("#timer"+tmp).html("閒置中...")
		} 
		else if (tday <= now && status == "bake"){
			
			$("#img" + tmp).attr('src',"img/check.png");
			if(product == "toast")
			{
				$("#timer"+tmp).html("吐司烤好咯！！");
			}
			else if(product == "grim")
			{
				$("#timer"+tmp).html("克林姆麵包烤好咯！！");
			}
			else if(product == "cow")
			{
				$("#timer"+tmp).html("牛角麵包烤好咯！！");
			}
			
		}
		else
		{
			//set the bomb image  and calculate count down
			//$("#bomb" + i).attr('src',"images/bomb.jpg");
			$("#img" + tmp).attr('src',"img/loading.gif");
			if(product == "toast")
			{
				$("#timer"+tmp).html("( 吐司 )倒數 "+Math.floor((tday-now)/1000)+"秒");
			}
			else if(product == "grim")
			{
				$("#timer"+tmp).html("( 克林姆 )倒數 "+Math.floor((tday-now)/1000)+"秒");
			}
			else if(product == "cow")
			{
				$("#timer"+tmp).html("( 牛角麵包 )倒數 "+Math.floor((tday-now)/1000)+"秒");
			}
						
		}
	}
}

//javascript, to set the timer on windows load event
window.onload = function () {
	//check the bomb status every 1 second
    setInterval(function () {
		checkBomb()
    }, 1000);
};
	</script>
	<style type="text/css">
		.puple{color:gray;}
		.gray{color:gray;}
		.red2{background:#733f51;color:white}
		.red-bg{background:#f5f0f0;color:#404040}
		.ing{background:#8f3d66;color:white}
		body{font-family:Microsoft JhengHei;}
		.contact-box a{color:gray;}
		.file .image{height:160px}/*機器圖的高度*/
		.file .icon{height:160px;color:#733f51}
		.machine_modal{margin-top:10%;}
		.label-primary{background:#ff9933;color:white}
		
		.img-adjust img{width:100px ;height:80px;}
		.green{color:#39ac73;}
		.red{color:#ac3939}
		.contact-box{border:5px solid #733f51;border-radius:5px;}
		.contact-box img{border:2px dashed #733f51}
		.contact-box h1{color:#33001a}
		.file{border-radius:15px;box-shadow: rgba(99,54,69,.15) 1px 1px 10px, rgba(99,54,69,.15) 1px -1px 10px ;border:2px solid #733f51}
		.file .file-name{border-top:#733f51 5px solid;background:white;}
	</style>
</head>
<body class="red-bg ">
	<div class="wrapper wrapper-content animated fadeInRight">
	
		<div class="row">
			<div class="col-sm-3">
                <div class="widget style1 red2">
                    <div class="row">
                        <div class="col-xs-4 text-center">
							<div style="margin-top:10px;">
                            <img src="img/chef.png" class="img-circle circle-border m-b-sm img-responsive" alt="profile">
							</div>
						</div>
                        <div class="col-xs-8 text-left">
						<?php
							echo "<h2 class='font-bold '>".$row['nickname']."</h2>"
						?>
                            <h3 class="font-bold" style="margin-bottom:3px;"><?php echo "LV . ".$row['level'].""?>  </h3>
							<div class="progress progress-striped active">
							<?php
								//計算經驗值
								$a = (int)$row['exp_limit'];
								$b = (int)$row['exp_now'];
								$exp = floor((100/$a)*$b);
								echo "<div style='width: ".$exp."%' aria-valuemax='100' aria-valuemin='0'  role='progressbar' class='progress-bar progress-bar-warning'>";
								//echo $exp;
							?>
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-sm-5">
			</div>
			<div class="col-sm-2">
				<a href="ingredient.php">
				<div class="widget style1 ing">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            
                            <h1 class="font-bold" style="font-size:20pt;">材料</h1>
                        </div>
                    </div>
                </div>
				</a>
			</div>
			<div class="col-sm-2">
				<div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-usd fa-5x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <span> 金幣 </span>
                            <h2 class="font-bold"><?php echo $row['money']?></h2>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<div class = "row">
			<div class="col-sm-12 gray">
				<h1 class="title text-center" style="color:#990033">麵包種類</h1>
				<div class="col-xs-4">
				
					<?php
						
						$bread1 = array('2','100','0','0','20','0');//record bread ingredient num
						$bread2 = array('1','150','0','100','50','0');
						$bread3 = array('2','200','30','0','0','50');
						$ing_name = array("雞蛋","麵粉","起司","奶油","砂糖","牛奶",);
						$sql = "select * from user_ingredient where user_id = '".$_SESSION['uid']."'";
						$res_i = mysqli_query($db,$sql) or die("search ing error");
						$row_i = mysqli_fetch_array($res_i);
					?>
					
					<div class="contact-box">
						
                        <div class="col-sm-5">
                            <div class="text-center">
									<img alt="" class=" m-t-xs img-responsive img-circle" src="img/toast.jpg" width="120px">
                                <div class="m-t-xs font-bold"><h1>吐司</h1></div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <h3><strong>材料</strong></h3>
							<?php
								$j = 0;
								$can_bake1 = true;
								for($i = 2;$i < 8;$i++)//計算材料夠不夠
								{
									
									if($row_i[$i] >= $bread1[$j] and $bread1[$j] != 0)
									{
										echo "<p class='green'><i class='fa fa-check'></i> ".$ing_name[$j]." ".$bread1[$j]."單位</p>";
									}
									else if($row_i[$i] < $bread1[$j] and $bread1[$j] != 0)
									{
										echo "<p class='red'><i class='fa fa-close'></i> ".$ing_name[$j]." 還缺".($bread1[$j]-$row_i[$i])."單位</p>";
										$can_bake1 = false;
									}
									$j = $j +1;
								}
								if($can_bake1)
								{
									echo "<h3>材料足夠，可以烤咯！</h3>";
								}
								else
								{
									echo "<h3>材料不足，該補貨了！</h3>";
								}
							?>                    
                        </div>
                        <div class="clearfix"></div>
						
					</div>
				</div>
				<div class="col-xs-4">
					<div class="contact-box">
						
                        <div class="col-sm-5">
                            <div class="text-center">
									<img alt="" class=" m-t-xs img-responsive img-circle" src="img/grim2.jpg" width="120px">
                                <div class="m-t-xs font-bold"><h1>克林姆</h1></div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <h3><strong>材料</strong></h3>
                            <?php
								$j = 0;
								$can_bake2 = true;
								for($i = 2;$i < 8;$i++)//計算材料夠不夠
								{
									
									if($row_i[$i] >= $bread2[$j] and $bread2[$j] != 0)
									{
										echo "<p class='green'><i class='fa fa-check'></i> ".$ing_name[$j]." ".$bread2[$j]."單位</p>";
									}
									else if($row_i[$i] < $bread2[$j] and $bread2[$j] != 0)
									{
										echo "<p class='red'><i class='fa fa-close'></i> ".$ing_name[$j]." 還缺".($bread2[$j]-$row_i[$i])."單位</p>";
										$can_bake2 = false;
									}
									$j = $j +1;
								}
								if($can_bake2)
								{
									echo "<h3>材料足夠，可以烤咯！</h3>";
								}
								else
								{
									echo "<h3>材料不足，該補貨了！</h3>";
								}
							?> 
                        </div>
                        <div class="clearfix"></div>
						
					</div>
				</div>
				<div class="col-xs-4">
					<div class="contact-box">
						
                        <div class="col-sm-5">
                            <div class="text-center ">
									<img alt="" class=" m-t-xs img-responsive img-circle" src="img/cow.jpg" width="120px">
                                <div class="m-t-xs font-bold"><h1>牛角麵包</h1></div>
                            </div>
                        </div>
                        <div class="col-sm-7">
							 <h3><strong>材料</strong></h3>
                            <?php
								$j = 0;
								$can_bake3 = true;
								for($i = 2;$i < 8;$i++)//計算材料夠不夠
								{
									
									if($row_i[$i] >= $bread3[$j] and $bread3[$j] != 0)
									{
										echo "<p class='green'><i class='fa fa-check'></i> ".$ing_name[$j]." ".$bread3[$j]."單位</p>";
									}
									else if($row_i[$i] < $bread3[$j] and $bread3[$j] != 0)
									{
										echo "<p class='red'><i class='fa fa-close'></i> ".$ing_name[$j]." 還缺".($bread3[$j]-$row_i[$i])."單位</p>";
										$can_bake3 = false;
									}
									$j = $j +1;
								}
								if($can_bake3)
								{
									echo "<h3>材料足夠，可以烤咯！</h3>";
								}
								else
								{
									echo "<h3>材料不足，該補貨了！</h3>";
								}
							?> 
                        </div>
                        <div class="clearfix"></div>
						
					</div>
				</div>
				
			</div>
			</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="col-sm-12 puple">
					<h2 class="title">我的機器</h2>
					<?php		
					$sql="select * from machine where user_id = '".$_SESSION['uid']."'"; //select all bomb information from DB
					$res=mysqli_query($db,$sql) or die("db error");
					$arr = array(); //define an array for bombs
					
					$i = 0;
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
					
					$i = 0;
					while($row=mysqli_fetch_assoc($res)) 
					{
						$i = $i +1;
						$arr[] = $row; //store the row into the array
						
						echo "<div class='file-box'>";
							echo "<div class='file' >";
								echo "<a onclick='handleMachine(".$i.")' >";
								
									echo "<div class='image'>";
										echo "<img alt='image' class='img-responsive' id='img".$i."' src='img/white.jpg' width='80%' style='margin:0px auto'>";
									echo "</div>";
									echo "<div class='file-name text-center' style='font-size:15pt;color:#945169'>";
										echo "機器".$i."號";
										echo "<br/>";
										echo "<small class='label label-primary' id = 'timer".$i."' style='color:white'>.</small>";
									echo "</div>";
								echo "</a>";
							echo "</div>";
						echo "</div>";
						//generate the image tag, the div tag for timer text. Note on the use of $i in tag ID
						//echo "<img src='images/explode.jpg' id='bomb$i' onclick='handleBomb($i)'><div id='timer$i'>0</div><br />";
					}
					if($i >= $lvl)
					{
						$inc_msg = "class='demo3'";//判斷通知(跳出不能購買資訊)
						
					}
					else
					{
						$inc_msg = "data-toggle='modal' data-target='#myModal6'";//(跳出不能購買資訊)
						$machine_num = $i+1;
					}
					?>
					<div class="file-box">
                        <div class="file ">
							<?php echo "<a ".$inc_msg.">";?>
                            <!--<a class="demo3">-->
                            
                            <div class="icon">
                                <i class="fa fa-plus" style="margin-top:40px;color:#733f51"></i>
                            </div>
                            <div class="file-name text-center " style='font-size:15pt;color:#945169'>
                                增加機器
                                <br/>
                                <br/>
                            </div>
                            </a>
                        </div>
					</div>
				</div>
			</div>
		</div>
			
		
	</div>
	<div class="modal inmodal fade machine_modal" id="myModal6" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title">購買機器？</h3>
                    </div>
                    <div class="modal-body">
						<h3>購買機器將會扣除200元，你確定要購買嗎？</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">還是算了</button>
                        <?php
							if($money >= 200 )
							{
								echo "<a href='buy_machine.php?machine_num=".$machine_num."'>";
							}
							else
							{
								echo "<a class='demo4'>";
							}
						
						?>
						<button type="button" class="btn btn-danger">確定</button></a>
                    </div>
                </div>
            </div>
        </div>
	<script>
	<?php
		//print the bomb array to the web page as a javascript object
		echo "var myArray=" . json_encode($arr);
	?>
	</script>
	
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
            $('.file-box').each(function () {
                animationHover(this, 'pulse');
            });
        });
    </script>
	
</body>
</html>