<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="hAdmin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="hAdmin/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="hAdmin/css/animate.css" rel="stylesheet">
    <link href="hAdmin/css/style.css?v=4.1.0" rel="stylesheet">
	<!-- Sweet Alert -->
    <link href="hAdmin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
	<link href="hAdmin/css/login.css" rel="stylesheet">
	
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
	<style type="text/css">
		.logo-name{font-size:80pt;margin-top:70px;}
		
	</style>
	
	<script>
        if (window.top !== window.self) {
            window.top.location = window.location;
        }
    </script>
</head>

<body class="gray-bg signin">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h3 class="logo-name">Let Bake</h3>

            </div>
            <h3>歡迎來到我們的遊戲</h3>

            <form class="m-t" action="login_check.php" method="post">
                <div class="form-group">
                    <input type="text" name="id_name" class="form-control" placeholder="用戶名" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="密碼" required="">
                </div>
                <button type="submit" class="btn btn-danger block full-width m-b">登 入</button>


                <p class="text-muted text-center"> <a href="register.php">註冊一個新賬號</a>
                </p>

            </form>
        </div>
    </div>

    <!-- 全局js -->
    <script src="hAdmin/js/jquery.min.js?v=2.1.4"></script>
    <script src="hAdmin/js/bootstrap.min.js?v=3.3.6"></script>
	<!-- Sweet alert -->
    <script src="hAdmin/js/plugins/sweetalert/sweetalert.min.js"></script>
    
    <?php
	if(isset ($_SESSION['register_sucess'])){
	unset($_SESSION['register_sucess']);
	?>
	<script type="text/javascript">
		function Swal(){
			swal({
                    title: "欢迎使用SweetAlert",
                    text: "Sweet Alert 是一个替代传统的 JavaScript Alert 的漂亮提示效果。"
                });
		}window.onload= Swal;
	</script>
	<?php } ?>

</body>

</html>