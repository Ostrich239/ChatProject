<?php
  if ($_REQUEST['login']){
    require_once "connect.php";
    $login = $_REQUEST['login'];
	$res = mysql_query(
	  'SELECT * FROM users WHERE login=\''.mysql_escape_string($login).'\'' 
	);
	$user_data = mysql_fetch_array($res, MYSQL_ASSOC);
	if (!$user_data){
	  echo "User with this login does not exist. Try again.</br>";
    }
	else {
	  if ($_REQUEST['password'] != $user_data['password']){
        echo 'Wrong password for user '.mysql_escape_string($user_data['login']).'</br>';
	  }
      else {
        session_start();
		$_SESSION['login'] = $user_data['login'];
		header ("location: home.php");
	  }	  
	}
  }
?>
Insert your login and password:</br>
<form action="login.php" method=post>
  <table>
    <tr>
	  <td>Your login:</td>
	  <td><input type="text" name="login"></td>
	</tr>
	<tr>
	  <td>Your password:</td>
	  <td><input type="text" name="password"></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td><input type="submit" name="enter" value="Enter"></td>
	</tr>	
  </table>
</form>
<a href = "register.php">Registration on site</a>
