<?php
session_start();
require("Msg.php");
$result=getMsgList();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>my guest book !! </p>
<hr />
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>message</td>
    <td>name</td>
  </tr>
<?php
if ($result) {
	while (	$rs=mysqli_fetch_assoc($result)) {
		echo "<tr><td>" . $rs['id'] . "</td>";
		echo "<td>{$rs['title']}</td>";
		echo "<td>" , $rs['msg'], "</td>";
		echo "<td>" . $rs['name'] . "</td></tr>";
	}
} else {
	echo "<tr><td>No data found!<td></tr>";
}
?>
</table>
</body>
</html>
