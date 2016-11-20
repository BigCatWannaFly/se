<?php
session_start();
require("dbconnect.php");
if (! isset($_SESSION["uID"]))
	$_SESSION["uID"] = "";
//echo $_SESSION["uID"];
if ( $_SESSION["uID"] < " ") {
	//header("Location: login.php");
	echo "Please Login. <a href='loginForm.php'>Login</a>";
	exit(0);
}
?>
<h1>Guest Book</h1><hr />
<a href="listMessage.php">List Message</a> 
<a href="addMessageForm.php">Add Message</a> 
<a href="deleteMessageForm.php">Delete Message</a> 
