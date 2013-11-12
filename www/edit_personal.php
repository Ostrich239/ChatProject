<?php
  session_start();
  if ($_REQUEST['edit']){
    require_once ("connect.php");
	$status = mysql_escape_string($_REQUEST['status']);
	$info = mysql_escape_string($_REQUEST['personal_info']);
	$id = mysql_escape_string($_SESSION['id']);
	mysql_query("
	  UPDATE users_personals SET 
	  status='$status', personal_info='$info' 
	  WHERE
	  id='$id'
	") or die(mysql_error());
	require_once "head.php";	
	echo "Your personal settings have been successfully changed";
  }
  else {
    require_once "head.php";
  }
?>
<?require_once "head.php"?>
<form action="edit_personal.php" method=post>
  <table>
    <tr>
	  <td>Your status:</td>
	  <td><input type="text" name="status"></td>
	</tr>
	<tr>
	  <td>About you:</td>
	  <td><textarea name="personal_info" cols="60" rows="20"></textarea></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td><input type="submit" name="edit" value="Edit"></td>
	</tr>	
  </table>
</form>
<a href = "home.php">To home page</a>
<?require_once "tail.php"?>