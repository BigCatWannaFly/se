<?php
	session_start();
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 注册</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="hAdmin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="hAdmin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="hAdmin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="hAdmin/css/animate.css" rel="stylesheet">
    <link href="hAdmin/css/style.css?v=4.1.0" rel="stylesheet">
	<link href="hAdmin/css/plugins/iCheck/custom.css" rel="stylesheet">
	<link href="hAdmin/css/login.css" rel="stylesheet">
	<!-- Sweet Alert -->
    <link href="hAdmin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
	<style type="text/css">
		.logo-name{font-size:80pt;}
	</style>
	<script>
        if (window.top !== window.self) {
            window.top.location = window.location;
        }
    </script>
	<script language="javascript">
	<?php 
		if(isset ($_SESSION['same_id'])){
			unset($_SESSION['same_id']);
	?>
	window.onload = function () {
		swal({
                    title: "ID名字重複",
                    text: "請填寫其他的ID",
                    type: "error"
        });	
	};
	<?php } ?>
	</script>
</head>

<body class="gray-bg signin">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h3 class="logo-name">Let Bake</h3>

            </div>
            <h3>創建一個新賬戶</h3>
            
            <form class="m-t" role="form" action="register_insertdb.php" method="post">
                <div class="form-group">
                    <input type="text" name="id_name" class="form-control" placeholder="請輸入ID *" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="請輸入密碼 *" required="">
                </div>
                <div class="form-group">
                    <input type="text" name="nickname" class="form-control" placeholder="請輸入暱稱 *" required="">
                </div>
				
                <input type="submit" class="btn btn-danger block full-width m-b" value="註 冊">

                <p class="text-muted text-center" ><small style="color:#ff0055">已經有賬戶了？</small><a href="login.php" >點此登入</a>
                </p>

            </form>
        </div>
    </div>

    <!-- 全局js -->
    <script src="hAdmin/js/jquery.min.js?v=2.1.4"></script>
    <script src="hAdmin/js/bootstrap.min.js?v=3.3.6"></script>
    <!-- iCheck -->
    <script src="hAdmin/js/plugins/iCheck/icheck.min.js"></script>
	<!-- Prettyfile -->
    <script src="hAdmin/js/plugins/prettyfile/bootstrap-prettyfile.js"></script>
	<!-- Sweet alert -->
    <script src="hAdmin/js/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
	
</body>

</html>