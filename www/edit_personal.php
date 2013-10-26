<?php
  session_start();
  if ($_REQUEST['edit']){
    require_once ("connect.php");
	mysql_query (
	  'CREATE TABLE IF NOT EXISTS users_personals (
	  login TEXT,
	  status TEXT,
	  personal_info TEXT
	  )'
	);
	$status = $_REQUEST['status'];
	$info = $_REQUESR['personal_info'];
	$login = $_SESSION['login'];
	mysql_query(
	  'INSERT INTO users SET login=\''.mysql_escape_string($login).'\', status=\''.$status.'\', personal_info=\''.$info.'\''
	);
	echo "Your personal settings have been successfully changed";
  }
?>
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
