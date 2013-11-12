<?php
  session_start();
  include_once "connect.php";
  if (isset($_SESSION['message'])){
    require_once "head.php";
	echo $_SESSION['message'];
	unset($_SESSION['message']);
  }
  else {
	if ($_REQUEST['create']){
	  $name = mysql_escape_string($_REQUEST['name']);
	  $desc = mysql_escape_string($_REQUEST['description']);
	  $res = mysql_query("
	    SELECT * FROM room_type WHERE
		name='$name'
	  ") or die(mysql_error());
	  if (mysql_fetch_assoc($res)){
	    $_SESSION['message'] = "Type with this name exists. Choose another one.<br>";
    	header ("location: create_type.php");
	  }
	  else {
	    mysql_query("
		  INSERT INTO room_type SET
		  name='$name', description='$desc'
		") or die(mysql_error());
		$_SESSION['message'] = "Your type was successfully added<br>";
		header ("location: create_type.php");
	  }
	}
  }
?>
<?include_once "head.php";?>
<form action="create_type.php" method=post>
  <table>
    <tr>
	  <td>General type:</td>
	  <td>
	    <input type="radio" name="chat" value="chat">Chat<br>
	  </td>
	</tr>
	<tr>
	  <td>Name:</td>
	  <td><input type="text" name="name"></td>
	</tr>
	<tr>
	  <td>Short description</td>
	  <td><input type="text" name="description"></td>
	</tr>
	<tr>
	  <td><input type="submit" name="create" value="Next"></td>
	</tr>
  </table>
</form>
<a href = "home.php">Homepage</a>
<?require_once "tail.php"?>
