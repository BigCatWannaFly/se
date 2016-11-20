<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<h1>Add New Message</h1>
<form method="post" action="controller.php">
  <input type="hidden" name="act" value="add">
      Message Title: <input name="title" type="text" id="title" /> <br>

      Message Body: <input name="msg" type="text" id="msg" /> <br>

      Author: <input name="myname" type="text" id="myname" /> <br>
	  
      <input type="submit" name="Submit" value="確認" />
	</form>
  </tr>
</table>
</body>
</html>
