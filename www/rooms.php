<?php
  include_once "connect.php";
  session_start();
  if (isset($_SESSION['message'])){
    require_once "head.php";
	echo $_SESSION['message'];
	unset($_SESSION['message']);
  }
  else {
    if ($_REQUEST['join_id']){
	  $room_id = $_REQUEST['room_id'];
	  $res = mysql_query(
	    "SELECT * FROM rooms WHERE 
	    id='$room_id'" 
	  );
	  $room = mysql_fetch_array($res);
	  if (!$room){
	    $_SESSION['message'] = "This room does not exist";
		header ("location: rooms.php");
	  }
	  else {
	    $_SESSION['open_room'] = $room_id;
	    header ("location: room_action.php");
	  }
	}
	else {
	  if ($_REQUEST['create']){
	    $name = mysql_escape_string($_REQUEST['name']);
		$type = mysql_escape_string($_REQUEST['type']);
		mysql_query("
		  INSERT INTO rooms SET
		  type='1', name='$name'
		");
		$_SESSION['message'] = "You have registred room $name";
		header ("location: rooms.php");
	  }
	  else {
	    if ($_REQUEST['join_name']){
		  $name = mysql_escape_string($_REQUEST['room_name']);
		  $res = mysql_query("
		    SELECT * FROM rooms WHERE
			name='$name'
			ORDER BY id DESC
		  ");
		  $correct_rooms = mysql_fetch_assoc($res);
		  if (!$correct_rooms){
		    $_SESSION['message'] = "This room does not exist";
			header ("location: rooms.php");
		  }
		  else {
		    $_SESSION['open_room'] = $correct_rooms['id'];
			header ("location: room_action.php");
		  }
		}
	  }
	}
  }
?>
<? include_once "head.php" ?>
<form action="rooms.php" method=post>
  <table>
    <tr><td>Join existing room using either its id or its name. WARNING! In case of joining using name, you will join to the last created room with this name (in case of several rooms with same names):</td></tr>
	<tr>
	  <td>Room id</td>
	  <td><input type="number" name="room_id"></td>
	  <td><input type="submit" name="join_id" value="Join"></td>
	</tr>
	<tr>
	  <td>Room name</td>
	  <td><input type="text" name="room_name"></td>
	  <td><input type="submit" name="join_name" value="Join"></td>
	</tr>
	<tr><td>Create new room room:</td></tr>
	<tr>
	  <td>Name:</td>
	  <td><input type="text" name="name"></td>
	  <td>Type:</td>
	  <td><input type="text" name="type"></td>
	  <td><input type="submit" name="create" value="Create"></td>
	</tr>
  </table>
</form>
<a href = "home.php">Homepage</a>
<?require_once "tail.php"?>
