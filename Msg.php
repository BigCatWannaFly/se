<?php
require("dbconnect.php");

function getMsgList() {
	global $conn;
	$sql = "select * from guestbook;";
	return mysqli_query($conn,$sql);
}

function addMsg($title, $msg, $name) {
	global $conn;
	$title=mysqli_real_escape_string($conn,$title);
	$msg=mysqli_real_escape_string($conn,$msg);
	$name=mysqli_real_escape_string($conn,$name);
	if ($title) { //if title is not empty
		$sql = "insert into guestbook (title, msg, name) values ('$title', '$msg','$name');";
		return mysqli_query($conn, $sql);
	} else {
		return false;
	}
}

function delMsg($msgID) {
	global $conn;
	$sql = "delete from guestbook where id=$msgID;";
	return mysqli_query($conn,$sql);
}



?>