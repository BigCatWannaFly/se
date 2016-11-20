<?php
session_start();
require("dbconnect.php");
?>
<h1>Delete Message</h1>
<table>
  <tr><form method="post" action="controller.php">
  <input type="hidden" name="act" value="delete">
    <td><label>
      <input type="submit" name="Submit" value="送出" />
    </label></td>
    <td><label>
      Message ID: <input name="id" type="text" id="id" />
    </label></td>
	</form>
  </tr>
</table>