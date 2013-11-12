<?php
  session_start();
  if (isset($_SESSION['message'])){
    require_once "head.php";
	echo $_SESSION['message'];
	unset($_SESSION['message']);
  }
  else {
    if ($_REQUEST['login']){
      require_once "connect.php";
      $login = mysql_escape_string($_REQUEST['login']);
	  $res = mysql_query("
	    SELECT * FROM users WHERE 
	    login='$login'
	  ");
	  $user_data = mysql_fetch_array($res, MYSQL_ASSOC);
	  if (!$user_data){
	    $_SESSION['message'] = "User with this login does not exist. Try again.</br>";
		header ("location: login.php");
      }
	  else {
	    if ($_REQUEST['password'] != $user_data['password']){
	      $_SESSION['message'] = 'Wrong password for user '.mysql_escape_string($user_data['login']).'</br>';
		  header ("location: login.php");
	    }
        else {
		  $_SESSION['id'] = $user_data['id'];
		  $_SESSION['login'] = $user_data['login'];
		  header ("location: home.php");
	    }
	  }
    }
  }
?>
<?require_once "head.php"?>
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
<?require_once "tail.php"?>





















