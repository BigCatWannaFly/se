<?php
session_start();
require("Msg.php");
require("User.php");
if(! isset($_POST["act"])) {
	exit(0);
}

$act =$_POST["act"];
switch($act) {
	case "add":
		$title=$_POST['title'];
		$msg=$_POST['msg'];
		$name=$_POST['myname'];

		if ($title) { //if title is not empty
			if (addMsg($title,$msg,$name)) {
				echo( "OK");
			} else {
				echo( "insert failed.");
			}
		} else {
			echo "Message title cannot be empty";
		}
		break;
	case "delete":
		$msgID=(int)$_POST['id'];
		if (delMsg($msgID)) {
			echo "Message:$msgID deleted.";
		} else {
			echo "Error deleting message";
		}
		break;
	case "login":
		$loginName = $_POST['id'];
		$password = $_POST['pwd'];
		if (checkUser($loginName, $password)) {
			//set login session mark
			$_SESSION['uID'] = $loginName;
			echo "login OK<br>";
			echo "<a href='./'>guest Book Home</a>";
		} else {
			//set login mark to empty
			$_SESSION['uID'] = "";
			echo "Login failed.<br>";
			echo "<a href='loginForm.php'>login</a>";
		}
	default:
}
?>
